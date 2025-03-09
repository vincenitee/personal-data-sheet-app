
<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Civil Service Eligibilities','icon' => 'bi-award','loadingTarget' => 'addEligibility()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Civil Service Eligibilities','icon' => 'bi-award','loadingTarget' => 'addEligibility()']); ?>

    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $eligibilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $eligibily): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.form-fields', [
            'modelPrefix' => "eligibilities.$index",
            'fields' => [
                [
                    'label' => 'Career Service',
                    'placeholder' => 'Enter career service eligibility',
                    'required' => false,
                ],
                [
                    'label' => 'Ratings',
                    'type' => 'number',
                    'placeholder' => 'Enter rating (0-100)',
                    'required' => false,
                ],
                [
                    'label' => 'Exam Date',
                    'type' => 'date',
                    'placeholder' => 'Select exam date',
                    'required' => false,
                ],
                [
                    'label' => 'Exam Place',
                    'placeholder' => 'Enter location of examination',
                    'required' => false,
                ],
                [
                    'label' => 'License Number',
                    'type' => 'number',
                    'required' => false,
                    'placeholder' => 'Enter license number (if applicable)',
                ],
                [
                    'label' => 'License Validity',
                    'type' => 'date',
                    'required' => false,
                    'placeholder' => 'Select license validity date',
                ],
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="col-12 text-end">
            <button
                type="button"
                @click="confirmDelete('eligibilities', <?php echo e($index); ?>)"
                class="btn btn-outline-danger btn-sm" <?php if(count($eligibilities) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    <?php $__env->slot('footer'); ?>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEligibilities()" class="btn btn-outline-danger btn-sm"
                <?php if(count($eligibilities) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEligibility()" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    <?php $__env->endSlot(); ?>

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

<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/steps/step-4.blade.php ENDPATH**/ ?>