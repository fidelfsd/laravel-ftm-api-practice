<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $role = $user->roles[0]->id;

        if ($role != UserRole::ADMIN->value) {
            return response()->json([
                'message' => 'You are not allowed to access this resource'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
