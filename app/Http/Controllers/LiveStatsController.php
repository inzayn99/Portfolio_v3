<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class LiveStatsController extends Controller
{
    public function visitors()
    {
        $ids    = Cache::get('vt_ids', []);
        $active = array_values(array_filter($ids, fn($id) => Cache::has("vt_{$id}")));

        Cache::put('vt_ids', $active, 3600);

        return response()->json(['count' => max(1, count($active))]);
    }

    public function githubStats()
    {
        $stats = Cache::get('github_stats');

        if (!$stats) {
            $stats = ['repos' => '—', 'stars' => '—', 'language' => '—'];
        }

        return response()->json($stats);
    }
}
