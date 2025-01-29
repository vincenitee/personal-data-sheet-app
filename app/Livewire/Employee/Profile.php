<?php

namespace App\Livewire\Employee;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.employee.profile')
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
