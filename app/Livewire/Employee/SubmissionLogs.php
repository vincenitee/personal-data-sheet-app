<?php

namespace App\Livewire\Employee;

use Livewire\Component;

class SubmissionLogs extends Component
{
    public function render()
    {
        return view('livewire.employee.submission-logs')
            ->extends('layouts.app')
            ->title('Submission Logs')
            ->section('content');
    }
}
