<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $latestSubmission;
    public $submissions;
    public $unreadNotifications;
    public $entry;

    public function mount()
    {
        $user = Auth::user();

        // Check if the user has any PDS entry
        $this->entry = $user->entries()->latest()->first();

        if ($this->entry) {
            // If an entry exists, check for submissions
            $this->latestSubmission = $this->entry->submissions()->latest()->first();
            $this->submissions = $this->entry->submissions()->orderByDesc('created_at')->limit(3)->get();
        } else {
            // No entry found, set properties to null or empty collection
            $this->latestSubmission = null;
            $this->submissions = collect();
        }

        // Get unread notifications (this is safe even for new users)
        $this->unreadNotifications = $user->unreadNotifications;
    }


    public function render()
    {
        return view('livewire.employee.dashboard')
            ->extends('layouts.app')
            ->title('Dashboard')
            ->section('content');
    }
}
