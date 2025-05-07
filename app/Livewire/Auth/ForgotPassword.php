<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Settings;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
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

        $logo = get_setting('logo');

        if (!empty($logo) && Str::startsWith($logo, ['http', 'https'])) {
            // External URL
            $this->logoPath = $logo;
        } elseif (!empty($logo) && Storage::disk('public')->exists('system_logo/' . $logo)) {
            // Logo in storage/app/public/system_logo directory
            $this->logoPath = Storage::disk('public')->url('system_logo/' . $logo);
        } else {
            // Default logo
            $this->logoPath = asset('images/hris-logo-white.png');
        }
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
