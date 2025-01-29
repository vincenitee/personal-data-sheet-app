<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use App\Models\Employee;
use App\Enums\UserStatus;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class RegisterUserForm extends Form
{
    #[Validate('required|string|max:20')]
    public $first_name = '';

    public $middle_name = '';

    #[Validate('required|string|max:20')]
    public $last_name = '';

    #[Validate('required|date|before:today')]
    public $birthdate = '';

    #[Validate('required')]
    public $sex = '';

    #[Validate('nullable|regex:/^[0-9]{7,15}$/')]
    public $telephone_no = '';

    #[Validate('required|regex:/^[0-9]{10,15}$/')]
    public $mobile_no = '';

    #[Validate('required|unique:users|email')]
    public $email = '';

    #[Validate([
        'required',
        'string',
        'min:8',
        'regex:/[!@#$%^&*(),.?":{}|<>]/',  // Special character
        'regex:/[0-9]/',                    // Number
        'regex:/[A-Z]/',                    // Uppercase letter
        'regex:/[a-z]/'                     // Lowercase letter
    ])]
    public $password = '';

    #[Validate('required|same:password')]
    public $password_confirmation = '';

    public function store()
    {
        $this->validate();

        // Insert records to employee table
        $employee = Employee::create($this->except(['email', 'password', 'password_confirmation']));

        // Get the id of the newly created employee
        $employee->id;

        // Insert records to user table
        User::create([
            'employee_id' => $employee->id,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->reset();
    }
}
