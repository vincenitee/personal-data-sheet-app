<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Work Experiences']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Work Experiences']); ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center ps-3"
                        colspan="2">Inclusive Dates</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Position Title</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Department/Agency/Office/Company</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Monthly Salary</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Salary/Job/Pay Grade</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Status of Appointment</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Government Service</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">From</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">To</th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $workExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($experience->date_from)): ?>
                                <?php echo e($experience->date_from->format('m/d/Y')); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($experience->date_to)): ?>
                                <?php echo e($experience->date_to->format('m/d/Y')); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>

                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($experience->position)): ?>
                                <?php echo e($experience->position); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($experience->agency)): ?>
                                <?php echo e($experience->agency); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($experience->salary)): ?>
                                <code class="text-dark">
                                    ₱<?php echo e(number_format($experience->salary, 2)); ?>

                                </code>
                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($experience->salary_grade) && !empty($experience->salary_step)): ?>
                                <code class="text-dark">
                                    <?php echo e($experience->salary_grade); ?>-<?php echo e($experience->salary_step); ?>

                                </code>
                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($experience->status)): ?>
                                <?php
                                    $statusColorMap = [
                                        'permanent' => 'success',
                                        'contractual' => 'primary',
                                        'casual' => 'warning',
                                        'contract_of_service' => 'info',
                                        'temporary' => 'secondary',
                                    ];

                                    $statusLabelMap = [
                                        'permanent' => 'Permanent',
                                        'contractual' => 'Contractual',
                                        'casual' => 'Casual',
                                        'contract_of_service' => 'Contract of Service',
                                        'temporary' => 'Temporary',
                                    ];

                                    $color = $statusColorMap[$experience->status] ?? 'light';
                                    $label =
                                        $statusLabelMap[$experience->status] ??
                                        ucwords(str_replace('_', ' ', $experience->status));
                                ?>
                                <span class="badge bg-<?php echo e($color); ?> text-white rounded-2 py-1 px-2">
                                    <?php echo e($label); ?>

                                </span>
                            <?php else: ?>
                                <span class="badge bg-light text-muted rounded-2 py-1 px-2">
                                    Not Specified
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <?php
                                $serviceColor = $experience->government_service ? 'primary' : 'danger';
                            ?>
                            <span class="badge bg-<?php echo e($serviceColor); ?> text-white rounded-2 py-1 px-2">
                                <?php echo e($experience->government_service ? 'Yes' : 'No'); ?>

                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No work experience records provided
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
        'pdsSection' => 'work_experience'
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2999313667-0', $__slots ?? [], get_defined_vars());

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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/work-experience.blade.php ENDPATH**/ ?>