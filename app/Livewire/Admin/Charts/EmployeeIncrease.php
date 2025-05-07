<?php

namespace App\Livewire\Admin\Charts;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class EmployeeIncrease extends Component
{
    public $employeeCounts = [];
    public $months = [];
    public $employeeDetails = [];

    public function mount()
    {
        $this->getEmployeeGrowthData();
    }

    protected function getEmployeeGrowthData()
    {
        $this->employeeCounts = [];
        $this->months = [];
        $this->employeeDetails = [];

        // Get employee counts for the last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $startOfMonth = Carbon::now()->subMonths($i)->startOfMonth();
            $endOfMonth = Carbon::now()->subMonths($i)->endOfMonth();
            $monthKey = $startOfMonth->format('M Y'); // Example: "Jan 2024"

            $users = User::role('employee')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->get();

            $count = $users->count();

            // Store counts and formatted month names
            $this->employeeCounts[] = $count;
            $this->months[] = $monthKey;

            // Store employee details for potential download
            $this->employeeDetails[$monthKey] = $users->map(function ($user) {
                return [
                    'pds_entry_id' => $user->pds_entry_id,
                    'name' => $user->name,
                    'sex' => $user->sex,
                    'birth_date' => $user->birth_date,
                    'email' => $user->email,
                    'department' => $user->department,
                    'created_at' => $user->created_at->format('Y-m-d'),
                ];
            })->toArray();
        }
    }

    #[On('refreshEmployeeGrowthChart')]
    public function refreshChart()
    {
        $this->getEmployeeGrowthData();
        $this->dispatch('employeeGrowthDataUpdated', [
            'months' => $this->months,
            'employeeCounts' => $this->employeeCounts
        ]);
    }

    #[On('downloadMonthlyEmployeeList')]
    public function downloadMonthlyEmployeeList($month)
    {
        if (!isset($month) || !isset($this->employeeDetails[$month])) {
            return;
        }

        // Convert the stored employee details back to collection
        $users = collect($this->employeeDetails[$month])->map(function ($details) {
            $user = new User();
            foreach ($details as $key => $value) {
                $user->$key = $value;
            }
            return $user;
        });

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'sex' => 'Sex',
            'birth_date' => 'Birth Date',
            'email' => 'Email',
            'department' => 'Office',
            'created_at' => 'Date Joined'
        ];

        // Set the title and generated date
        $title = 'Monthly Employee Growth Report - ' . $month;
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.month-users', compact('users', 'columns', 'title', 'generatedDate'))->render();

        // Ensure a valid filename
        $fileName = 'monthly_employee_growth_' . Str::slug($month, '_') . '_' . now()->format('Ymd_His') . '.pdf';

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
        return response()->download($pdfPath)->deleteFileAfterSend();
    }

    #[On('downloadAllEmployee')]
    public function downloadAllEmployee()
    {
        // Fetch all approved users (employees)
        $users = User::with(['entries.personalInformation'])
            ->whereHas('entries', function ($query) {
                $query->where('status', 'approved');
            })
            ->get()
            ->sortBy('created_at'); // Optional: sort by date joined (or use 'name' if preferred)

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'sex' => 'Sex',
            'birth_date' => 'Birth Date',
            'email' => 'Email',
            'department' => 'Office',
            'created_at' => 'Date Joined'
        ];

        // Set the title and generated date
        $title = 'Complete List Overview (Date Joined)';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF
        $html = view('reports.month-users', compact('users', 'columns', 'title', 'generatedDate'))->render();

        // Ensure a valid filename
        $fileName = 'employees_date_joined_' . now()->format('Ymd_His') . '.pdf';

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
        return response()->download($pdfPath)->deleteFileAfterSend();
    }


    public function render()
    {
        return view('livewire.admin.charts.employee-increase', [
            'employeeCounts' => $this->employeeCounts,
            'months' => $this->months,
        ]);
    }
}