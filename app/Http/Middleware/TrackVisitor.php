<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->isMethod('GET') || $request->ajax()) {
            return $next($request);
        }

        $sessionId = session()->getId();
        $heartbeatKey = "vt_{$sessionId}";

        Cache::put($heartbeatKey, 1, 120); // 2-minute heartbeat

        if (!in_array($sessionId, Cache::get('vt_ids', []))) {
            $ids = Cache::get('vt_ids', []);
            $ids[] = $sessionId;
            Cache::put('vt_ids', $ids, 3600);
        }

        return $next($request);
    }
}
