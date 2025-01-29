<?php

namespace App\Livewire\Employee;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.employee.dashboard')
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
