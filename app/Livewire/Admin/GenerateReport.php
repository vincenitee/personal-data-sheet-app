<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Enums\BloodType;
use App\Models\PdsEntry;
use App\Enums\CivilStatus;
use App\Enums\TrainingTypes;
use App\Enums\EmploymentStatus;
use Illuminate\Support\Facades\DB;

class GenerateReport extends Component
{

    public $employees = [];

    public $reportTitle = null;

    protected $listeners = ['filtersApplied'];

    public function mount()
    {
        $entries = PdsEntry::where('status', 'approved')
            ->whereHas('user')->get();

        $this->employees = [
            [
                'name' => 'Juan Dela Cruz',
                'job_position' => 'Administrative Officer',
                'department' => 'Human Resources',
                'education' => "Master's Degree in Public Administration",
                'employment_type' => 'Permanent',
                'years_in_service' => 10,
                'eligibility' => 'Civil Service Professional',
                'status' => 'Active',
            ],
            [
                'name' => 'Maria Santos',
                'job_position' => 'Finance Analyst',
                'department' => 'Finance Department',
                'education' => "Bachelor's Degree in Accountancy",
                'employment_type' => 'Contractual',
                'years_in_service' => 5,
                'eligibility' => 'Certified Public Accountant',
                'status' => 'Probationary',
            ],
            [
                'name' => 'Carlos Rodriguez',
                'job_position' => 'IT Specialist',
                'department' => 'Information Technology',
                'education' => "Bachelor's Degree in Computer Science",
                'employment_type' => 'Job Order',
                'years_in_service' => 2,
                'eligibility' => 'None',
                'status' => 'Inactive',
            ],
            [
                'name' => 'Ana Mendoza',
                'job_position' => 'Public Relations Officer',
                'department' => 'Public Relations',
                'education' => "Bachelor's Degree in Communications",
                'employment_type' => 'Permanent',
                'years_in_service' => 8,
                'eligibility' => 'Civil Service Sub-Professional',
                'status' => 'Active',
            ],
            [
                'name' => 'Roberto Villanueva',
                'job_position' => 'Legal Officer',
                'department' => 'Legal Affairs',
                'education' => 'Juris Doctor',
                'employment_type' => 'Permanent',
                'years_in_service' => 12,
                'eligibility' => 'Bar Passer',
                'status' => 'Active',
            ],
        ];
    }

    public function filtersApplied($filters)
    {
        dd($filters);
        $query = PdsEntry::query();

        // Personal Information Filter

        // Name search filter
        if (!empty($filters['personalInformation']['nameSearch'])) {
            $query->whereHas('personalInformation', function ($q) use ($filters) {
                $search = '%' . $filters['personalInformation']['nameSearch'] . '%';
                $q->where('first_name', 'LIKE', $search)
                    ->orWhere('middle_name', 'LIKE', $search)
                    ->orWhere('last_name', 'LIKE', $search)
                    ->orWhere('suffix', 'LIKE', $search);
            });
        }

        // Age min filter
        if (!empty($filters['personalInformation']['minAge'])) {
            $query->whereHas('personalInformation', function ($q) use ($filters) {
                $q->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= ?', [$filters['personalInformation']['minAge']]);
            });
        }

        // Age max filter
        if (!empty($filters['personalInformation']['maxAge'])) {
            $query->whereHas('personalInformation', function ($q) use ($filters) {
                $q->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) <= ?', [$filters['personalInformation']['maxAge']]);
            });
        }

        // Apply birth date range filter
        if (!empty($filters['personalInformation']['birthDateFrom'])) {
            $query->whereHas('personalInformation', function ($q) use ($filters) {
                $q->whereDate('birth_date', '>=', $filters['personalInformation']['birthDateFrom']);
            });
        }

        if (!empty($filters['personalInformation']['birthDateTo'])) {
            $query->whereHas('personalInformation', function ($q) use ($filters) {
                $q->whereDate('birth_date', '<=', $filters['personalInformation']['birthDateTo']);
            });
        }

        // Apply sex filter
        if (!empty($filters['personalInformation']['sexFilter'])) {
            $query->whereHas('personalInformation', function ($q) use ($filters) {
                $q->where('sex', $filters['personalInformation']['sexFilter']);
            });
        }


        // dd($query->toSql(), $query->getBindings());
        dd($query->get());
    }

    public function exportReport() {}

    public function render()
    {
        return view('livewire.admin.generate-report')
            ->extends('layouts.app')
            ->section('content')
            ->title('Generate Reports')
        ;
    }
}
