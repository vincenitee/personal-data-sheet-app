<!-- resources/views/reports/entries-report.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo e($title); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 11px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            padding: 0;
            font-size: 18px;
        }
        .meta-info {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 9px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?php echo e($title); ?></h1>
        <p>Generated on: <?php echo e($generatedDate); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo e($label); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <?php switch($key):
                                case ('name'): ?>
                                    <?php echo e($entry->personalInformation->first_name ?? ' '); ?>

                                    <?php echo e($entry->personalInformation->middle_name ?? ' '); ?>

                                    <?php echo e($entry->personalInformation->last_name ?? ' '); ?>

                                    <?php break; ?>

                                <?php case ('position'): ?>
                                    <?php echo e(optional($entry->workExperiences->sortByDesc('date_to'))->first()?->position ?? 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('office'): ?>
                                    <?php echo e(\App\Enums\MunicipalOffice::getValue($entry->user->department)); ?>

                                    <?php break; ?>

                                <?php case ('salary'): ?>
                                    <?php
                                        $salary = optional($entry->workExperiences->sortByDesc('id')->first())->salary;
                                    ?>
                                    <?php echo e($salary ? 'P' . number_format($salary, 2) : 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('email'): ?>
                                    <?php echo e($entry->personalInformation->email ?? 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('mobile_no'): ?>
                                    <?php echo e($entry->personalInformation->mobile_no ?? 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('sex'): ?>
                                    <?php echo e($entry?->personalInformation?->sex ? ucwords($entry->personalInformation->sex) : 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('education'): ?>
                                    <?php
                                        $educationPriority = [
                                            'graduates_studies' => 5,
                                            'college' => 4,
                                            'vocational' => 3,
                                            'secondary' => 2,
                                            'elementary' => 1,
                                        ];

                                        $highestEducationalAttainment =
                                            $entry->educationalBackgrounds
                                                ->sortByDesc(
                                                    fn($edu) => [
                                                        $educationPriority[$edu->level] ?? 0,
                                                        $edu->attendance_to ?? PHP_INT_MAX,
                                                    ],
                                                )
                                                ->first()?->level ?? 'Unknown';
                                    ?>
                                    <?php echo e(Str::title(str_replace('_', ' ', $highestEducationalAttainment))); ?>

                                    <?php break; ?>

                                <?php case ('employment_status'): ?>
                                    <?php
                                        $currentWork = optional(
                                            $entry->workExperiences->sortByDesc('date_to'),
                                        )->first();
                                        $workType = $currentWork?->status;
                                    ?>
                                    <?php echo e($workType ? Str::title(str_replace('_', ' ', $workType)) : 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('years_experience'): ?>
                                    <?php
                                        $totalDuration = $entry->workExperiences->reduce(function ($carry, $work) {
                                            $start = \Carbon\Carbon::parse($work->date_from);
                                            $end = $work->date_to ? \Carbon\Carbon::parse($work->date_to) : now();
                                            return $carry->add($start->diff($end));
                                        }, \Carbon\CarbonInterval::years(0));

                                        $years = $totalDuration->y;
                                        $months = $totalDuration->m;
                                    ?>
                                    <?php echo e("{$years} years, {$months} months"); ?>

                                    <?php break; ?>

                                <?php case ('eligibility'): ?>
                                    <?php
                                        $currentEligibility = $entry->eligibilities->sortByDesc(
                                            fn($eligibility) => $eligibility->exam_date ?? now(),
                                        );
                                    ?>
                                    <?php echo e($currentEligibility->first()->career_service ?? 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('trainings'): ?>
                                    <?php echo e($entry->trainings->count()); ?>

                                    <?php break; ?>

                                <?php default: ?>
                                    N/A
                            <?php endswitch; ?>
                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="<?php echo e(count($columns)); ?>" style="text-align: center; padding: 20px;">
                        No approved entries found
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        <p>This report contains confidential information. Do not distribute without authorization.</p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/reports/entries-report.blade.php ENDPATH**/ ?>