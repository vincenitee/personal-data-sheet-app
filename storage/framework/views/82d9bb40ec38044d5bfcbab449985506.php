<?php $__env->startSection('title'); ?>
    Employee Directory: <?php echo e(ucwords(str_replace('_', ' ', $employmentStatus))); ?> Staff
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="employee-directory">
    <div class="directory-header mb-4">
        <div class="directory-meta">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Status:</strong> <?php echo e(ucwords(str_replace('_', ' ', $employmentStatus))); ?></p>
                    <p><strong>Total Employees:</strong> <?php echo e(count($employees)); ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p><strong>Generated on:</strong> <?php echo e(now()->format('F d, Y')); ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php if(count($employees) > 0): ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" style="font-size: .875rem">
            <thead class="table-dark">
                <tr>
                    <th width="5%" class="text-center">#</th>
                    <th width="30%">Employee Name</th>
                    <th width="30%">Current Position</th>
                    <th width="15%">Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($index + 1); ?></td>
                        <td>
                            <div class="fw-bold">
                                <?php echo e($employee->personalInformation->last_name ?? 'N/A'); ?>,
                                <?php echo e($employee->personalInformation->first_name ?? ''); ?>

                                <?php echo e($employee->personalInformation->middle_name ? substr($employee->personalInformation->middle_name, 0, 1).'.' : ''); ?>

                            </div>
                            <div class="text-muted small"><?php echo e($employee->employee_id ?? 'ID Pending'); ?></div>
                        </td>
                        <td>
                            <?php if($employee->workExperiences && $employee->workExperiences->last()): ?>
                                <div><?php echo e($employee->workExperiences->last()->position); ?></div>
                                <div class="text-muted small">Since <?php echo e($employee->workExperiences->last()->date_from ? date('M Y', strtotime($employee->workExperiences->last()->date_from)) : 'N/A'); ?></div>
                            <?php else: ?>
                                <span class="text-muted">No Position Data</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if($employee->personalInformation && $employee->personalInformation->email): ?>
                                <div class="small"><?php echo e($employee->personalInformation->email); ?></div>
                            <?php endif; ?>
                            <?php if($employee->personalInformation && $employee->personalInformation->mobile_no): ?>
                                <div class="small"><?php echo e($employee->personalInformation->mobile_no); ?></div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-info mt-3 text-end small">
        <span>Showing <?php echo e(count($employees)); ?> of <?php echo e(count($employees)); ?> employees</span>
    </div>
    <?php else: ?>
    <div class="alert alert-info">
        <i class="bi bi-info-circle me-2"></i>
        No employees found with <?php echo e(ucwords(str_replace('_', ' ', $employmentStatus))); ?> status.
    </div>
    <?php endif; ?>

    <div class="directory-footer mt-5">
        <div class="row">
            <div class="col-md-6">
                <p class="small">
                    <strong>Note:</strong> This report contains confidential employee information and is intended for authorized personnel only.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="small">
                    <strong>Report ID:</strong> EMP-<?php echo e($employmentStatus); ?>-<?php echo e(now()->format('Ymd')); ?>

                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .employee-directory {
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .directory-header {
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 1rem;
    }
    .directory-meta {
        background-color: #f8f9fa;
        padding: 10px 15px;
        border-radius: 5px;
    }
    .table {
        box-shadow: 0 2px 3px rgba(0,0,0,0.03);
    }
    .table thead th {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
    .directory-footer {
        border-top: 1px solid #dee2e6;
        padding-top: 1rem;
    }
    @media print {
        .directory-meta {
            background-color: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .table thead th {
            background-color: #212529 !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.05) !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/pdf/employee_list.blade.php ENDPATH**/ ?>