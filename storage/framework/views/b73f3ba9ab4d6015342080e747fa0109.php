<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Other Information','icon' => 'bi-info-circle','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Other Information','icon' => 'bi-info-circle','openCard' => ''.e($openCard).'']); ?>
    <div class="other-info-container">
        <div class="row g-4">
            <!-- Skills and Hobbies Column -->
            <div class="col-md-4">
                <div class="info-category">
                    <div class="category-header mb-3">
                        <h6 class="mb-0"><i class="bi bi-tools me-2"></i>Skills and Hobbies</h6>
                    </div>

                    <div class="category-items">
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="info-item mb-2">
                                <span class="item-text"><?php echo e($skill->skill); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="empty-state text-center py-3">
                                <i class="bi bi-tools text-light mb-2" style="font-size: 1.2rem"></i>
                                <p class="text-secondary mb-0">No skills or hobbies listed</p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <!-- Recognitions Column -->
            <div class="col-md-4">
                <div class="info-category">
                    <div class="category-header mb-3">
                        <h6 class="mb-0"><i class="bi bi-trophy me-2"></i>Non-Academic Distinctions</h6>
                    </div>

                    <div class="category-items">
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $recognitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recognition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="info-item mb-2">
                                <span class="item-text"><?php echo e($recognition->recognition); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="empty-state text-center py-3">
                                <i class="bi bi-trophy text-light mb-2" style="font-size: 1.2rem"></i>
                                <p class="text-secondary mb-0">No recognitions listed</p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <!-- Organizations Column -->
            <div class="col-md-4">
                <div class="info-category">
                    <div class="category-header mb-3">
                        <h6 class="mb-0"><i class="bi bi-people me-2"></i>Membership in Organizations</h6>
                    </div>

                    <div class="category-items">
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="info-item mb-2">
                                <span class="item-text"><?php echo e($organization->organization); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="empty-state text-center py-3">
                                <i class="bi bi-people text-light mb-2" style="font-size: 1.2rem"></i>
                                <p class="text-secondary mb-0">No organizations listed</p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </div>
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
                'pdsSection' => 'other_information',
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2202222352-0', $__slots ?? [], get_defined_vars());

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
        .other-info-container {
            font-size: 0.9rem;
        }

        .info-category {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .category-header h6 {
            font-weight: 600;
            color: #212529;
            font-size: 1rem;
        }

        .info-item {
            background-color: #f8f9fa;
            border-radius: 0.4rem;
            padding: 0.75rem 1rem;
        }

        .item-text {
            color: #495057;
            font-weight: 500;
        }

        .empty-state {
            background-color: #f8f9fa;
            border-radius: 0.4rem;
        }

        .comments-section {
            margin-top: 1.5rem;
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/other-information.blade.php ENDPATH**/ ?>