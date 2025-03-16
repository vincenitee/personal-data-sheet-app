<?php

namespace App\Livewire\Admin;

use App\Enums\Sex;
use App\Models\User;
use App\Traits\HasFlashMessage;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditUserPage extends Component
{
    use HasFlashMessage;

    public $user;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $sex;
    public $birth_date;
    public $email;
    public $password;
    public $status;

    protected $rules = [
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'sex' => 'required',
        'birth_date' => 'required|date',
        'email' => 'required|email',
        'password' => 'nullable|min:8',
        'status' => 'required',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->sex = $user->sex;
        $this->birth_date = $user->birth_date;
        $this->email = $user->email;
        $this->status = $user->deactivated;
    }

    public function save()
    {
        // dd($this->all());
        $this->validate();

        $this->user->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'sex' => $this->sex,
            'birth_date' => $this->birth_date,
            'email' => $this->email,
            'password' => $this->password ? bcrypt($this->password) : $this->user->password,
            'deactivated' => $this->status,
        ]);

        $this->flashMessage("User #{$this->user->id} has been updated successfully", 'success');

        return $this->redirect(route('admin.users'), navigate: true); // Redirect to the users list page
    }

    public function render()
    {
        return view('livewire.admin.edit-user-page', [
            'sexOptions' => Sex::labels(),
        ])
            ->extends('layouts.app')
            ->title('Edit User Information')
            ->section('content');;
    }
}
