<?php

namespace App\Livewire\Admin;

use App\Enums\MunicipalOffice;
use App\Enums\Sex;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Services\UserService;
use Livewire\Component;

class AddUser extends Component
{
    // Personal Information
    public $first_name = null;
    public $middle_name = null;
    public $last_name = null;
    public $sex = 'male';
    public $birth_date = null;
    public $department = null;

    // Account Information
    public $email = null;

    public $password = 'Dpds#2024!';

    public $status = 0;
    public $role = 'employee';

    protected UserService $userService;
    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    protected function rules()
    {
        return [
            // Personal Information
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'in:male,female'], // Assuming only these two options
            'birth_date' => ['required', 'date', 'before:today'],
            'department' => ['required'],
            
            // Account Information
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],

            // Other Information
            'status' => ['required', 'integer', 'in:0,1'], // Assuming 0 = inactive, 1 = active
            'role' => ['required', 'in:employee,admin'], // Assuming only these two roles
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        // Set default status
        $validated['status'] = UserStatus::APPROVED->value;

        // Store the user and exclude the role from the array
        if ($user = $this->userService->store(collect($validated)->except('role')->toArray())) {
            // Assign role if valid, otherwise default to EMPLOYEE
            $role = UserRole::tryFrom($validated['role']) ?? UserRole::EMPLOYEE;
            $this->userService->assignRole($user, $role);

            // Show success toast
            $this->dispatch('show-toast', [
                'type' => 'success',
                'title' => "User #{$user->id} has been successfully created",
            ]);
        } else {
            // Show error toast
            $this->dispatch('show-toast', [
                'type' => 'error',
                'title' => "Failed to create user",
            ]);
        }

        $this->reset();
    }


    public function render()
    {
        return view('livewire.admin.add-user', [
            'sexOptions' => Sex::labels(),
            'userRoleOptions' => UserRole::labels(),
            'departments' => MunicipalOffice::options(),
        ])
            ->extends('layouts.app')
            ->section('content')
            ->title('Add User');
    }
}
