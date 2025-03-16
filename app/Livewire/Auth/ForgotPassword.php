<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Settings;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public $logoPath;
    public $sidebarColor;


    public function mount()
    {
        $this->sidebarColor = Settings::where('key', 'sidebar_color')->value('value') ?? 'dark';
        $this->logoPath = Settings::where('key', 'logo')->value('value') ?? Vite::asset('resources/images/hris-logo-white.png');
    }

    public function sendResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Forgot Password');
    }
}
