<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\Forms\LoginForm;

class LoginUser extends Component
{
    public LoginForm $form;

    public function save()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.auth.login-user')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Login');
    }
}
