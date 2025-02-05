<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Fetch the currently authenticated user
        $user = Auth::user();

        // Checks if there are user or the user is approved
        if(!$user || $user->status !== 'approved'){
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Your account is not approved yet. Please wait for admin approval.',
            ]);
        }

        return $next($request);
    }
}
