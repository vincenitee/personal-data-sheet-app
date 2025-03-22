<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Enums\BloodType;
use App\Enums\CivilStatus;
use Illuminate\Support\Str;
use App\Enums\EmploymentStatus;
use App\Enums\TrainingTypes;

class FilterOptions extends Component
{
    // Personal Information
    public $nameSearch;
    public $minAge;
    public $maxAge;
    public $birthDateFrom;
    public $birthDateTo;
    public $sexFilter;
    public $civilStatusFilter;
    public $bloodTypeFilter;

    // Educational Background Filters
    public $educationLevelFilter;
    public $schoolNameSearch;
    public $degreeEarnedSearch;
    public $attendanceFrom;
    public $attendanceTo;
    public $minUnits;
    public $maxUnits;
    public $minYearGraduated;
    public $maxYearGraduated;
    public $academicHonorsSearch;

    public function applyFilters()
    {
        $this->dispatch('filtersApplied', [
            'personalInformation' => [
                'nameSearch' => $this->nameSearch,
                'minAge' => $this->minAge,
                'maxAge' => $this->maxAge,
                'birthDateFrom' => $this->birthDateFrom,
                'birthDateTo' => $this->birthDateTo,
                'sexFilter' => $this->sexFilter,
                'civilStatusFilter' => $this->civilStatusFilter,
                'bloodTypeFilter' => $this->bloodTypeFilter,
            ],
            'educationalBackground' => [
                'educationLevelFilter' => $this->educationLevelFilter,
                'degreeEarnedSearch' => $this->degreeEarnedSearch,
                'attendanceFrom' => $this->attendanceFrom,
                'attendanceTo' => $this->attendanceTo,
                'minUnits' => $this->minUnits,
                'maxUnits' => $this->maxUnits,
                'minYearGraduated' => $this->minYearGraduated,
                'maxYearGraduated' => $this->maxYearGraduated,
                'academicHonorsSearch' => $this->academicHonorsSearch,
            ],
        ]);
    }

    public function resetFilters() {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.filter-options', [
            'civilStatus' => CivilStatus::cases(),
            'bloodType' => BloodType::cases(),
            'employmentStatus' => EmploymentStatus::cases(),
            'trainingTypes' => TrainingTypes::cases(),
        ]);
    }
}
