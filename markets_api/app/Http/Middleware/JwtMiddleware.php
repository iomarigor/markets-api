<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JwtMiddleware extends BaseMiddleware
{

    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['msg' => 'Token is Invalid', 'data' => []]);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['msg' => 'Token is Expired', 'data' => []]);
            } else {
                return response()->json(['msg' => 'Authorization Token not found', 'data' => []]);
            }
        }
        return $next($request);
    }
}
