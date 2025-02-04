<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class RegisterUserForm extends Form
{
    #[Validate('required|string|max:20')]
    public $first_name = '';

    #[Validate('nullable|string|max:20')]
    public $middle_name = '';

    #[Validate('required|string|max:20')]
    public $last_name = '';

    #[Validate('required|date|before:today')]
    public $birth_date = '';

    #[Validate('required')]
    public $sex = '';

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

    public function validateData()
    {
        $validated = $this->validate();
        
        return $validated;
    }
}
