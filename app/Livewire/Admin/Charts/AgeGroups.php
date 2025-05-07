<?php

namespace App\Livewire\Admin\Charts;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Livewire\Component;
use App\Models\PdsEntry;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;

class AgeGroups extends Component
{
    public $chartData = [];
    public $employeeDetails = [];

    public function mount()
    {
        $approvedEntries = PdsEntry::whereHas('personalInformation', function (Builder $query) {
            $query->whereNotNull('birth_date');
        })->where('status', 'approved')->with('personalInformation')->get();

        // Initialize age categories with empty arrays to store employee details
        $ageGroups = [
            '18-30' => [],
            '31-40' => [],
            '41-50' => [],
            '51-60' => [],
            '61+' => []
        ];

        foreach ($approvedEntries as $entry) {
            $birthDate = optional($entry->personalInformation)->birth_date;

            if ($birthDate) {
                $age = Carbon::parse($birthDate)->age;

                // Build employee name
                $employeeName = $entry->personalInformation->first_name . ' ' .
                    ($entry->personalInformation->middle_name ? $entry->personalInformation->middle_name . ' ' : '') .
                    $entry->personalInformation->last_name;

                // Get position (assuming you have this data - adjust as needed)
                $position = optional($entry->latestWorkExperience)->position ?? 'N/A';

                // Store employee details
                $employeeDetails = [
                    'name' => $employeeName,
                    'position' => $position,
                    'age' => $age,
                    'pds_entry_id' => $entry->id
                ];


                // Categorize by age group
                if ($age >= 18 && $age <= 30) {
                    $ageGroups['18-30'][] = $employeeDetails;
                } elseif ($age >= 31 && $age <= 40) {
                    $ageGroups['31-40'][] = $employeeDetails;
                } elseif ($age >= 41 && $age <= 50) {
                    $ageGroups['41-50'][] = $employeeDetails;
                } elseif ($age >= 51 && $age <= 60) {
                    $ageGroups['51-60'][] = $employeeDetails;
                } else {
                    $ageGroups['61+'][] = $employeeDetails;
                }
            }
        }

        // Format for ApexCharts
        $this->chartData = [
            'labels' => array_keys($ageGroups),
            'series' => [
                [
                    'name' => 'Employees',
                    'data' => array_values(array_map('count', $ageGroups))
                ]
            ]
        ];

        // dd($this->chartData);

        // Store employee details for UI display and download
        $this->employeeDetails = $ageGroups;
    }

    #[On('downloadEmployeeList')]
    public function downloadEmployeeList($ageGroup)
    {
        // Get employee IDs for the selected age group from the pre-calculated data
        if (!isset($this->employeeDetails[$ageGroup])) {
            return;
        }

        $employeeIds = collect($this->employeeDetails[$ageGroup])->pluck('pds_entry_id')->toArray();

        // Fetch the full employee entries
        $entries = PdsEntry::whereIn('id', $employeeIds)->get();

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            'age' => 'Age',
        ];

        // Set the title and generated date
        $title = 'Employee Age Group Report - ' . $ageGroup;
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.age-group', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_age_group_' . Str::slug($ageGroup, '_') . '_' . now()->format('Ymd_His') . '.pdf';

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

    #[On('downloadAllEmployee')]
    public function downloadAllEmployee()
    {
        // Fetch approved entries with personalInformation (required for age)
        $entries = PdsEntry::with('personalInformation')
            ->where('status', 'approved')
            ->whereHas('personalInformation')
            ->get()
            ->sortBy(function ($entry) {
                // Calculate age from birth_date (you may adjust the field name)
                return optional($entry->personalInformation->birth_date)
                    ? \Carbon\Carbon::parse($entry->personalInformation->birth_date)->age
                    : PHP_INT_MAX; // Push entries without birth_date to the bottom
            });

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'age' => 'Age',
        ];

        // Set the title and generated date
        $title = 'Employee Age Group Report (Youngest to Oldest)';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.age-group', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_age_group_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Dompdf
        $dompdf = new \Dompdf\Dompdf([
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
        $this->mount();
        $this->dispatch('ageGroupsChartUpdated', chartData: $this->chartData);
    }

    public function render()
    {
        return view('livewire.admin.charts.age-groups');
    }
}