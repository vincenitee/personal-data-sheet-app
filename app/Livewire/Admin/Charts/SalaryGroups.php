<?php

namespace App\Livewire\Admin\Charts;

use Livewire\Component;
use App\Models\PdsEntry;
use App\Models\WorkExperience;

class SalaryGroups extends Component
{
    public $chartData;

    public function mount()
    {
        $approvedEntries = PdsEntry::where('status', 'approved')->get();

        // Fetch the latest work experience per employee
        $latestWorkExperiences = WorkExperience::whereIn('pds_entry_id', $approvedEntries->pluck('id'))
            ->select('pds_entry_id', 'position', 'date_from', 'date_to', 'salary') // Assuming 'salary' column exists
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('work_experiences')
                    ->groupBy('pds_entry_id');
            })->get();

        // Define salary ranges
        $salaryRanges = [
            '₱5k - ₱13k' => 0,
            '₱13k - ₱18k' => 0,
            '₱18k - ₱25k' => 0,
            '₱25k - ₱40k' => 0,
            '₱40k - ₱60k' => 0,
            '₱60k - ₱90k' => 0,
            '₱90k - ₱140k' => 0,
            '₱140k+' => 0,
        ];

        foreach ($latestWorkExperiences as $work) {
            $salary = $work->salary ?? 0; // Ensure salary exists, default to 0

            if ($salary >= 5000 && $salary <= 13000) {
                $salaryRanges['₱5k - ₱13k']++;
            } elseif($salary >= 13000 && $salary <= 18000){
                $salaryRanges['₱13k - ₱18k']++;
            } elseif ($salary <= 25000) {
                $salaryRanges['₱18k - ₱25k']++;
            } elseif ($salary <= 40000) {
                $salaryRanges['₱25k - ₱40k']++;
            } elseif ($salary <= 60000) {
                $salaryRanges['₱40k - ₱60k']++;
            } elseif ($salary <= 90000) {
                $salaryRanges['₱60k - ₱90k']++;
            } elseif ($salary <= 140000) {
                $salaryRanges['₱90k - ₱140k']++;
            } else {
                $salaryRanges['₱140k+']++;
            }
        }

        // Format data for ApexCharts
        $this->chartData = [
            'labels' => array_keys($salaryRanges),
            'series' => [
                [
                    'name' => 'Number of Employees',
                    'data' => array_values($salaryRanges),
                ]
            ]
        ];

        // dd($this->chartData);
    }


    public function render()
    {
        return view('livewire.admin.charts.salary-groups');
    }
}
