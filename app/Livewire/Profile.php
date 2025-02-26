<?php

namespace App\Livewire;

use App\Enums\Sex;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Profile extends Component
{
    public $user;

    // Personal information fields
    public $first_name;
    public $middle_name;
    public $last_name;
    public $sex;
    public $birth_date;
    public $email;

    // Security information fields
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        // Binds the authorized user information
        $this->user = Auth::user();

        if ($this->user) {
            // Use object properties directly
            $this->fill([
                'first_name'  => $this->user->first_name,
                'middle_name' => $this->user->middle_name,
                'last_name'   => $this->user->last_name,
                'sex'         => $this->user->sex,
                'birth_date'  => $this->user->birth_date,
                'email'       => $this->user->email,
            ]);
        }
    }

    // Validation rules for personal information
    protected function rules(): array
    {
        return [
            0 => [
                'first_name'  => ['required', 'string', 'max:255'],
                'middle_name' => ['nullable', 'string', 'max:255'],
                'last_name'   => ['required', 'string', 'max:255'],
                'sex'         => ['required', 'string', 'in:male,female'],
                'birth_date'  => ['nullable', 'date'],
                'email'       => ['required', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            ],
            1 => [
                'current_password' => ['required', 'string'],
                'password' => ['required', 'string', 'min:8', 'regex:/[!@#$%^&*(),.?":{}|<>]/', 'regex:/[0-9]/', 'regex:/[A-Z]/', 'regex:/[a-z]/' ],
                'password_confirmation' => ['required', 'same:password'],
            ]
        ];
    }

    // Handle Personal Information Update
    public function savePersonalInformation()
    {
        // Validate based on the defined rules
        $validated = $this->validate($this->rules()[0]);

        // Refresh user data before updating
        $user = Auth::user();

        $user->update($validated);

        $this->user = $user; // Refresh user property

        // Success Message
        $this->dispatch('personal-info-updated');
    }

    public function saveSecurityInformation()
    {
        // Validate the entered password
        $this->validate($this->rules()[1]);

        // Check if the input password and the saved password match
        $password = $this->user->password;

        if(!Hash::check($this->password, $password)){
            throw ValidationException::withMessages(['current_password' => "The password didn't match with the one in our records"]);
        }

        // Update the password
        $this->user->update([
            'password' => $this->password
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        // Success Message
        $this->dispatch('security-info-updated');
    }

    public function render()
    {
        return view('livewire.profile', [
            'sexOptions' => Sex::options(),
        ])
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
