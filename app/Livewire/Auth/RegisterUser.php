<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\UserService;
use App\Livewire\Forms\RegisterUserForm;
use App\Traits\HasAlertMessage;
use Illuminate\Validation\ValidationException;

class RegisterUser extends Component
{
    use HasAlertMessage;

    public RegisterUserForm $form;

    protected UserService $userService;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function save()
    {
        try {
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

        } catch (ValidationException $e) {
            $this->setErrorBag($e->errors());

            $errors = $e->validator->errors();
            $firstField = $errors->keys()[0] ?? null;
            $firstErrorMessage = $errors->first();

            $detailedMessage = $firstField
                ? $firstErrorMessage
                : "Please review your input: $firstErrorMessage";

            $this->dispatchAlertMessage('Validation Error', $detailedMessage, 'error');
        }
    }

    public function render()
    {
        return view('livewire.auth.register-user')
            ->extends('layouts.auth')
            ->section('content')
            ->title('Register');
    }
}
