<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Work Experiences','icon' => 'bi-briefcase','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Work Experiences','icon' => 'bi-briefcase','openCard' => ''.e($openCard).'']); ?>
    <div class="work-info-container">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $workExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="work-item mb-4">
                <div class="work-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 work-position"><?php echo e($experience->position); ?></h6>
                        <?php
                            $statusClass = match ($experience->status) {
                                'permanent' => 'success',
                                'contract_of_service' => 'primary',
                                'temporary' => 'warning',
                                'casual' => 'info',
                                default => 'secondary',
                            };

                            $statusLabel = match ($experience->status) {
                                'contract_of_service' => 'Contract of Service',
                                'permanent' => 'Permanent',
                                'temporary' => 'Temporary',
                                'casual' => 'Casual',
                                default => ucfirst($experience->status),
                            };
                        ?>
                        <span class="badge bg-<?php echo e($statusClass); ?> status-badge"><?php echo e($statusLabel); ?></span>
                    </div>
                    <div class="work-agency"><?php echo e($experience->agency); ?></div>
                </div>

                <div class="work-details">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">From</span>
                                <span
                                    class="info-value"><?php echo e(\Carbon\Carbon::parse($experience->date_from)->format('m/d/Y')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">To</span>
                                <span class="info-value">
                                    <!--[if BLOCK]><![endif]--><?php if(empty($experience->date_to)): ?>
                                        <span class="current-job">Present</span>
                                    <?php else: ?>
                                        <?php echo e(\Carbon\Carbon::parse($experience->date_to)->format('m/d/Y')); ?>

                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="job-section">
                                <h6 class="job-title">Job Information</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="info-item">
                                            <span class="info-label">Salary</span>
                                            <span class="info-value">
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($experience->salary)): ?>
                                                    <code
                                                        class="salary-code">₱<?php echo e(number_format($experience->salary, 2)); ?></code>
                                                <?php else: ?>
                                                    <span class="text-muted">Not Specified</span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-item">
                                            <span class="info-label">Salary Grade</span>
                                            <span class="info-value">
                                                <!--[if BLOCK]><![endif]--><?php if(!empty($experience->salary_grade)): ?>
                                                    SG-<?php echo e($experience->salary_grade); ?>

                                                    <!--[if BLOCK]><![endif]--><?php if(!empty($experience->salary_step)): ?>
                                                        Step <?php echo e($experience->salary_step); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php else: ?>
                                                    <span class="text-muted">Not Applicable</span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-item">
                                            <span class="info-label">Government Service</span>
                                            <span class="info-value">
                                                <!--[if BLOCK]><![endif]--><?php if($experience->government_service): ?>
                                                    <span class="govt-badge"><i
                                                            class="bi bi-check-circle-fill text-success me-1"></i>
                                                        Yes</span>
                                                <?php else: ?>
                                                    <span class="private-badge"><i class="bi bi-building me-1"></i>
                                                        No</span>
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
                <hr class="work-divider my-4">
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state text-center py-4">
                <i class="bi bi-briefcase text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No work experience records found</p>
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
                'pdsSection' => 'work_experience',
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2999313667-0', $__slots ?? [], get_defined_vars());

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
        .work-info-container {
            font-size: 0.9rem;
        }

        .work-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .work-header {
            margin-bottom: 0.75rem;
        }

        .work-position {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
        }

        .work-agency {
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .status-badge {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }

        .work-details {
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

        .job-section {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 0.5rem;
        }

        .job-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
        }

        .salary-code {
            background-color: #e9ecef;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 0.85rem;
        }

        .current-job {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .govt-badge {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .private-badge {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .work-divider {
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/work-experience.blade.php ENDPATH**/ ?>