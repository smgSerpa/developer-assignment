<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response([
                'message' => 'Missing bearer token'
            ], 403);
        }


        if (User::query()->where('token', $token)->doesntExist()) {
            return response([
                'message' => 'Unauthenticated'
            ], 403);
        }


        return $next($request);
    }
}
