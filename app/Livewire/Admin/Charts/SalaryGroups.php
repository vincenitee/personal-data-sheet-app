<?php

namespace App\Livewire\Admin\Charts;

use Dompdf\Dompdf;
use Livewire\Component;
use App\Models\PdsEntry;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Models\WorkExperience;

class SalaryGroups extends Component
{
    public $chartData = [];

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $approvedEntries = PdsEntry::where('status', 'approved')->get();

        // Fetch the latest work experience per employee
        $latestWorkExperiences = WorkExperience::whereIn('pds_entry_id', $approvedEntries->pluck('id'))
            ->select('pds_entry_id', 'position', 'date_from', 'date_to', 'salary')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('work_experiences')
                    ->groupBy('pds_entry_id');
            })->get();

        // Define salary ranges
        $salaryRanges = [
            'P5k - P13k' => 0,
            'P13k - P18k' => 0,
            'P18k - P25k' => 0,
            'P25k - P40k' => 0,
            'P40k - P60k' => 0,
            'P60k - P90k' => 0,
            'P90k - P140k' => 0,
            'P140k+' => 0,
        ];

        foreach ($latestWorkExperiences as $work) {
            $salary = $work->salary ?? 0; // Ensure salary exists, default to 0

            if ($salary >= 5000 && $salary <= 13000) {
                $salaryRanges['P5k - P13k']++;
            } elseif ($salary > 13000 && $salary <= 18000) {
                $salaryRanges['P13k - P18k']++;
            } elseif ($salary > 18000 && $salary <= 25000) {
                $salaryRanges['P18k - P25k']++;
            } elseif ($salary > 25000 && $salary <= 40000) {
                $salaryRanges['P25k - P40k']++;
            } elseif ($salary > 40000 && $salary <= 60000) {
                $salaryRanges['P40k - P60k']++;
            } elseif ($salary > 60000 && $salary <= 90000) {
                $salaryRanges['P60k - P90k']++;
            } elseif ($salary > 90000 && $salary <= 140000) {
                $salaryRanges['P90k - P140k']++;
            } else {
                $salaryRanges['P140k+']++;
            }
        }

        // Format data for ApexCharts
        $this->chartData = [
            'labels' => array_keys($salaryRanges),
            'series' => array_values($salaryRanges)
        ];
    }

    #[On('downloadSalaryList')]
    public function downloadSalaryList($salaryRange)
    {
        // Parse the salary range
        $range = $salaryRange;
        $min = 0;
        $max = 0;

        // Extract min and max values from the salary range
        if ($range === 'P5k - P13k') {
            $min = 5000;
            $max = 13000;
        } elseif ($range === 'P13k - P18k') {
            $min = 13001;
            $max = 18000;
        } elseif ($range === 'P18k - P25k') {
            $min = 18001;
            $max = 25000;
        } elseif ($range === 'P25k - P40k') {
            $min = 25001;
            $max = 40000;
        } elseif ($range === 'P40k - P60k') {
            $min = 40001;
            $max = 60000;
        } elseif ($range === 'P60k - P90k') {
            $min = 60001;
            $max = 90000;
        } elseif ($range === 'P90k - P140k') {
            $min = 90001;
            $max = 140000;
        } elseif ($range === 'P140k+') {
            $min = 140001;
            $max = PHP_INT_MAX;
        }

        // Get approved entries
        $approvedEntries = PdsEntry::where('status', 'approved')->get();

        // Get entries with the selected salary range
        $entries = collect();

        foreach ($approvedEntries as $entry) {
            $latestWorkExperience = WorkExperience::where('pds_entry_id', $entry->id)
                ->orderBy('id', 'desc')
                ->first();

            if ($latestWorkExperience &&
                $latestWorkExperience->salary >= $min &&
                $latestWorkExperience->salary <= $max) {
                $entries->push($entry);
            }
        }

        $entries = $entries->sortBy(function ($entry) {
            return optional($entry->workExperiences->sortByDesc('date_to')->first())->monthly_salary ?? 0;
        });
        
        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            // 'education' => 'Highest Education',
            'salary' => 'Current Salary',
            // 'years_experience' => 'Years of Experience',
            // 'eligibility' => 'Eligibility',
            // 'trainings' => 'No. of Trainings'
        ];

        // Set the title and generated date
        $title = 'Employee List - Salary Range: ' . $range;
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF - fixed compact function
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_list_salary_' . Str::slug($range, '_') . '_' . now()->format('Ymd_His') . '.pdf';

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
        // Get all approved PDS entries
        $approvedEntries = PdsEntry::where('status', 'approved')->get();

        // Get entries with their latest work experience
        $entries = collect();

        foreach ($approvedEntries as $entry) {
            $latestWorkExperience = WorkExperience::where('pds_entry_id', $entry->id)
                ->orderBy('id', 'desc')
                ->first();

            // dd($latestWorkExperience);

            if ($latestWorkExperience) {
                // Attach latest work experience info to the entry for reporting
                $entry->latestWorkExperience = $latestWorkExperience;
                $entries->push($entry);
            }
        }

        $entries = $entries->sortBy(function ($entry) {
            return optional($entry->workExperiences->sortByDesc('date_to')->first())->monthly_salary ?? 0;
        });
        // dd($entries);

        // Define columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            'salary' => 'Current Salary',
        ];

        // Set title and date
        $title = 'Complete Employee Overview (Salary Groups)';
        $generatedDate = now()->format('F d, Y');

        // Generate the report view HTML
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        // Set file name
        $fileName = 'employee_list_all_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Dompdf
        $dompdf = new Dompdf([
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true,
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Store the PDF file
        $output = $dompdf->output();
        $pdfPath = storage_path("app/public/reports/$fileName");
        file_put_contents($pdfPath, $output);

        // Return the file for download
        return response()->download($pdfPath);
    }

    public function refreshChart()
    {
        $this->loadChartData();
        $this->dispatch('salaryChartUpdated', $this->chartData);
    }

    public function render()
    {
        return view('livewire.admin.charts.salary-groups');
    }
}