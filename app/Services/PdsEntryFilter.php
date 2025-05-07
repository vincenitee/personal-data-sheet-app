<?php

namespace App\Services;

use App\Models\PdsEntry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class PdsEntryFilter
{
    /**
     * Apply all filters to the PdsEntry query
     *
     * @param array $filters The filters to apply
     * @return Builder The filtered query
     */
    public function apply(array $filters): Builder
    {
        $query = PdsEntry::query();

        // Validate filters
        $this->validateFilters($filters);

        if (isset($filters['personalInformation'])) {
            $query = $this->applyPersonalInfoFilters($query, $filters['personalInformation']);
        }

        if (isset($filters['educationalBackground'])) {
            $query = $this->applyEducationalBackgroundFilters($query, $filters['educationalBackground']);
        }

        if (isset($filters['workExperience'])) {
            $query = $this->applyWorkExperienceFilters($query, $filters['workExperience']);
        }

        if (isset($filters['trainings'])) {
            $query = $this->applyTrainingsFilters($query, $filters['trainings']);
        }

        return $query;
    }

    /**
     * Validate filter structure and types
     *
     * @param array $filters The filters to validate
     * @return void
     */
    private function validateFilters(array $filters): void
    {
        // Basic structure validation
        Validator::make($filters, [
            'personalInformation' => 'sometimes|array',
            'educationalBackground' => 'sometimes|array',
            'workExperience' => 'sometimes|array',
            'trainings' => 'sometimes|array'
        ])->validate();
    }

    /**
     * Apply personal information filters
     *
     * @param Builder $query The query to filter
     * @param array $filters The personal information filters
     * @return Builder The filtered query
     */
    private function applyPersonalInfoFilters(Builder $query, array $filters): Builder
    {
        return $query->whereHas('personalInformation', function (Builder $q) use ($filters) {
            // Name Search
            if (!empty($filters['nameSearch'])) {
                $search = '%' . $filters['nameSearch'] . '%';
                $q->where(function ($nameQuery) use ($search) {
                    $nameQuery->where('first_name', 'LIKE', $search)
                        ->orWhere('middle_name', 'LIKE', $search)
                        ->orWhere('last_name', 'LIKE', $search)
                        ->orWhere('suffix', 'LIKE', $search);
                });
            }

            // Age Range
            if (!empty($filters['minAge'])) {
                $q->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= ?', [(int)$filters['minAge']]);
            }
            if (!empty($filters['maxAge'])) {
                $q->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) <= ?', [(int)$filters['maxAge']]);
            }

            // Birth Date Range
            if (!empty($filters['birthDateFrom'])) {
                $q->whereDate('birth_date', '>=', $filters['birthDateFrom']);
            }
            if (!empty($filters['birthDateTo'])) {
                $q->whereDate('birth_date', '<=', $filters['birthDateTo']);
            }

            // Sex Filter
            if (!empty($filters['sexFilter'])) {
                $q->where('sex', $filters['sexFilter']);
            }

            // Civil Status Filter
            if (!empty($filters['civilStatusFilter'])) {
                $q->where('civil_status', $filters['civilStatusFilter']);
            }

            // Blood Type Filter
            if (!empty($filters['bloodTypeFilter'])) {
                $q->where('blood_type', $filters['bloodTypeFilter']);
            }
        });
    }

    /**
     * Apply educational background filters
     *
     * @param Builder $query The query to filter
     * @param array $filters The educational background filters
     * @return Builder The filtered query
     */
    private function applyEducationalBackgroundFilters(Builder $query, array $filters): Builder
    {
        return $query->whereHas('educationalBackgrounds', function (Builder $q) use ($filters) {
            $levelHierarchy = $this->getEducationLevelHierarchy();

            // Education Level Filter
            if (!empty($filters['educationLevelFilter'])) {
                $this->applySpecificLevelFilter($q, $filters['educationLevelFilter'], $levelHierarchy);
            }

            // School Name Search
            if (!empty($filters['schoolNameSearch'])) {
                $search = '%' . $filters['schoolNameSearch'] . '%';
                $q->where('school_name', 'LIKE', $search);
            }

            // Degree Earned Search
            if (!empty($filters['degreeEarnedSearch'])) {
                $search = '%' . $filters['degreeEarnedSearch'] . '%';
                $q->where('degree_earned', 'LIKE', $search);
            }

            // Attendance Date Range
            if (!empty($filters['attendanceFrom'])) {
                $q->whereDate('attendance_from', '>=', $filters['attendanceFrom']);
            }
            if (!empty($filters['attendanceTo'])) {
                $q->whereDate('attendance_to', '<=', $filters['attendanceTo']);
            }

            // Units Filters
            if (!empty($filters['minUnits'])) {
                $q->where('units_earned', '>=', (float)$filters['minUnits']);
            }
            if (!empty($filters['maxUnits'])) {
                $q->where('units_earned', '<=', (float)$filters['maxUnits']);
            }

            // Graduation Year Range
            if (!empty($filters['minYearGraduated'])) {
                $q->whereYear('year_graduated', '>=', (int)$filters['minYearGraduated']);
            }
            if (!empty($filters['maxYearGraduated'])) {
                $q->whereYear('year_graduated', '<=', (int)$filters['maxYearGraduated']);
            }

            // Academic Honors
            if (!empty($filters['academicHonorsSearch'])) {
                $search = '%' . $filters['academicHonorsSearch'] . '%';
                $q->where('academic_honors', 'LIKE', $search);
            }
        });
    }

    /**
     * Apply filter for a specific education level and ensure it's the highest
     *
     * @param Builder $query The query to filter
     * @param string $selectedLevel The education level to filter by
     * @param array $levelHierarchy The hierarchy of education levels
     * @return void
     */
    private function applySpecificLevelFilter(Builder $query, string $selectedLevel, array $levelHierarchy): void
    {
        if (!isset($levelHierarchy[$selectedLevel])) {
            return;
        }

        $selectedLevelValue = $levelHierarchy[$selectedLevel];

        // Filter by the selected level
        $query->where('level', $selectedLevel);

        // Ensure this is the highest level (no higher levels exist)
        $query->whereNotExists(function ($subQuery) use ($selectedLevelValue, $levelHierarchy) {
            $subQuery->select(\DB::raw(1))
                ->from('educational_backgrounds as higher_ed')
                ->whereRaw('higher_ed.pds_entry_id = educational_backgrounds.pds_entry_id')
                ->where(function ($q) use ($selectedLevelValue, $levelHierarchy) {
                    $higherLevels = false;
                    foreach ($levelHierarchy as $level => $value) {
                        if ($value > $selectedLevelValue) {
                            if ($higherLevels) {
                                $q->orWhere('higher_ed.level', $level);
                            } else {
                                $q->where('higher_ed.level', $level);
                                $higherLevels = true;
                            }
                        }
                    }
                });
        });
    }

    /**
     * Get education level hierarchy mapping
     *
     * @return array The hierarchy mapping
     */
    private function getEducationLevelHierarchy(): array
    {
        return [
            'graduate_studies' => 5,
            'college' => 4,
            'vocational' => 3,
            'secondary' => 2,
            'elementary' => 1
        ];
    }

    /**
     * Apply work experience filters
     *
     * @param Builder $query The query to filter
     * @param array $filters The work experience filters
     * @return Builder The filtered query
     */
    private function applyWorkExperienceFilters(Builder $query, array $filters): Builder
    {
        return $query->whereHas('workExperiences', function (Builder $q) use ($filters) {
            $q->orderByRaw('CASE WHEN date_to IS NULL THEN 1 ELSE 0 END DESC') // Prioritize current work
                ->orderBy('date_to', 'DESC');

            // Position Search
            if (!empty($filters['positionSearch'])) {
                $search = '%' . $filters['positionSearch'] . '%';
                $q->where('position', 'LIKE', $search);
            }

            // Agency/Office Search
            if (!empty($filters['agencySearch'])) {
                $search = '%' . $filters['agencySearch'] . '%';
                $q->where('agency', 'LIKE', $search);
            }

            // Salary Range
            if (!empty($filters['minSalary'])) {
                $q->where('salary', '>=', (float)$filters['minSalary']);
            }
            if (!empty($filters['maxSalary'])) {
                $q->where('salary', '<=', (float)$filters['maxSalary']);
            }

            // Salary Grade & Step
            if (!empty($filters['salaryGrade'])) {
                $q->where('salary_grade', $filters['salaryGrade']);
            }
            if (!empty($filters['salaryStep'])) {
                $q->where('salary_step', $filters['salaryStep']);
            }

            // Employment Status
            if (!empty($filters['employmentStatus'])) {
                $q->where('status', $filters['employmentStatus']);
            }

            // Government Service
            if (!empty($filters['governmentService'])) {
                $q->where('government_service', (bool)$filters['governmentService']);
            }

            // Employment Period Range
            if (!empty($filters['dateFrom'])) {
                $q->whereDate('date_from', '>=', $filters['dateFrom']);
            }
            if (!empty($filters['dateTo'])) {
                $q->where(function($dateQuery) use ($filters) {
                    $dateQuery->whereDate('date_to', '<=', $filters['dateTo'])
                             ->orWhereNull('date_to'); // Include current jobs
                });
            }
        });
    }

    /**
     * Apply trainings filters
     *
     * @param Builder $query The query to filter
     * @param array $filters The trainings filters
     * @return Builder The filtered query
     */
    private function applyTrainingsFilters(Builder $query, array $filters): Builder
    {
        return $query->whereHas('trainings', function (Builder $q) use ($filters) {
            // Title Search
            if (!empty($filters['titleSearch'])) {
                $search = '%' . $filters['titleSearch'] . '%';
                $q->where('title', 'LIKE', $search);
            }

            // Training Type Filter
            if (!empty($filters['trainingTypeFilter'])) {
                $q->where('type', $filters['trainingTypeFilter']);
            }

            // Sponsor Search
            if (!empty($filters['sponsorSearch'])) {
                $search = '%' . $filters['sponsorSearch'] . '%';
                $q->where('sponsored_by', 'LIKE', $search);
            }

            // Training Date Range
            if (!empty($filters['trainingDateFrom'])) {
                $q->whereDate('date_from', '>=', $filters['trainingDateFrom']);
            }
            if (!empty($filters['trainingDateTo'])) {
                $q->whereDate('date_to', '<=', $filters['trainingDateTo']);
            }

            // Total Hours Range
            if (!empty($filters['minTotalHours'])) {
                $q->where('total_hours', '>=', (float)$filters['minTotalHours']);
            }
            if (!empty($filters['maxTotalHours'])) {
                $q->where('total_hours', '<=', (float)$filters['maxTotalHours']);
            }
        });
    }
}