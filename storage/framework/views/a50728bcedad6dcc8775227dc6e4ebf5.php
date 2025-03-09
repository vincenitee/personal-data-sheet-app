
<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Work Experiences','icon' => 'bi-briefcase','loadingTarget' => 'addWorkEntry()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Work Experiences','icon' => 'bi-briefcase','loadingTarget' => 'addWorkEntry()']); ?>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $workExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workEntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.form-fields', [
            'modelPrefix' => "workExperiences.$index",
            'fields' => [
                [
                    'label' => 'Position',
                    'placeholder' => 'Enter job title (e.g., Software Engineer)',
                    'required' => false,
                ],
                [
                    'label' => 'Agency',
                    'placeholder' => 'Enter agency name (e.g., Department of Science and Technology)',
                    'required' => false,
                ],
                [
                    'label' => 'Salary',
                    'type' => 'number',
                    'required' => false,
                    'placeholder' => 'e.g., 50,000',
                ],
                [
                    'label' => 'Salary Grade',
                    'type' => 'select',
                    'options' => array_combine(range(1, 33), range(1, 33)), // Grades 1-33
                    'placeholder' => 'Select salary grade',
                    'disabled' => true,
                    'required' => false,
                ],
                [
                    'label' => 'Salary Step',
                    'type' => 'select',
                    'options' => array_combine(range(0, 8), range(0, 8)), // Steps 1-8
                    'placeholder' => 'Select salary step',
                    'disabled' => true,
                    'required' => false,
                ],
                [
                    'label' => 'Status',
                    'type' => 'select',
                    'options' => $employementStatusOptions,
                    'placeholder' => 'Select employment status',
                    'required' => false,
                ],
                [
                    'label' => 'Government Service',
                    'type' => 'select',
                    'options' => [
                        true => 'Yes',
                        false => 'No',
                    ],
                    'placeholder' => 'Select if government service',
                    'required' => false,
                ],
                [
                    'label' => 'Date From',
                    'type' => 'date',
                    'placeholder' => 'Select start date',
                    'required' => false,
                ],
                [
                    'label' => 'Date To',
                    'type' => 'date',
                    'placeholder' => 'Select end date or leave blank if current',
                    'required' => false,
                ],
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-12 text-end">
            <button
                type="button"
                @click="confirmDelete('workExperiences', <?php echo e($index); ?>)"
                class="btn btn-outline-danger btn-sm"
                <?php if(count($workExperiences) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

    <?php $__env->slot('footer'); ?>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllWorkEntry()" class="btn btn-outline-danger btn-sm"
                <?php if(count($workExperiences) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addWorkEntry()" class="btn btn-primary btn-sm">
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


<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/steps/step-5.blade.php ENDPATH**/ ?>