<?php

namespace App\Livewire\Admin\Charts;

use Dompdf\Dompdf;
use Livewire\Component;
use App\Models\PdsEntry;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use App\Models\WorkExperience;
use App\Enums\EmploymentStatus;

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
        // Fetch employees with the selected employment status
        if ($employmentStatus === "No Prior Work Experience") {
            $entries = PdsEntry::where('status', 'approved')->doesntHave('workExperiences')->get();
        } else {
            $employmentStatus = strtolower(str_replace(' ', '_', $employmentStatus));
            $entries = PdsEntry::where('status', 'approved')
                ->whereHas('workExperiences', function ($query) use ($employmentStatus) {
                    $query->where('status', $employmentStatus);
                })->get();
        }

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            // 'sex' => 'Sex',
            // 'position' => 'Position',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'employment_status' => 'Employment Status',
        ];

        // Set the title and generated date
        $title = 'Employee List - ' . Str::title(str_replace('_', ' ', ucwords($employmentStatus))) . ' Status';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_list_' . Str::slug($employmentStatus, '_') . '_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Dompdf
        $dompdf = new Dompdf([
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Store the file
        $output = $dompdf->output();
        $pdfPath = storage_path("app/public/reports/$fileName");
        file_put_contents($pdfPath, $output);

        // Return download response
        return response()->download($pdfPath);
    }

    #[On('downloadAllEmployees')]
    public function downloadAllEmployee(){

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            // 'sex' => 'Sex',
            // 'position' => 'Position',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'employment_status' => 'Employment Status',
        ];

        $entries = PdsEntry::where('status', 'approved')
                ->whereHas('workExperiences')->get();

        $title = 'Complete List Overview (Employment Status)';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_list_by_employment_status_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Dompdf
        $dompdf = new Dompdf([
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Store the file
        $output = $dompdf->output();
        $pdfPath = storage_path("app/public/reports/$fileName");
        file_put_contents($pdfPath, $output);

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
