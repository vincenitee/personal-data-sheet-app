
<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Elementary Education','icon' => 'bi-book-fill']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Elementary Education','icon' => 'bi-book-fill']); ?>
    <?php echo $__env->make('partials.form-fields', [
        'modelPrefix' => 'education.elementary',
        'fields' => [
            [
                'label' => 'School Name',
                'placeholder' => 'Enter elementary school name',
                'required' => false,
            ],
            [
                'label' => 'Degree Earned ',
                'placeholder' => 'e.g., Basic Education',
                'required' => false,
            ],
            [
                'label' => 'Attendance From',
                'type' => 'number',
                'required' => false,
                'placeholder' => 'Enter year (e.g., 2024)',
            ],
            [
                'label' => 'Attendance To',
                'type' => 'number',
                'required' => false,
                'placeholder' => 'Enter year (e.g., 2024)',
            ],
            [
                'label' => 'Level Unit Earned',
                'type' => 'number',
                'placeholder' => 'e.g., 6 (enter the last completed level if not graduated)',
                'required' => false,
            ],
            [
                'label' => 'Year Graduated',
                'type' => 'number',
                'required' => false,
                'placeholder' => 'Enter year (e.g., 2024)',
            ],
            [
                'label' => 'Academic Honors',
                'placeholder' => 'e.g., Valedictorian, With Honors',
                'required' => false,
            ],
        ],
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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


<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Secondary Education','icon' => 'bi-journal-text']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Secondary Education','icon' => 'bi-journal-text']); ?>
    <?php echo $__env->make('partials.form-fields', [
        'modelPrefix' => 'education.secondary',
        'fields' => [
            [
                'label' => 'School Name',
                'placeholder' => 'Enter high school name',
                'icon' => 'bi-building-fill',
                'required' => false,
            ],
            [
                'label' => 'Degree Earned ',
                'placeholder' => 'e.g., Junior High School',
                'required' => false,
            ],
            [
                'label' => 'Attendance From',
                'type' => 'number',
                'required' => false,
                'placeholder' => 'Enter year (e.g., 2024)',
            ],
            [
                'label' => 'Attendance To',
                'type' => 'number',
                'required' => false,
                'placeholder' => 'Enter year (e.g., 2024)',
            ],
            [
                'label' => 'Level Unit Earned',
                'type' => 'number',
                'placeholder' => 'e.g., 12 (enter the last completed level if not graduated)',
                'required' => false,
            ],
            [
                'label' => 'Year Graduated',
                'type' => 'number',
                'required' => false,
                'placeholder' => 'Enter year (e.g., 2024)',
            ],
            [
                'label' => 'Academic Honors',
                'placeholder' => 'e.g., Valedictorian, With Honors',
                'required' => false,
            ],
        ],
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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



<!-- Vocational Level -->
<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Vocational/Trade Course','icon' => 'bi-tools','loadingTarget' => 'addEducationEntry(\'vocational\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Vocational/Trade Course','icon' => 'bi-tools','loadingTarget' => 'addEducationEntry(\'vocational\')']); ?>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $education['vocational']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.form-fields', [
            'modelPrefix' => "education.vocational.$index",
            'fields' => [
                [
                    'label' => 'School Name',
                    'placeholder' => 'Enter vocational school name',
                    'required' => false,
                ],
                [
                    'label' => 'Degree Earned',
                    'placeholder' => 'e.g., Automotive Servicing NC II',
                    'required' => false,
                ],
                [
                    'label' => 'Attendance From',
                    'type' => 'number',
                    'required' => false,
                    'placeholder' => 'Enter year (e.g., 2024)',
                ],
                [
                    'label' => 'Attendance To',
                    'type' => 'number',
                    'required' => false,
                    'placeholder' => 'Enter year (e.g., 2024)',
                ],
                [
                    'label' => 'Level Unit Earned',
                    'type' => 'number',
                    'required' => false,
                ],
                [
                    'label' => 'Year Graduated',
                    'type' => 'number',
                    'placeholder' => 'Enter year (e.g., 2024)',
                    'required' => false,
                ],
                [
                    'label' => 'Academic Honors',
                    'placeholder' => 'e.g., TESDA Scholar, With Distinction',
                    'required' => false,
                ],
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="col-12 text-end">
            <button type="button" wire:click="removeEducationEntry('vocational', <?php echo e($index); ?>)"
                class="btn btn-outline-danger btn-sm" <?php if(count($education['vocational']) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

    <?php $__env->slot('footer'); ?>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEducationEntry('vocational')" class="btn btn-outline-danger btn-sm"
                <?php if(count($education['vocational']) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEducationEntry('vocational')" class="btn btn-primary btn-sm">
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


<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'College','icon' => 'bi-mortarboard-fill','loadingTarget' => 'addEducationEntry(\'college\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'College','icon' => 'bi-mortarboard-fill','loadingTarget' => 'addEducationEntry(\'college\')']); ?>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $education['college']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.form-fields', [
            'modelPrefix' => "education.college.$index",
            'fields' => [
                [
                    'label' => 'School Name',
                    'placeholder' => 'Enter college or university name',
                    'required' => false,
                ],
                [
                    'label' => 'Degree Earned',
                    'placeholder' => 'e.g., Bachelor of Science in Computer Science',
                    'required' => false,
                ],
                [
                    'label' => 'Attendance From',
                    'type' => 'number',
                    'placeholder' => 'Enter year (e.g., 2024)',
                    'required' => false,
                ],
                [
                    'label' => 'Attendance To',
                    'type' => 'number',
                    'placeholder' => 'Enter year (e.g., 2024)',
                    'required' => false,
                ],
                [
                    'label' => 'Level Unit Earned',
                    'type' => 'number',
                    'placeholder' => 'e.g., 120 (enter the total units completed if not graduated)',
                    'required' => false,
                ],
                [
                    'label' => 'Year Graduated',
                    'type' => 'number',
                    'placeholder' => 'Enter year (e.g., 2024)',
                    'required' => false,
                ],
                [
                    'label' => 'Academic Honors',
                    'placeholder' => 'e.g., Cum Laude, Dean\'s Lister',
                    'required' => false,
                ],
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="col-12 text-end">
            <button type="button" wire:click="removeEducationEntry('college', <?php echo e($index); ?>)"
                class="btn btn-outline-danger btn-sm" <?php if(count($education['college']) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

    <?php $__env->slot('footer'); ?>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEducationEntry('college')" class="btn btn-outline-danger btn-sm"
                <?php if(count($education['college']) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEducationEntry('college')" class="btn btn-primary btn-sm">
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


<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Graduate Studies','icon' => 'bi-award','loadingTarget' => 'addEducationEntry(\'graduate_studies\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Graduate Studies','icon' => 'bi-award','loadingTarget' => 'addEducationEntry(\'graduate_studies\')']); ?>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $education['graduate_studies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.form-fields', [
            'modelPrefix' => "education.graduate_studies.$index",
            'fields' => [
                [
                    'label' => 'School Name',
                    'placeholder' => 'Enter graduate school or university name',
                    'required' => false,
                ],
                [
                    'label' => 'Degree Earned',
                    'placeholder' => 'e.g., Master of Business Administration (MBA)',
                    'required' => false,
                ],
                [
                    'label' => 'Attendance From',
                    'type' => 'number',
                    'placeholder' => 'Enter year (e.g., 2024)',
                    'required' => false,
                ],
                [
                    'label' => 'Attendance To',
                    'type' => 'number',
                    'placeholder' => 'Enter year (e.g., 2024)',
                    'required' => false,
                ],
                [
                    'label' => 'Level Unit Earned',
                    'type' => 'number',
                    'placeholder' => 'e.g., 36 credit units (enter the total units completed if not graduated)',
                    'required' => false,
                ],
                [
                    'label' => 'Year Graduated',
                    'type' => 'number',
                    'placeholder' => 'Enter year (e.g., 2024)',
                    'required' => false,
                ],
                [
                    'label' => 'Academic Honors',
                    'placeholder' => 'e.g., With Distinction, Best Thesis Award',
                    'required' => false,
                ],
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-12 text-end">
            <button type="button" wire:click="removeEducationEntry('graduate_studies', <?php echo e($index); ?>)"
                class="btn btn-outline-danger btn-sm" <?php if(count($education['graduate_studies']) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

    <?php $__env->slot('footer'); ?>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEducationEntry('graduate_studies')"
                class="btn btn-outline-danger btn-sm" <?php if(count($education['graduate_studies']) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEducationEntry('graduate_studies')" class="btn btn-primary btn-sm">
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/steps/step-3.blade.php ENDPATH**/ ?>