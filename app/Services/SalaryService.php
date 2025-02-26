<?php

namespace App\Services;

class SalaryService
{
    public function getSalaryGradeAndStep($salary): array
    {

        if ($salary === '') {
            return ['salary_grade' => null, 'salary_step' => null];
        }

        $salaryTable = config('salary');

        foreach ($salaryTable as $grade => $steps) {
            foreach ($steps as $step => $stepSalary) {
                // dump();
                if ($salary <= $stepSalary) {
                    return [
                        'salary_grade' => $grade,
                        'salary_step' => $step + 1
                    ];
                }
            }
        }

        return ['salary_grade' => null, 'salary_step' => null];
    }
}
