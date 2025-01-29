<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Password;

class ResetPassword extends Component
{
    #[Validate('required')]
    public $token;

    #[Validate('required|email')]
    public $email;

    #[Validate([
        'required',
        'string',
        'min:8',
        'regex:/[!@#$%^&*(),.?":{}|<>]/',
        'regex:/[0-9]/',
        'regex:/[A-Z]/',
        'regex:/[a-z]/'
    ])]
    public $password;

    #[Validate('required|same:password')]
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email');
    }

    function updatePassword()
    {
        $this->validate();

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password){
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        if($status === Password::PASSWORD_RESET){
            return redirect()->route('login')->with(['status' => __($status)]);
        } else{
            $this->addError('email', __($status));
        }

    }

    public function render()
    {
        return view('livewire.auth.reset-password')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Reset Password');;
    }
}
