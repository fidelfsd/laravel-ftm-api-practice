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
        // Get the authenticated user
        $user = Auth::user();

        // Extract roles from the user and convert to an array
        $rolesArray = iterator_to_array($user->roles);

        // Extract the "id" values from the roles array
        $rolesId = array_column($rolesArray, "id");

        // Check if the user has the "ADMIN" role
        if (!in_array(UserRole::ADMIN->value, $rolesId)) {
            // If not, return an unauthorized response with details
            return response()->json([
                'message' => 'You are not allowed to access this resource'
            ], Response::HTTP_UNAUTHORIZED);
        }

        // If the user has the "ADMIN" role, continue with the request
        return $next($request);
    }
}
