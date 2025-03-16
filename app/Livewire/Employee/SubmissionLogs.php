<?php

namespace App\Livewire\Employee;

use App\Models\PdsEntry;
use Livewire\Component;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class SubmissionLogs extends Component
{
    public function render()
    {
        $entry = PdsEntry::where('user_id', Auth::id())
            ->latest()
            ->first();

        return view('livewire.employee.submission-logs', [
            'entry' => $entry,
            'submissions' => $entry ? $entry->submissions->sortByDesc('created_at') : collect(),
        ])
            ->extends('layouts.app')
            ->title('Submission Logs')
            ->section('content');
    }
}
