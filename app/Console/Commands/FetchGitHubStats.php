<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FetchGitHubStats extends Command
{
    protected $signature   = 'github:fetch-stats';
    protected $description = 'Fetch GitHub profile stats and cache them for 1 hour';

    public function handle(): int
    {
        $username = config('services.github.username');

        if (!$username) {
            $this->error('GITHUB_USERNAME not set in .env');
            return self::FAILURE;
        }

        $headers = ['User-Agent' => 'Laravel-Portfolio'];
        $token   = config('services.github.token');
        if ($token) {
            $headers['Authorization'] = "Bearer {$token}";
        }

        $userRes = Http::withHeaders($headers)
            ->get("https://api.github.com/users/{$username}");

        if (!$userRes->successful()) {
            $this->error('GitHub API error: ' . $userRes->status());
            return self::FAILURE;
        }

        $user  = $userRes->json();
        $repos = $this->fetchAllRepos($username, $headers);

        $stars = collect($repos)->sum('stargazers_count');

        $langCounts = collect($repos)
            ->filter(fn($r) => !empty($r['language']))
            ->groupBy('language')
            ->map->count()
            ->sortDesc();

        $topLanguage = $langCounts->keys()->first() ?? '—';

        $stats = [
            'repos'    => $user['public_repos'] ?? count($repos),
            'stars'    => $stars,
            'language' => $topLanguage,
            'followers' => $user['followers'] ?? 0,
        ];

        Cache::put('github_stats', $stats, 3600);

        $this->info("Cached: {$stats['repos']} repos, {$stats['stars']} stars, top lang: {$stats['language']}");

        return self::SUCCESS;
    }

    private function fetchAllRepos(string $username, array $headers): array
    {
        $page  = 1;
        $all   = [];

        do {
            $res = Http::withHeaders($headers)
                ->get("https://api.github.com/users/{$username}/repos", [
                    'per_page' => 100,
                    'page'     => $page,
                    'type'     => 'owner',
                ]);

            if (!$res->successful()) {
                break;
            }

            $batch = $res->json();
            $all   = array_merge($all, $batch);
            $page++;
        } while (count($batch) === 100);

        return $all;
    }
}
