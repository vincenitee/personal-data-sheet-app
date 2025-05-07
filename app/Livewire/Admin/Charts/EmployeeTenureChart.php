<?php

namespace App\Livewire\Admin\Charts;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Livewire\Component;
use App\Models\PdsEntry;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
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
                'years' => $years,
                'pds_entry_id' => $work->pds_entry_id
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

        $this->chartData = [
            'labels' => array_keys($tenureRanges),
            'series' => [
                [
                    'name' => 'Employees',
                    'data' => array_values(array_map('count', $tenureRanges))
                ]
            ]
        ];

        // dd($this->chartData);

        // Store employee details for UI display
        $this->employeeDetails = $tenureRanges;

        // dump($this->chartData);
    }

    #[On('downloadEmployeeList')]
    public function downloadEmployeeList($tenureRange)
    {
        // Get employee IDs for the selected tenure range from the pre-calculated data
        if (!isset($this->employeeDetails[$tenureRange])) {
            return;
        }

        $employeeIds = collect($this->employeeDetails[$tenureRange])->pluck('pds_entry_id')->toArray();

        // Fetch the full employee entries
        $entries = PdsEntry::whereIn('id', $employeeIds)->get();

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'years_experience' => 'Years of Experience',
        ];

        // Set the title and generated date
        $title = 'Employee Tenure Report - ' . $tenureRange;
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_tenure_' . Str::slug($tenureRange, '_') . '_' . now()->format('Ymd_His') . '.pdf';

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

    #[On('downloadAllEmployee')]
    public function downloadAllEmployee()
    {
        // Collect all employee IDs from all tenure ranges
        $allEmployeeIds = [];
        foreach ($this->employeeDetails as $range => $employees) {
            foreach ($employees as $employee) {
                $allEmployeeIds[] = $employee['pds_entry_id'];
            }
        }

        // Remove duplicates if any
        $allEmployeeIds = array_unique($allEmployeeIds);

        // Fetch the full employee entries
        $entries = PdsEntry::whereIn('id', $allEmployeeIds)->get();

        // Add years of experience from our already calculated data
        foreach ($entries as $entry) {
            // Find the employee in our chart data
            foreach ($this->employeeDetails as $range => $employees) {
                foreach ($employees as $employee) {
                    if ($employee['pds_entry_id'] == $entry->id) {
                        $entry->years_experience = $employee['years'];
                        $entry->position = $employee['position'];
                        break 2; // Break out of both loops once found
                    }
                }
            }
        }

        // Sort entries by years of experience
        $entries = $entries->sortBy('years_experience')->values();

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'years_experience' => 'Years of Experience',
        ];

        // Set the title and generated date
        $title = 'Complete Employee Report (Sorted by Experience)';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_report_all_sorted_' . now()->format('Ymd_His') . '.pdf';

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

        // For Livewire, we need to handle the download in the browser
        $downloadUrl = asset('storage/reports/' . $fileName);

        // Dispatch a browser event to trigger the download
        return response()->download($pdfPath);
    }

    public function refreshChart()
    {
        $this->mount();
        $this->dispatch('employeeTenureChartUpdated', chartData: $this->chartData);
    }

    public function render()
    {
        return view('livewire.admin.charts.employee-tenure-chart');
    }
}
