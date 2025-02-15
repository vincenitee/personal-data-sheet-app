<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\AuthService;
use Livewire\Attributes\Validate;

class LoginUser extends Component
{
    #[Validate(['required', 'email'])]
    public $email;

    #[Validate('required')]
    public $password;

    protected AuthService $authService;

    public function boot(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function submit()
    {
        // Validates the credentials
        $credentials = $this->validate();

        // Authenticate the user
        return $this->authService
            ->authenticate($credentials);
    }

    public function render()
    {
        return view('livewire.auth.login-user')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Login');
    }
}
