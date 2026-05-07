<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI; // Make sure you have OpenAI integrated

class ChatBotController extends Controller
{
    public function getChatResponse(Request $request)
    {
        $userMessage = $request->input('user_message');

        // Here we call OpenAI or any other chatbot API
        // For example, using OpenAI's GPT-3/4
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo', // Specify the model you use
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => $userMessage],
            ],
        ]);

        $botMessage = $response['choices'][0]['message']['content'];

        // Return the bot response to the front-end
        return response()->json([
            'message' => $botMessage,
        ]);
    }
}
