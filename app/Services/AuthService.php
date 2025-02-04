<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function authenticate(array $credentials)
    {
        // Checks if the credentials are valid
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['email' => 'Invalid login credentials']);
        }

        // Retrieves the authenticated user
        $user = Auth::user();

        // Checks if the account is approved
        if (!$user->is_approved) {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Your account is not approved yet. Please wait for admin approval.',
            ]);
        }

        // Redirects the user to their respective dashboards
        return $this->redirectUser($user);
    }

    protected function redirectUser($user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard')->with('message', 'Welcome Admin!');
        } else if ($user->hasRole('employee')) {
            return redirect()->route('employee.dashboard')->with('message', 'Welcome Employee!');
        }

        // Optional: Handle users without a recognized role
        Auth::logout();
        throw ValidationException::withMessages([
            'email' => 'Your account does not have a valid role assignment.',
        ]);
    }
}
