<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $user;
    public $role;

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

    // Additional information
    public $updated_at;

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
                'updated_at'  => $this->user->updated_at,
            ]);

            // Fetch the user's roles (ensuring it's always an array)
            $this->role = $this->user->getRoleNames()->toArray() ?? [];
        }
    }

    // Validation rules for personal information
    protected function rules(): array
    {
        return [
            'first_name'  => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'sex'         => ['required', 'string', 'in:male,female'],
            'birth_date'  => ['nullable', 'date'],
            'email'       => ['required', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
        ];
    }

    // Handle Personal Information Update
    public function updatePersonalInformation()
    {
        // Validate based on the defined rules
        $validated = $this->validate();

        // Refresh user data before updating
        $user = Auth::user();
        $user->update([
            'first_name'  => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name'   => $this->last_name,
            'sex'         => $this->sex,
            'birth_date'  => $this->birth_date,
            'email'       => $this->email,
        ]);

        $this->user = $user; // Refresh user property

        // Success message
        session()->flash('flash', [
            'status'  => 'success',
            'message' => 'Personal information updated successfully',
        ]);
    }

    public function updateSecurityInformation() {}

    public function render()
    {
        return view('livewire.profile')
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
