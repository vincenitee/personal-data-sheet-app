<?php

namespace App\Livewire\Admin\Charts;

use Livewire\Component;
use App\Models\PdsEntry;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Models\WorkExperience;
use App\Enums\EmploymentStatus;
use Spatie\Browsershot\Browsershot;

class EmployeeChart extends Component
{
    public $chartData = [];

    public function mount()
    {
        $approvedEntries = PdsEntry::where('status', 'approved')->get();

        // Get Employment Status Labels
        $labels = collect(EmploymentStatus::cases())->map(fn($status) => ucwords(str_replace('_', ' ', $status->value)));

        // Get the latest work experience for each approved entry
        $latestWorkExperiences = WorkExperience::whereIn('pds_entry_id', $approvedEntries->pluck('id'))
            ->select('pds_entry_id', 'status')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('work_experiences')
                    ->groupBy('pds_entry_id');
            })->get();

        // Get count of employees per employment status (current work experience)
        $series = collect(EmploymentStatus::cases())->map(
            fn($status) => $latestWorkExperiences->where('status', $status->value)->count()
        );

        // Count employees with NO prior work experience
        $employeesWithoutExperience = $approvedEntries->filter(
            fn($entry) => $latestWorkExperiences->where('pds_entry_id', $entry->id)->isEmpty()
        )->count();

        // Add "No Work Experience" to the labels and series
        $labels->push("No Prior Work Experience");
        $series->push($employeesWithoutExperience);

        // Store data for the chart
        $this->chartData = [
            'labels' => $labels->toArray(),
            'series' => $series->toArray()
        ];
    }


    #[On('downloadEmployeeList')]
    public function downloadEmployeeList($employmentStatus)
    {
        // dd($employmentStatus);
        // Fetch employees with the selected employment status
        if ($employmentStatus === "No Prior Work Experience") {
            $employees = PdsEntry::where('status', 'approved')->doesntHave('workExperiences')->get();
        } else {
            $employmentStatus = strtolower(str_replace(' ', '_', $employmentStatus));
            $employees = PdsEntry::where('status', 'approved')
                ->whereHas('workExperiences', function ($query) use ($employmentStatus) {
                    $query->where('status', $employmentStatus);
                })->get();

            // dd($employees);
        }

        // Generate HTML content for PDF
        $html = view('pdf.employee_list', compact('employees', 'employmentStatus'))->render();

        $fileName = 'employee_list_' . Str::slug($employmentStatus, '_') . '_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Browsershot
        $pdfPath = storage_path("app/public/reports/$fileName");
        Browsershot::html($html)
            ->waitUntilNetworkIdle()
            ->format('A4')
            ->save($pdfPath);

        // Return download response
        return response()->download($pdfPath);
    }


    public function refreshChart()
    {
        $this->mount(); // Refresh data
        $this->dispatch('chartUpdated', $this->chartData);
    }

    public function render()
    {
        return view('livewire.admin.charts.employee-chart');
    }
}
