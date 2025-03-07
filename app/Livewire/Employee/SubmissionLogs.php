<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class SubmissionLogs extends Component
{
    public $submissions;

    public function mount()
    {
    //     $this->submissions = collect([
    //     (object) [
    //         'status' => 'approved',
    //         'remarks' => 'Well done!',
    //         'reviewed_by' => 'John Doe',
    //         'created_at' => now()->subDays(3),
    //     ],
    //     (object) [
    //         'status' => 'under review',
    //         'remarks' => 'Checking details',
    //         'reviewed_by' => null,
    //         'created_at' => now()->subDays(2),
    //     ],
    //     (object) [
    //         'status' => 'rejected',
    //         'remarks' => 'Missing document',
    //         'reviewed_by' => 'Jane Smith',
    //         'created_at' => now()->subDay(),
    //     ],
    // ]);
        // Fetch submission logs for the authenticated user
        $this->submissions = Submission::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.employee.submission-logs')
            ->extends('layouts.app')
            ->title('Submission Logs')
            ->section('content');
    }
}
