


<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Basic Information','icon' => 'bi-person']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Basic Information','icon' => 'bi-person']); ?>
    <?php echo $__env->make('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'First Name',
            ],
            [
                'label' => 'Middle Name',
                'required' => false,
            ],
            [
                'label' => 'Last Name',
            ],
            [
                'label' => 'Suffix',
                'required' => false,
            ],
            [
                'label' => 'Birth Date',
                'type' => 'date',
            ],
            [
                'label' => 'Birth Place',
            ],
            [
                'label' => 'Sex',
                'type' => 'select',
                'options' => $sexOptions,
            ],
            [
                'label' => 'Civil Status',
                'type' => 'select',
                'options' => $civilStatusOptions,
            ],
            [
                'label' => 'Height',
                'type' => 'number',
                'placeholder' => 'Enter your height in meters'
            ],
            [
                'label' => 'Weight',
                'type' => 'number',
                'placeholder' => 'Enter your weight in kilograms'
            ],
            [
                'label' => 'Blood Type',
                'type' => 'select',
                'options' => $bloodTypeOptions,
                'required' => false,
            ],
        ]
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Identification','icon' => 'bi-card-list']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Identification','icon' => 'bi-card-list']); ?>
    <?php echo $__env->make('partials.form-fields', [
        'modelPrefix' => 'identifiers',
        'fields' => [
            [
                'label' => 'GSIS',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'PAGIBIG',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'PHILHEALTH',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'SSS',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'TIN',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'AGENCY',
                'type' => 'number',
                'required' => false,
            ],
        ]
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



<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.nationality-picker', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2508924752-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>


<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.address-picker', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2508924752-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Contact Information','icon' => 'bi-telephone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Contact Information','icon' => 'bi-telephone']); ?>
    <?php echo $__env->make('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Telephone No',
                'required' => false,
            ],
            [
                'label' => 'Mobile No',
                'type' => 'number',
            ],
            [
                'label' => 'Email',
                'type' => 'email',
            ],
        ]
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

<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/steps/step-1.blade.php ENDPATH**/ ?>