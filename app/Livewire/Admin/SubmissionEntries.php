<?php

namespace App\Livewire\Admin;

use App\Enums\SubmissionStatus;
use App\Models\PdsEntry;
use App\Models\Submission;
use App\Traits\SortableSearchable;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class SubmissionEntries extends Component
{
    use SortableSearchable, WithPagination;

    #[Computed]
    public function submissionEntries()
    {
        return PdsEntry::where('status', SubmissionStatus::UNDER_REVIEW)
            ->with(['user', 'attachment']) // Fetch user through entry
            ->whereHas('user', function ($query) {
                $query->where('first_name', 'like', "%{$this->search}%")
                    ->orWhere('middle_name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%");
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
    }

    public function getUserFullName($user)
    {
        return "{$user->first_name} {$user->middle_name} {$user->last_name}";
    }

    public function render()
    {
        return view('livewire.admin.submission-entries')
            ->extends('layouts.app')
            ->title('Submission Entries')
            ->section('content');
    }
}
