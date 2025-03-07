<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Educational Background']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Educational Background']); ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center ps-3"
                        rowspan="2">Level</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">School Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Degree Earned</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        colspan="2">Period of Attendance</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Highest Level/Units Earned</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Year Graduated</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Academic Honors Received</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">From</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">To</th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $educationalBackgrounds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $background): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="align-middle text-center fw-semibold text-dark">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->level)): ?>
                                <?php echo e(ucwords($background->level)); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center fw-semibold text-secondary">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->school_name)): ?>
                                <?php echo e($background->school_name); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center text-secondary">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->degree_earned)): ?>
                                <?php echo e($background->degree_earned); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->attendance_to)): ?>
                                <?php echo e(\Carbon\Carbon::parse($background->attendance_from)->format('m/d/Y')); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->attendance_to)): ?>
                                <?php echo e(\Carbon\Carbon::parse($background->attendance_to)->format('m/d/Y')); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->highest_level_units)): ?>
                                <?php echo e($background->highest_level_units); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->year_graduated)): ?>
                                <?php echo e($background->year_graduated); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($background->academic_honors)): ?>
                                <?php echo e($background->academic_honors); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No educational records provided
                        </td>
                    </tr>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'educational_background',
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3415820445-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/educational-background.blade.php ENDPATH**/ ?>