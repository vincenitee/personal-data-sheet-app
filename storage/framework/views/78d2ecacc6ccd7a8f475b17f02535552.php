<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Civil Service Eligibility']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Civil Service Eligibility']); ?>
    <div class="table-responsive">
        <table class="table table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder ps-3" rowspan="2">Career
                        Service</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder" rowspan="2">Exam Date</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder" rowspan="2">Rating</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder" rowspan="2">Location</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder text-center" colspan="2">
                        License (if applicable)</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Number</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Validity</th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $eligibilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eligibility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="align-middle">
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <span class="fw-semibold text-dark">
                                    <?php echo e($eligibility->career_service); ?>

                                </span>
                            </div>
                        </td>
                        <td>
                            
                            <?php echo e(\Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y')); ?>

                            
                        </td>
                        <td>
                            <?php
                                $ratingBadge = match (true) {
                                    $eligibility->ratings >= 90 => 'bg-success',
                                    $eligibility->ratings >= 75 => 'bg-primary',
                                    $eligibility->ratings >= 50 => 'bg-warning',
                                    default => 'bg-gradient-danger',
                                };
                            ?>
                            <span class="badge <?php echo e($ratingBadge); ?> text-white">
                                <?php echo e($eligibility->ratings); ?>

                            </span>
                        </td>
                        <td>
                            <span class="text-secondary">
                                <?php echo e($eligibility->exam_place); ?>

                            </span>
                        </td>
                        <td>
                            <!--[if BLOCK]><![endif]--><?php if(!empty($eligibility->license_number)): ?>
                                <code class="text-dark">
                                    <?php echo e($eligibility->license_number); ?>

                                </code>
                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        </td>
                        <td>
                            <?php
                                $isValid = now()->lessThan(\Carbon\Carbon::parse($eligibility->license_validity));
                                $validityBadge = $isValid ? 'bg-success' : 'bg-danger';
                            ?>
                            <span class="badge <?php echo e($validityBadge); ?> text-white">
                                <?php echo e($eligibility->license_validity->format('m/d/Y')); ?>

                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No eligibility records found
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
        'pdsSection' => 'civil_service_eligibility',
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-926504315-0', $__slots ?? [], get_defined_vars());

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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/civil-service.blade.php ENDPATH**/ ?>