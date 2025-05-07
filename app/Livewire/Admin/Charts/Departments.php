<?php

namespace App\Livewire\Admin\Charts;

use Dompdf\Dompdf;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Enums\MunicipalOffice;

class Departments extends Component
{
    public $chartData = [];
    public $employeeDetails = [];

    public function mount()
    {
        $users = User::where('status', 'approved')->get();

        $departments = $users->groupBy(function ($user) {
            $department = $user->department;
            return !is_null($department) ? MunicipalOffice::getValue($user->department) : 'No assigned department yet';
        });

        // Populate chart data
        $this->chartData = [
            'labels' => $departments->keys()->toArray(),
            'series' => [
                [
                    'name' => 'Employees',
                    'data' => $departments->map->count()->values()->toArray(),
                ]
            ]
        ];

        // Populate employee details for each department
        foreach ($departments as $department => $users) {
            $this->employeeDetails[$department] = $users->map(function ($user) {
                return [
                    'pds_entry_id' => $user->pds_entry_id,
                    'name' => $user->name,
                    // Add other fields you might need
                ];
            })->toArray();
        }
    }

    #[On('downloadEmployeeList')]
    public function downloadEmployeeList($department)
    {
        if (!isset($department)) {
            return;
        }

        $users = collect(); // Initialize empty collection

        if ($department === 'No assigned department yet') {
            $users = User::whereNull('department')
                ->where('status', 'approved')
                ->get();
            $departmentName = 'No assigned department yet';
        } else {
            $enumCase = MunicipalOffice::fromValue($department);
            if ($enumCase) {
                $departmentName = $enumCase->value;
                $users = User::where('status', 'approved')
                    ->orderByRaw("CASE WHEN department IS NULL THEN 1 ELSE 0 END") // Put NULLs last
                    ->orderBy('department') // Then sort alphabetically
                    ->get();
            } else {
                $departmentName = 'Unknown Department';
            }
        }

        // Remove the debug statement
        // dd($users);

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'sex' => 'Sex',
            'birth_date' => 'Birth Date',
            'email' => 'Email',
            'department' => 'Office',
        ];

        // Set the title and generated date
        $title = 'Employee Department Report - ' . $departmentName;
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF - corrected variable name from entries to users
        $html = view('reports.department-users', compact('users', 'columns', 'title', 'generatedDate'))->render();

        // Ensure a valid filename
        $fileName = 'employee_department_' . Str::slug($departmentName ?: 'unknown', '_') . '_' . now()->format('Ymd_His') . '.pdf';

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
        $users = User::where('status', 'approved')
            ->orderByRaw("CASE WHEN department IS NULL THEN 1 ELSE 0 END") // Put NULLs last
            ->orderBy('department')
            ->get();

        // Remove the debug statement
        // dd($users);

        // Define the columns to display in the report
        $columns = [
            'name' => 'Name',
            'sex' => 'Sex',
            'birth_date' => 'Birth Date',
            'email' => 'Email',
            'department' => 'Office',
        ];

        // Set the title and generated date
        $title = 'Complete Employee Overview (Department)';
        $generatedDate = now()->format('F d, Y');

        // Generate HTML content for PDF - corrected variable name from entries to users
        $html = view('reports.department-users', compact('users', 'columns', 'title', 'generatedDate'))->render();

        // Ensure a valid filename
        $fileName = 'employee_department_' . now()->format('Ymd_His') . '.pdf';

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
        return view('livewire.admin.charts.departments');
    }
}