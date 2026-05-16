<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    public function nowPlaying()
    {
        $apiKey   = config('services.lastfm.api_key');
        $username = config('services.lastfm.username');

        if (!$apiKey || !$username) {
            return response()->json(['playing' => false]);
        }

        $cached = Cache::get('lastfm_now_playing');
        if ($cached !== null) {
            return response()->json($cached);
        }

        $response = Http::get('https://ws.audioscrobbler.com/2.0/', [
            'method'  => 'user.getRecentTracks',
            'user'    => $username,
            'api_key' => $apiKey,
            'format'  => 'json',
            'limit'   => 1,
        ]);

        if (!$response->successful()) {
            return response()->json(['playing' => false]);
        }

        $tracks = $response->json('recenttracks.track');

        if (empty($tracks)) {
            Cache::put('lastfm_now_playing', ['playing' => false], 25);
            return response()->json(['playing' => false]);
        }

        $track     = $tracks[0];
        $nowPlaying = isset($track['@attr']['nowplaying']) && $track['@attr']['nowplaying'] === 'true';

        if (!$nowPlaying) {
            Cache::put('lastfm_now_playing', ['playing' => false], 25);
            return response()->json(['playing' => false]);
        }

        $cover = collect($track['image'] ?? [])
            ->firstWhere('size', 'large')['#text'] ?? null;

        $data = [
            'playing' => true,
            'title'   => $track['name'] ?? '—',
            'artist'  => $track['artist']['#text'] ?? '—',
            'album'   => $track['album']['#text'] ?? '',
            'cover'   => $cover ?: null,
            'url'     => $track['url'] ?? '#',
        ];

        Cache::put('lastfm_now_playing', $data, 25);

        return response()->json($data);
    }
}
