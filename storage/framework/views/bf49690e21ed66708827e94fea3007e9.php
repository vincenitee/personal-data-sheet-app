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
        .breakdown {
            margin-bottom: 20px;
        }
        .breakdown h3 {
            font-size: 13px;
            margin-bottom: 5px;
        }
        .breakdown ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .breakdown li {
            font-size: 11px;
            padding: 2px 0;
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

    <!-- Department Breakdown Section -->
    <div class="breakdown">
        <h3>Department Breakdown</h3>
        <table style="width: 100%; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="background-color: #f2f2f2;">Department</th>
                    <th style="background-color: #f2f2f2;">No. of Employees</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users->groupBy(fn($user) => $user->department ?? 'none'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <strong>
                                <?php echo e($department === 'none' ? 'No assigned department' : \App\Enums\MunicipalOffice::getValue($department)); ?>

                            </strong>
                        </td>
                        <td><?php echo e($group->count()); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td>
                        <strong>Total Employees:</strong>
                    </td>
                    <td><?php echo e($users->count()); ?></td>
                </tr>
            </tbody>
        </table>
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
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <?php switch($key):
                                case ('name'): ?>
                                    <?php echo e($user->first_name); ?>

                                    <?php echo e($user->middle_name ? $user->middle_name : ' '); ?>

                                    <?php echo e($user->last_name); ?>

                                    <?php break; ?>

                                <?php case ('sex'): ?>
                                    <?php echo e($user->sex ? ucwords($user->sex)  : 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('birth_date'): ?>
                                    <?php echo e($user->birth_date ? date('M d, Y', strtotime($user->birth_date)) : 'N/A'); ?>

                                    <?php break; ?>

                                <?php case ('email'): ?>
                                    <?php echo e($user->email); ?>

                                    <?php break; ?>

                                <?php case ('department'): ?>
                                    <?php echo e($user->department ? \App\Enums\MunicipalOffice::getValue($user->department) : 'No assigned department yet'); ?>

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
                        No approved employees found
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/reports/department-users.blade.php ENDPATH**/ ?>