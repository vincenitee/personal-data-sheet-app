<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Livewire\Forms\RegisterUserForm;

class RegisterUser extends Component
{
    public RegisterUserForm $form;

    public function save()
    {
        $this->form->store();

        // Shows a success message if the user is successfully registered
        $this->dispatch('user-registered');
    }

    public function render()
    {
        return view('livewire.auth.register-user')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Register');
    }
}
