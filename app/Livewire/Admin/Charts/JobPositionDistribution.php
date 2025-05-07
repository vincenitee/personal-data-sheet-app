<?php

namespace App\Livewire\Admin\Charts;

use App\Models\WorkExperience;
use App\Models\PdsEntry;
use Dompdf\Dompdf;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\On;

class JobPositionDistribution extends Component
{
    public $chartData = [];
    public $positionDetails = [];

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

        // Group employees by position and store their IDs
        $this->positionDetails = $latestWorkExperiences->groupBy('position')
            ->map(function ($group) {
                return $group->pluck('pds_entry_id')->toArray();
            })->toArray();

        // Count occurrences of each job position
        // Fix: Using array_map to get the count of each array in positionDetails
        $positionCounts = collect($this->positionDetails)->map(function ($ids) {
            return count($ids);
        });

        // Format data for ApexCharts
        $this->chartData = [
            'labels' => $positionCounts->keys()->toArray(), // Job positions
            'series' => $positionCounts->values()->toArray(), // Count of employees per position
        ];
    }

    #[On('downloadPositionEmployeeList')]
    public function downloadPositionEmployeeList($position)
    {
        // Check if position exists in our data
        if (!isset($this->positionDetails[$position])) {
            return;
        }

        dump($this->positionDetails[$position]);
        // Fetch the full employee entries for this position
        $entries = PdsEntry::whereIn('id', $this->positionDetails[$position])->get();

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            // 'sex' => 'Sex',
            // 'birth_date' => 'Birth Date',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'position' => 'Position',
        ];


        // Set the title and generated date
        $title = 'Employee List - ' . $position . ' Position';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_position_' . Str::slug($position, '_') . '_' . now()->format('Ymd_His') . '.pdf';

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
    public function downloadEmployeeList()
    {
        // Fetch all employee entries
        $entries = PdsEntry::with('user') // Assuming each PdsEntry is related to a user
            ->get();

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            // 'sex' => 'Sex',
            // 'birth_date' => 'Birth Date',
            'office' => 'Office',
            'email' => 'Email',
            'mobile_no' => 'Mobile No',
            'position' => 'Position',
        ];


        // Set the title and generated date
        $title = 'Complete Employee Overview Report';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.entries-report', compact('entries', 'columns', 'title', 'generatedDate'))->render();

        $fileName = 'employee_overview_' . now()->format('Ymd_His') . '.pdf';

        // Generate PDF with Dompdf
        $dompdf = new Dompdf([
            'defaultFont' => 'Arial',
            'isRemoteEnabled' => true
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Optional: use landscape if data is wide
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
        $this->dispatch('jobChartUpdated', $this->chartData);
    }

    public function dehydrate()
    {
        $this->dispatch('job-chart-loaded', chartData: $this->chartData);
    }

    public function render()
    {
        return view('livewire.admin.charts.job-position-distribution');
    }
}
