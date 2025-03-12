<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $latestSubmission;
    public $submissions;
    public $entry;

    public function mount(){
        $user = Auth::user();
        $this->entry = $user->entries()->latest()->first();
        $this->latestSubmission = $this->entry->submissions()->latest()->first();
        $this->submissions = $this->entry->submissions()->orderByDesc('created_at')->limit(3)->get();
    }


    public function render()
    {
        return view('livewire.employee.dashboard')
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
