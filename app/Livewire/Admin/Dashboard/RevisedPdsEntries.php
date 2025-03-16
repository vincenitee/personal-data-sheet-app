<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\PdsEntry;
use Livewire\Component;

class RevisedPdsEntries extends Component
{
    public $revisionPdsSubmissionCount;
    public $totalPdsEntriesCount;
    public $percentageRevised;

    public function mount(){
        $this->revisionPdsSubmissionCount = PdsEntry::where('status', 'needs_revision')->count();
        $this->totalPdsEntriesCount = PdsEntry::count();
        $this->percentageRevised = ($this->totalPdsEntriesCount > 0)
            ? round(($this->revisionPdsSubmissionCount / $this->totalPdsEntriesCount) * 100, 2)
            : 0;
    }

    public function placeholder()
    {
        return view('placeholders.dashboard-card', ['showProgressBar' => false]);
    }

    public function render()
    {
        return view('livewire.admin.dashboard.revised-pds-entries');
    }
}
