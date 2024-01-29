<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         /** @var \App\Models\User $user */
         $user = auth()->user();

        if (!$user->hasRole('creator administrator')) {
            return response()->json([
                'message' => 'You are not authorized to access this route'
            ], 403);
        }
        
        return $next($request);
    }
}
