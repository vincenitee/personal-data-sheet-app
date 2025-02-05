<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutButton extends Component
{
    public function logout()
    {
        // Logs out the authenticated user
        Auth::logout();

        // Redirect to the index page
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.logout-button');
    }
}
