<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'question' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['name', 'question' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="row g-2">

    
    <!--[if BLOCK]><![endif]--><?php if($question): ?>
        <div class="col-6">
            <?php echo e($question); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <div class="col-6">
        <?php if (isset($component)) { $__componentOriginal10d6073751c522ad2e2db4a1b6ba1d99 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal10d6073751c522ad2e2db4a1b6ba1d99 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.yes-no-radio','data' => ['model' => $name,'name' => $name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.yes-no-radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal10d6073751c522ad2e2db4a1b6ba1d99)): ?>
<?php $attributes = $__attributesOriginal10d6073751c522ad2e2db4a1b6ba1d99; ?>
<?php unset($__attributesOriginal10d6073751c522ad2e2db4a1b6ba1d99); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10d6073751c522ad2e2db4a1b6ba1d99)): ?>
<?php $component = $__componentOriginal10d6073751c522ad2e2db4a1b6ba1d99; ?>
<?php unset($__componentOriginal10d6073751c522ad2e2db4a1b6ba1d99); ?>
<?php endif; ?>
    </div>

    
    <?php echo e($slot); ?>


</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/question-group.blade.php ENDPATH**/ ?>