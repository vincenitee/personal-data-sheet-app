<?php

namespace App\Livewire\Admin\Charts;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PdsEntry;
use App\Models\WorkExperience;

class EmployeeTenureChart extends Component
{
    public $chartData = [];
    public $employeeDetails;

    public function mount()
    {
        $approvedEntries = PdsEntry::where('status', 'approved')->get();

        // Fetch the latest work experience per employee
        $latestWorkExperiences = WorkExperience::whereIn('pds_entry_id', $approvedEntries->pluck('id'))
            ->select('pds_entry_id', 'position', 'date_from', 'date_to')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('work_experiences')
                    ->groupBy('pds_entry_id');
            })->get();

        // Initialize tenure categories
        $tenureRanges = [
            '0-2 years' => [],
            '3-5 years' => [],
            '6-10 years' => [],
            '11-20 years' => [],
            '20+ years' => [],
        ];

        // Loop through work experiences to categorize employees
        foreach ($latestWorkExperiences as $work) {
            $employee = PdsEntry::find($work->pds_entry_id);
            $employeeName = $employee
                ? $employee->first_name . ' ' . ($employee->middle_name ? $employee->middle_name . ' ' : '') . $employee->last_name
                : "Unknown";

            $fromDate = Carbon::parse($work->date_from);
            $toDate = $work->date_to ? Carbon::parse($work->date_to) : now();
            $years = $fromDate->diffInYears($toDate);

            // Store employee details
            $employeeDetails = [
                'name' => $employeeName,
                'position' => $work->position,
                'years' => $years
            ];

            // Assign to the correct category
            if ($years <= 2) {
                $tenureRanges['0-2 years'][] = $employeeDetails;
            } elseif ($years <= 5) {
                $tenureRanges['3-5 years'][] = $employeeDetails;
            } elseif ($years <= 10) {
                $tenureRanges['6-10 years'][] = $employeeDetails;
            } elseif ($years <= 20) {
                $tenureRanges['11-20 years'][] = $employeeDetails;
            } else {
                $tenureRanges['20+ years'][] = $employeeDetails;
            }
        }

        // ✅ Correct format for ApexCharts
        $this->chartData = [
            'labels' => array_keys($tenureRanges), // ✅ Labels are correct
            'series' => [
                [
                    'name' => 'Employees',
                    'data' => array_values(array_map('count', $tenureRanges)) // ✅ Correctly counts each category
                ]
            ]
        ];

        // Store employee details for UI display
        $this->employeeDetails = $tenureRanges;

        // dump($this->chartData);
    }


    public function render()
    {
        return view('livewire.admin.charts.employee-tenure-chart');
    }
}
