<?php

namespace App\Livewire\Admin\Dashboard;

use App\Enums\SubmissionStatus;
use App\Models\PdsEntry;
use Livewire\Component;

class PendingPdsEntries extends Component
{
    public $pendingPdsSubmissionsCount;
    public $totalPdsEntriesCount;
    public $percentageUnderReview;

    public function mount()
    {
        $this->pendingPdsSubmissionsCount = PdsEntry::where('status', 'under_review')->count();
        $this->totalPdsEntriesCount = PdsEntry::count(); // Total PDS entries

        // Avoid division by zero
        $this->percentageUnderReview = ($this->totalPdsEntriesCount > 0)
            ? round(($this->pendingPdsSubmissionsCount / $this->totalPdsEntriesCount) * 100, 2)
            : 0;
    }

    public function placeholder()
    {
        return view('placeholders.dashboard-card', ['showProgressBar' => false]);
    }

    public function render()
    {
        return view('livewire.admin.dashboard.pending-pds-entries');
    }
}
