<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'model' => null,
    'icon' => false,
    'label' => false,
    'name',
    'required' => true,
    'placeholder' => null,
]));

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

foreach (array_filter(([
    'model' => null,
    'icon' => false,
    'label' => false,
    'name',
    'required' => true,
    'placeholder' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if (isset($component)) { $__componentOriginalcfc16483a1e4ddb0071f3793d67ad40c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfc16483a1e4ddb0071f3793d67ad40c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-field','data' => ['model' => $model,'icon' => $icon,'label' => $label,'name' => $name,'required' => $required]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($model),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($required)]); ?>
    <select
        name="<?php echo e($name); ?>"
        id="<?php echo e($name); ?>"
        class="form-select"
        value="<?php echo e(old($name)); ?>"
        <?php if($model): ?> wire:model="<?php echo e($model); ?>" <?php endif; ?>
        style="font-size: 0.9rem"
        <?php echo e($attributes); ?>

    >
        <option value=""><?php echo e(!is_null($placeholder) ? $placeholder : 'Choose an Option'); ?></option>
        <?php echo e($slot); ?>

    </select>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfc16483a1e4ddb0071f3793d67ad40c)): ?>
<?php $attributes = $__attributesOriginalcfc16483a1e4ddb0071f3793d67ad40c; ?>
<?php unset($__attributesOriginalcfc16483a1e4ddb0071f3793d67ad40c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfc16483a1e4ddb0071f3793d67ad40c)): ?>
<?php $component = $__componentOriginalcfc16483a1e4ddb0071f3793d67ad40c; ?>
<?php unset($__componentOriginalcfc16483a1e4ddb0071f3793d67ad40c); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/select.blade.php ENDPATH**/ ?>