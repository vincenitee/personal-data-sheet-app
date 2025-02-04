<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\AuthService;
use App\Services\UserService;
use App\Livewire\Forms\LoginForm;
use Illuminate\Validation\ValidationException;
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

    public function save()
    {
        // Validates the credentials
        $credentials = $this->validate();

        // Authenticate the user
        try {
            return $this->authService
                ->authenticate($credentials);
        } catch (ValidationException $e) {
            session()->flash('error', $e->errors()['email'][0]);
        }
    }

    public function render()
    {
        return view('livewire.auth.login-user')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Login');
    }
}
