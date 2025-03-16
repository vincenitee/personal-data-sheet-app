<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Educational Background','icon' => 'bi-mortarboard','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Educational Background','icon' => 'bi-mortarboard','openCard' => ''.e($openCard).'']); ?>
    <div class="education-info-container">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $educationalBackgrounds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $background): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="education-item mb-4">
                <div class="education-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="education-level-badge">
                                <?php echo e(!empty($background->level) ? ucwords(str_replace('_', ' ', $background->level)) : 'Not Specified'); ?>

                            </span>
                            <h6 class="mb-0 education-school"><?php echo e($background->school_name ?: '—'); ?></h6>
                        </div>
                        <span class="education-year"><?php echo e($background->year_graduated ?: 'Ongoing'); ?></span>
                    </div>
                    <div class="education-degree mb-2"><?php echo e($background->degree_earned ?: '—'); ?></div>
                </div>

                <div class="education-details">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Period of Attendance</span>
                                <span class="info-value">
                                    <!--[if BLOCK]><![endif]--><?php if(!empty($background->attendance_from) && !empty($background->attendance_to)): ?>
                                        <?php echo e($background->attendance_from); ?> —
                                        <?php echo e($background->attendance_to); ?>

                                    <?php else: ?>
                                        —
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Highest Level/Units Earned</span>
                                <span class="info-value"><?php echo e($background->highest_level_units ?: '—'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Academic Honors</span>
                                <span class="info-value"><?php echo e($background->academic_honors ?: 'None'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--[if BLOCK]><![endif]--><?php if(!$loop->last): ?>
                <hr class="education-divider my-4">
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state text-center py-4">
                <i class="bi bi-mortarboard text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No educational records provided</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- Comments Section -->
    <!--[if BLOCK]><![endif]--><?php if(!in_array($entryStatus, ['approved', 'needs_revision'])): ?>
        <div class="comments-section mt-4">
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
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <style>
        .education-info-container {
            font-size: 0.9rem;
        }

        .education-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .education-header {
            margin-bottom: 0.75rem;
        }

        .education-level-badge {
            background-color: #e9ecef;
            color: #495057;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            text-transform: uppercase;
        }

        .education-school {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
            margin-left: 0.5rem;
        }

        .education-year {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }

        .education-degree {
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .education-details {
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

        .education-divider {
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/educational-background.blade.php ENDPATH**/ ?>