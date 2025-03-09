<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\PdsEntry;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

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
