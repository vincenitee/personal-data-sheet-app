<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Settings;
use Illuminate\Support\Str;
use App\Services\AuthService;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

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
        $this->sidebarColor = get_setting('sidebar_color', 'dark');

        $logo = get_setting('logo');
        $defaultLogo = asset('images/hris-logo-white.png');

        if ($logo) {
            $fullPath = 'system_logo/' . $logo;

            if (Storage::disk('public')->exists($fullPath)) {
                $this->logoPath = Storage::disk('public')->url($fullPath);
            } else {
                $this->logoPath = $defaultLogo;
            }
        } else {
            $this->logoPath = $defaultLogo;
        }
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
