<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class CheckTokenExpiration
{
   
    
    public function handle($request, Closure $next)
    {
        try {
            // Attempt to verify the token
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            // Token expired, logout user
            Auth::logout();
    
           
        } catch (JWTException $e) {
            // Token invalid, return error response
            Auth::logout();
        }
    
        return $next($request);
    }
    
}
