<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Settings;
use App\Services\AuthService;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Vite;

class LoginUser extends Component
{
    #[Validate(['required', 'email'])]
    public $email;

    #[Validate('required')]
    public $password;

    public $sidebarColor;
    public $logoPath;

    protected AuthService $authService;

    public function boot(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function mount()
    {
        $this->sidebarColor = Settings::where('key', 'sidebar_color')->value('value') ?? 'dark';
        $this->logoPath = Settings::where('key', 'logo')->value('value') ?? Vite::asset('resources/images/hris-logo-white.png');
    }

    public function submit()
    {
        // dd($this->all());
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
