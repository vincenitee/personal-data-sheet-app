<?php

namespace App\Livewire\Admin\Charts;

use Dompdf\Dompdf;
use App\Models\User;
use Livewire\Component;
use App\Models\PdsEntry;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class SexGroups extends Component
{
    public $chartData;

    public function mount()
    {
        $this->refreshChartData();
    }

    private function refreshChartData()
    {
        $approvedEntries = PdsEntry::with('personalInformation')
            ->where('status', 'approved')
            ->whereHas('personalInformation')
            ->get();

        $maleCount = $approvedEntries->filter(function ($entry) {
            return optional($entry->personalInformation)->sex === 'male';
        })->count();

        $femaleCount = $approvedEntries->filter(function ($entry) {
            return optional($entry->personalInformation)->sex === 'female';
        })->count();

        $this->chartData = [
            'labels' => ['Male', 'Female'],
            'series' => [$maleCount, $femaleCount]
        ];
    }


    #[On('downloadEmployeeList')]
    public function downloadEmployeeList($sex)
    {
        // Normalize sex value to lowercase for database comparison
        $sexLower = strtolower($sex);

        // Fetch employees with the selected sex
        $entries = PdsEntry::where('status', 'approved')
            ->whereHas('personalInformation', function ($query) use ($sexLower) {
                $query->where('sex', $sexLower);
            })->get();

        // Check if any entries were found
        if ($entries->isEmpty()) {
            session()->flash('error', 'No employees found with ' . $sex . ' gender.');
            return;
        }

        // dd($entries);

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'sex' => 'Sex',
            // 'education' => 'Highest Education',
            // 'employment_status' => 'Employment Status',
            // 'years_experience' => 'Years of Experience',
            // 'eligibility' => 'Eligibility',
            // 'trainings' => 'No. of Trainings'
        ];

        // Set the title and generated date
        $title = 'Employee List - ' . $sex . ' Employees';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_list_' . Str::slug($sex, '_') . '_' . now()->format('Ymd_His') . '.pdf';

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
    public function downloadAllEmployee(){
         // Fetch employees with the selected sex
        $entries = PdsEntry::select('pds_entries.*')
            ->join('personal_information', 'pds_entries.id', '=', 'personal_information.pds_entry_id')
            ->orderBy('personal_information.sex', 'desc')
            ->with('personalInformation') // Optional: still eager load for access
            ->get();


        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'position' => 'Position',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'sex' => 'Sex',
            // 'education' => 'Highest Education',
            // 'employment_status' => 'Employment Status',
            // 'years_experience' => 'Years of Experience',
            // 'eligibility' => 'Eligibility',
            // 'trainings' => 'No. of Trainings'
        ];

        // Set the title and generated date
        $title = 'Complete List Overview (Sex)';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_list_sex_' . now()->format('Ymd_His') . '.pdf';

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
        $this->refreshChartData();
        $this->dispatch('chartUpdated', $this->chartData);
    }

    public function dehydrate()
    {
        // This ensures the chart data is available when the component re-renders
        $this->dispatch('chartUpdated', $this->chartData);
    }

    public function render()
    {
        return view('livewire.admin.charts.sex-groups');
    }
}
