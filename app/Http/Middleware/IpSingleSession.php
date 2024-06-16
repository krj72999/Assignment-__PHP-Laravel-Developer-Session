<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Response;

class IpSingleSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        $cacheKey = "rate_limit_{$ipAddress}";

        // Check if there is an active session stored for this IP
        if (Cache::has($cacheKey)) {
            return response()->json([
                'message' => 'Another session is already in progress for this IP address.'
            ], 429);
        }

        // Store or update the session ID for this IP in the cache
        Cache::put($cacheKey, true, now()->addMinutes(30)); // Store for 30 minutes, adjust as needed

        return $next($request);
    }
}
