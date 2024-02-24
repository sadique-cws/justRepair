<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
