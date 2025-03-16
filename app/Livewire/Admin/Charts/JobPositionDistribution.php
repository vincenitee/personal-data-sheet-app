<?php

namespace App\Livewire\Admin\Charts;

use App\Models\WorkExperience;
use App\Models\PdsEntry;
use Livewire\Component;

class JobPositionDistribution extends Component
{
    public $chartData = [];

    public function mount()
    {
        $approvedEntries = PdsEntry::where('status', 'approved')->get();

        $latestWorkExperiences = WorkExperience::whereIn('pds_entry_id', $approvedEntries->pluck('id'))
            ->select('pds_entry_id', 'position')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('work_experiences')
                    ->groupBy('pds_entry_id');
            })->get();

        // Count occurrences of each job position
        $positionCounts = $latestWorkExperiences->groupBy('position')->map->count();

        // Format data for ApexCharts
        $this->chartData = [
            'labels' => $positionCounts->keys()->toArray(), // Job positions
            'series' => $positionCounts->values()->toArray(), // Count of employees per position
        ];
    }


    public function render()
    {
        return view('livewire.admin.charts.job-position-distribution');
    }
}
