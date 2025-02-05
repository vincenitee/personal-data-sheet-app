<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\UserService;
use App\Livewire\Forms\RegisterUserForm;

class RegisterUser extends Component
{
    public RegisterUserForm $form;

    protected UserService $userService;

    public function boot(UserService $userService){
        $this->userService = $userService;
    }

    public function save()
    {
        // Validate data
        $validated = $this->form->validateData();

        // Remove password_confirmation field
        unset($validated['password_confirmation']);

        // Store user data
        $this->userService->store($validated);

        // Redirect to login
        redirect(route('login'))->with('flash', [
            'status' => 'success',
            'message' => "Registration successfull! Please wait for account approval to login."
        ]);
    }

    public function render()
    {
        return view('livewire.auth.register-user')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Register');
    }
}
