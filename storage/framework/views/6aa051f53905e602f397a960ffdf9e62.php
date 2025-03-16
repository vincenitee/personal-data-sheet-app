<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Personal Information','icon' => 'bi-person','collapsed' => 'false','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Personal Information','icon' => 'bi-person','collapsed' => 'false','openCard' => ''.e($openCard).'']); ?>
    <div class="personal-info-container">
        <!-- Basic Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Basic Information</h6>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Full Name</span>
                        <span class="info-value"><?php echo e($personalInfo->first_name); ?> <?php echo e($personalInfo->middle_name); ?>

                            <?php echo e($personalInfo->last_name); ?> <?php echo e($personalInfo->suffix); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Date of Birth</span>
                        <span class="info-value"><?php echo e($personalInfo->birth_date?->format('m/d/Y')); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Place of Birth</span>
                        <span class="info-value"><?php echo e($personalInfo->birth_place); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Sex</span>
                        <span class="info-value"><?php echo e(ucwords($personalInfo->sex)); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Civil Status</span>
                        <span class="info-value"><?php echo e(ucwords($personalInfo->civil_status)); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Citizenship</span>
                        <span class="info-value"><?php echo e(ucwords($personalInfo->citizenship)); ?>

                            (<?php echo e(ucwords($personalInfo->citizenship_by)); ?>)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Physical Characteristics Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Physical Characteristics</h6>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Height</span>
                        <span class="info-value"><?php echo e($personalInfo->height ? $personalInfo->height . 'm' : '—'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Weight</span>
                        <span
                            class="info-value"><?php echo e($personalInfo->weight ? (int) $personalInfo->weight . 'kg' : '—'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Blood Type</span>
                        <span class="info-value"><?php echo e($personalInfo->blood_type ?: '—'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Contact Information</h6>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Mobile No</span>
                        <span class="info-value"><?php echo e($personalInfo->mobile_no ?: '—'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Telephone No</span>
                        <span class="info-value"><?php echo e($personalInfo->telephone_no ?: '—'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?php echo e($personalInfo->email ?: '—'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ID Numbers Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">ID Numbers</h6>
            <div class="row g-3">
                <?php
                    $idTypes = [
                        'gsis' => 'GSIS ID',
                        'pagibig' => 'PAGIBIG ID',
                        'philhealth' => 'PHILHEALTH ID',
                        'sss' => 'SSS ID',
                        'tin' => 'TIN ID',
                        'agency' => 'AGENCY ID',
                    ];
                    $identifierMap = $personalInfo->identifiers->pluck('number', 'type')->toArray();
                ?>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $idTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="info-item">
                            <span class="info-label"><?php echo e($label); ?></span>
                            <span class="info-value"><?php echo e($identifierMap[$type] ?? '—'); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <!-- Addresses Section -->
        <div class="info-section">
            <h6 class="section-title">Addresses</h6>
            <div class="row g-4">
                <?php
                    $addresses = [
                        ['label' => 'Permanent Address', 'data' => $permanentAddress],
                        ['label' => 'Residential Address', 'data' => $residentialAddress],
                    ];
                ?>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6">
                        <div class="address-card">
                            <h6 class="address-title"><?php echo e($address['label']); ?></h6>
                            <div class="address-details">
                                <!--[if BLOCK]><![endif]--><?php if($address['data']->house_no): ?>
                                    <p class="mb-1"><?php echo e($address['data']->house_no); ?>,
                                        <?php echo e($address['data']->street ?? ''); ?> <?php echo e($address['data']->subdivision ?? ''); ?>

                                    </p>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <p class="mb-1"><?php echo e($address['data']->barangay->name ?? $address['data']->barangay); ?>,
                                    <?php echo e($address['data']->municipality->name ?? $address['data']->municipality); ?></p>
                                <p class="mb-1"><?php echo e($address['data']->province->name ?? $address['data']->province); ?>,
                                    <?php echo e($address['data']->region->name ?? $address['data']->region); ?></p>
                                <p class="mb-0"><?php echo e(ucwords($personalInfo->country)); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
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
[$__name, $__params] = $__split('admin.comments', [$submissionId, 'personal_information']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2077919620-0', $__slots ?? [], get_defined_vars());

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
        .personal-info-container {
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

        .address-card {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            height: 100%;
        }

        .address-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #495057;
        }

        .address-details {
            font-size: 0.85rem;
            color: #495057;
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/personal-information.blade.php ENDPATH**/ ?>