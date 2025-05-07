<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\PdsEntry;

class ApprovedPdsEntries extends Component
{

    public $approvedPdsSubmissionsCount;
    public $totalPdsEntriesCount;
    public $percentageApproved;
    public $link;

    public function mount()
    {
        $this->approvedPdsSubmissionsCount = PdsEntry::where('status', 'approved')->count();
        $this->totalPdsEntriesCount = PdsEntry::count(); // Total PDS entries

        $this->link = route('admin.submissions');
        // Avoid division by zero
        $this->percentageApproved = ($this->totalPdsEntriesCount > 0)
            ? round(($this->approvedPdsSubmissionsCount / $this->totalPdsEntriesCount) * 100, 2)
            : 0;
    }

    public function placeholder()
    {
        return view('placeholders.dashboard-card', ['showProgressBar' => false]);
    }
    public function render()
    {
        return view('livewire.admin.dashboard.approved-pds-entries');
    }
}
