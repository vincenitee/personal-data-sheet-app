<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public function sendResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink([
            'email' => $this->email,
        ]);

        if($status === Password::RESET_LINK_SENT){
            session()->flash('status', __($status));
        } else{
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
