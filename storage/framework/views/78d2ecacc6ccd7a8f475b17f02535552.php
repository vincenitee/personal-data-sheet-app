<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Civil Service Eligibility','icon' => 'bi-award','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Civil Service Eligibility','icon' => 'bi-award','openCard' => ''.e($openCard).'']); ?>
    <div class="eligibility-info-container">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $eligibilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eligibility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="eligibility-item mb-4">
                <div class="eligibility-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 eligibility-service"><?php echo e($eligibility->career_service); ?></h6>
                        <?php
                            $ratingClass = match (true) {
                                $eligibility->ratings >= 90 => 'success',
                                $eligibility->ratings >= 75 => 'primary',
                                $eligibility->ratings >= 50 => 'warning',
                                default => 'danger',
                            };
                        ?>
                        <span class="badge bg-<?php echo e($ratingClass); ?> rating-badge"><?php echo e($eligibility->ratings); ?></span>
                    </div>
                </div>

                <div class="eligibility-details">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Exam Date</span>
                                <span class="info-value"><?php echo e(\Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Exam Location</span>
                                <span class="info-value"><?php echo e($eligibility->exam_place); ?></span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="license-section">
                                <h6 class="license-title">License Information</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">License Number</span>
                                            <span class="info-value">
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($eligibility->license_number)): ?>
                                                    <code class="license-code"><?php echo e($eligibility->license_number); ?></code>
                                                <?php else: ?>
                                                    <span class="text-muted">Not Applicable</span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Validity</span>
                                            <span class="info-value">
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($eligibility->license_validity)): ?>
                                                    <?php
                                                        $isValid = now()->lessThan(\Carbon\Carbon::parse($eligibility->license_validity));
                                                        $validityClass = $isValid ? 'valid' : 'expired';
                                                    ?>
                                                    <span class="license-validity <?php echo e($validityClass); ?>">
                                                        <?php echo e($eligibility->license_validity->format('m/d/Y')); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-muted">Not Applicable</span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--[if BLOCK]><![endif]--><?php if(!$loop->last): ?>
                <hr class="eligibility-divider my-4">
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state text-center py-4">
                <i class="bi bi-award text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No eligibility records found</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- Comments Section -->
    <div class="comments-section mt-4">
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
    </div>

    <style>
        .eligibility-info-container {
            font-size: 0.9rem;
        }
        .eligibility-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .eligibility-header {
            margin-bottom: 0.75rem;
        }
        .eligibility-service {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
        }
        .rating-badge {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }
        .eligibility-details {
            padding-top: 0.5rem;
        }
        .info-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 0.5rem;
        }
        .info-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }
        .info-value {
            font-weight: 500;
            color: #212529;
        }
        .license-section {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 0.5rem;
        }
        .license-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
        }
        .license-code {
            background-color: #e9ecef;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 0.85rem;
        }
        .license-validity {
            padding: 0.25rem 0.5rem;vol
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }
        .license-validity.valid {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
        }
        .license-validity.expired {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        .eligibility-divider {
            border-top: 1px solid #e9ecef;
            margin: 1.5rem 0;
        }
        .empty-state {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 2rem;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319)): ?>
<?php $attributes = $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319; ?>
<?php unset($__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c755b64b7bb8b6a080bedeeb703c319)): ?>
<?php $component = $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319; ?>
<?php unset($__componentOriginal9c755b64b7bb8b6a080bedeeb703c319); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/civil-service.blade.php ENDPATH**/ ?>