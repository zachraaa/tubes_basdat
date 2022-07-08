<?php

namespace App\Http\Middleware;

use Closure;
use Execpyion;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status'=>'Token is Invalid'],403);
            }else if ($e instanceof TokenExpiredException) {
                return response()->json(['status'=>'Token is Expired'],401);
            }else if ($e instanceof TokenBlackistedException) {
                return response()->json(['status'=>'Token is Blacklisted'],400);
            }else{
                return response()->json(['status'=>'Authorization Token not found'],404); 
            }
        }
        return $next($request);
    }
}
