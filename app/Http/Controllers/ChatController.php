<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Projects;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate(['message' => 'required|string|max:500']);

        $systemPrompt = $this->buildSystemPrompt();

        $response = Http::withHeaders([
                'x-api-key'         => config('services.anthropic.key'),
                'anthropic-version' => '2023-06-01',
                'content-type'      => 'application/json',
            ])
            ->timeout(30)
            ->post('https://api.anthropic.com/v1/messages', [
                'model'      => 'claude-haiku-4-5-20251001',
                'max_tokens' => 350,
                'system'     => $systemPrompt,
                'messages'   => [
                    ['role' => 'user', 'content' => $request->message],
                ],
            ]);

        if ($response->failed()) {
            return response()->json(['error' => 'AI service unavailable. Please try again.'], 503);
        }

        $reply = $response->json('content.0.text') ?? 'Sorry, I could not generate a response.';

        return response()->json(['reply' => trim($reply)]);
    }

    private function buildSystemPrompt(): string
    {
        $setting  = Setting::first();
        $name     = $setting->company_name ?? 'Arbaaz Khan';

        $projects = Projects::where('publish_status', 1)
            ->with('programmingLanguages')
            ->latest()
            ->get()
            ->map(fn($p) => sprintf(
                '- %s (%s) [%s]%s',
                $p->title,
                $p->year ?? 'N/A',
                $p->programmingLanguages->pluck('title')->implode(', ') ?: 'N/A',
                $p->made_at ? ' @ ' . $p->made_at : ''
            ))
            ->implode("\n");

        $blogs = Blog::where('publish_status', 1)
            ->latest()
            ->limit(10)
            ->get()
            ->map(fn($b) => '- ' . $b->title . ($b->category ? ' [' . $b->category->title . ']' : ''))
            ->implode("\n");

        return <<<PROMPT
You are Jenny, a friendly AI assistant embedded in {$name}'s personal portfolio website.
Your job is to help recruiters, collaborators, and visitors learn about {$name} — his work, skills, and projects.

Keep answers concise (2-4 sentences max). Be warm, professional, and enthusiastic about {$name}'s work.
If someone asks your name, say you're Jenny. If asked something you don't know (e.g., salary expectations, personal contact), politely redirect to the contact form.
Never make up project details. Use only the data provided below.

=== ABOUT ===
Name: {$name}
Brief: {$setting->brief_description}
Email: {$setting->email}
GitHub: {$setting->github}
LinkedIn: {$setting->linkedin}

=== PROJECTS ===
{$projects}

=== BLOG POSTS ===
{$blogs}
PROMPT;
    }
}
