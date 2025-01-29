<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function store()
    {
        $this->validate();

        // Attempts to login the user
        if (!Auth::attempt($this->only(['email', 'password']))) {
            // Flash message and retain user input
            session()->flash('status', 'The provided credentials do not match our records.');
            session()->flash('type', 'alert-danger');
            return;
        }

        // Retrieve the authenticated user
        $user = Auth::user();

        if ($user->status === 'pending') {
            Auth::logout();
            // Flash message for unapproved accounts
            session()->flash('status', 'Your account is not approved yet.');
            session()->flash('type', 'alert-danger');
            return;
        }

        // Redirect the user based on their role
        if ($user->role === 'employee') {
            dd('Employee Dashboard');
            // return redirect()->route('employee.dashboard');
        } else if ($user->role === 'admin') {
            dd('Admin Dashboard');
            // return redirect()->route('admin.dashboard');
        }
    }
}
