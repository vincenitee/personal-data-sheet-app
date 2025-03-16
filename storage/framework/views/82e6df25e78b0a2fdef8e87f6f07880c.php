<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Family Background','icon' => 'bi-people','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Family Background','icon' => 'bi-people','openCard' => ''.e($openCard).'']); ?>
    <div class="family-info-container">
        <!-- Spouse Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Spouse Information</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Full Name</span>
                        <!--[if BLOCK]><![endif]--><?php if($spouse): ?>
                            <span class="info-value">
                                <?php echo e($spouse->first_name ?? ''); ?>

                                <?php echo e($spouse->middle_name ?? ''); ?>

                                <?php echo e($spouse->last_name ?? ''); ?>

                                <?php echo e($spouse->suffix ?? ''); ?>

                            </span>
                        <?php else: ?>
                            <span class="info-value text-muted">-</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Occupation</span>
                        <span class="info-value"><?php echo e($spouse->occupation ?: '—'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Employer/Business Name</span>
                        <span class="info-value"><?php echo e($spouse->employer ?: '—'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Telephone No</span>
                        <span class="info-value"><?php echo e($spouse->telephone_no ?: '—'); ?></span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="info-item">
                        <span class="info-label">Business Address</span>
                        <span class="info-value"><?php echo e($spouse->business_address ?: '—'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parents Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Parents Information</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="family-card">
                        <h6 class="family-title">Father</h6>
                        <div class="family-details">
                            <div class="info-item mb-2">
                                <span class="info-label">Full Name</span>
                                <span class="info-value"><?php echo e($father->first_name); ?> <?php echo e($father->middle_name); ?>

                                    <?php echo e($father->last_name); ?> <?php echo e($father->suffix); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="family-card">
                        <h6 class="family-title">Mother (Maiden)</h6>
                        <div class="family-details">
                            <div class="info-item mb-2">
                                <span class="info-label">Full Name</span>
                                <span class="info-value"><?php echo e($mother->first_name); ?> <?php echo e($mother->middle_name); ?>

                                    <?php echo e($mother->last_name); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Children Information Section -->
        <div class="info-section">
            <h6 class="section-title">Children Information</h6>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="child-item mb-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Full Name</span>
                                <span class="info-value"><?php echo e($child->fullname); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Birth Date</span>
                                <span
                                    class="info-value"><?php echo e(\Carbon\Carbon::parse($child->birth_date)->format('m/d/Y')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--[if BLOCK]><![endif]--><?php if(!$loop->last): ?>
                    <hr class="child-divider my-3">
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="empty-state text-center py-4">
                    <i class="bi bi-people text-light mb-2" style="font-size: 1.5rem"></i>
                    <p class="text-secondary mb-0">No children information provided</p>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>

    <!-- Comments Section -->
    <!--[if BLOCK]><![endif]--><?php if(!in_array($entryStatus, ['approved', 'needs_revision'])): ?>
        <div class="comments-section mt-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.comments', [$submissionId, 'family_background']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3022877817-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <style>
        .family-info-container {
            font-size: 0.9rem;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #495057;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 0.5rem;
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

        .family-card {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            height: 100%;
        }

        .family-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #495057;
        }

        .family-details {
            font-size: 0.85rem;
            color: #495057;
        }

        .child-divider {
            border-top: 1px dashed #dee2e6;
            opacity: 0.5;
        }

        .empty-state {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1.5rem;
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/family-background.blade.php ENDPATH**/ ?>