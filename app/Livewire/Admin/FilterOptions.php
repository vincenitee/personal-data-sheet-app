<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Enums\BloodType;
use App\Enums\CivilStatus;
use App\Enums\MunicipalOffice;
use App\Enums\EducationalLevel;
use App\Enums\EmploymentStatus;
use App\Enums\SubmissionStatus;

class FilterOptions extends Component
{
    public $offices, $civilStatus, $bloodTypes, $educationalLevels, $submissionStatus, $employmentStatus;

    // Common Filters
    public $employeeName = null;
    public $selectedDepartment = null;
    public $selectedSex = null;
    public $selectedEmploymentStatus = null;

    // Planning Filters
    public $selectedAgeRange = null;
    public $selectedCivilStatus = null;
    public $selectedWorkPosition = null;
    public $selectedYearsInService = null;
    public $selectedDateOfAppointment = null;

    // Compliance Filters
    public $selectedEligibility = null;
    public $selectedEligibilityExpirationDate = null;
    public $selectedEducationLevel = null;
    public $selectedTrainingHours = null;
    public $selectedSubmissionStatus = null;
    public $selectedDateUpdated = null;

    // Inventory
    public $selectedCitizenship = null;
    public $selectedSalaryGrade = null;
    public $selectedSalaryStep = null;

    public function mount()
    {
        $this->offices = MunicipalOffice::options();
        $this->civilStatus = CivilStatus::labels();
        $this->bloodTypes = BloodType::cases();
        $this->educationalLevels = EducationalLevel::options();
        $this->submissionStatus = array_merge([['label' => 'No Submissions', 'value' => 'no_submissions']], SubmissionStatus::options());
        $this->employmentStatus = EmploymentStatus::options();
    }

    public function filterUpdate(){
        $filters = [
            'common' => [
                'employeeName' => $this->employeeName,
                'selectedDepartment' => $this->selectedDepartment,
                'selectedSex' => $this->selectedSex,
                'selectedEmploymentStatus' => $this->selectedEmploymentStatus,
            ],
            'planning' => [
                'selectedAgeRange' => $this->selectedAgeRange,
                'selectedCivilStatus' => $this->selectedCivilStatus,
                'selectedWorkPosition' => $this->selectedWorkPosition,
                'selectedYearsInService' => $this->selectedYearsInService,
                'selectedDateOfAppointment' => $this->selectedDateOfAppointment,
            ],
            'compliance' => [
                'selectedEligibility' => $this->selectedEligibility,
                'selectedEligibilityExpirationDate' => $this->selectedEligibilityExpirationDate,
                'selectedEducationLevel' => $this->selectedEducationLevel,
                'selectedTrainingHours' => $this->selectedTrainingHours,
                'selectedSubmissionStatus' => $this->selectedSubmissionStatus,
                'selectedDateUpdated' => $this->selectedDateUpdated,
            ],
            'inventory' => [
                'selectedCitizenship' => $this->selectedCitizenship,
                'selectedSalaryGrade' => $this->selectedSalaryGrade,
                'selectedSalaryStep' => $this->selectedSalaryStep,
            ],
        ];

        $this->dispatch('filtersApplied', filters: $filters);
    }

    public function resetFilters(){
        $this->reset(
            'employeeName',
            'selectedDepartment',
            'selectedSex',
            'selectedEmploymentStatus',
            'selectedAgeRange',
            'selectedCivilStatus',
            'selectedWorkPosition',
            'selectedYearsInService',
            'selectedDateOfAppointment',
            'selectedEligibility',
            'selectedEligibilityExpirationDate',
            'selectedEducationLevel',
            'selectedTrainingHours',
            'selectedSubmissionStatus',
            'selectedDateUpdated',
            'selectedCitizenship',
            'selectedSalaryGrade',
            'selectedSalaryStep'
        );
    }

    public function render()
    {
        return view('livewire.admin.filter-options');
    }
}
