<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'model' => null,
    'type' => 'text',
    'icon' => false,
    'label' => false,
    'name',
    'required' => true
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
    'type' => 'text',
    'icon' => false,
    'label' => false,
    'name',
    'required' => true
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-field','data' => ['model' => $model,'label' => $label,'name' => $name,'required' => $required]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($model),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($name),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($required)]); ?>
    <!--[if BLOCK]><![endif]--><?php if($type === 'password'): ?>
        <div class="input-group" x-data="{ showPassword: false }">
            <!--[if BLOCK]><![endif]--><?php if($icon): ?>
                <span class="input-group-text">
                    <i class="bi <?php echo e($icon); ?>"></i>
                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <input
                :type="showPassword ? 'text' : 'password'"
                name="<?php echo e($name); ?>"
                id="<?php echo e($name); ?>"
                class="form-control pe-5"
                value="<?php echo e(old($name)); ?>"
                <?php if($model): ?> wire:model.blur="<?php echo e($model); ?>" <?php endif; ?>
                autocomplete="off"
                style="font-size: 0.9rem"
                <?php echo e($attributes); ?>

            >
            <button
                class="btn position-absolute end-0 top-50 translate-middle-y px-2 py-0"
                type="button"
                @click="showPassword = !showPassword"
                aria-label="Toggle password visibility"
                style="border: none; background: none; outline: none; box-shadow: none; margin-right: 5px; z-index: 5;"
            >
                <i class="bi" :class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
            </button>
        </div>

    <?php elseif($type === 'date'): ?>
        <div class="input-group">
            
                <span class="input-group-text">
                    <i class="bi bi-calendar" style="font-size: 0.8rem"></i>
                </span>
            
            <input
                type="<?php echo e($type); ?>"
                name="<?php echo e($name); ?>"
                id="<?php echo e($name); ?>"
                class="form-control"
                value="<?php echo e(old($name)); ?>"
                <?php if($model): ?> wire:model.blur="<?php echo e($model); ?>" <?php endif; ?>
                <?php if($type === 'file'): ?> accept="application/pdf,image/*"  <?php endif; ?>
                autocomplete="off"
                style="font-size: 0.9rem"
                <?php echo e($attributes); ?>

            >
        </div>
    <?php else: ?>
        <div class="input-group">
            <!--[if BLOCK]><![endif]--><?php if($icon): ?>
                <span class="input-group-text">
                    <i class="bi <?php echo e($icon); ?>" style="font-size: 0.8rem;"></i>
                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <input
                type="<?php echo e($type); ?>"
                name="<?php echo e($name); ?>"
                id="<?php echo e($name); ?>"
                class="form-control"
                value="<?php echo e(old($name)); ?>"
                <?php if($model): ?> wire:model.blur="<?php echo e($model); ?>" <?php endif; ?>
                <?php if($type === 'file'): ?> accept="application/pdf,image/*"  <?php endif; ?>
                autocomplete="off"
                style="font-size: 0.9rem"
                <?php echo e($attributes); ?>

            >
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfc16483a1e4ddb0071f3793d67ad40c)): ?>
<?php $attributes = $__attributesOriginalcfc16483a1e4ddb0071f3793d67ad40c; ?>
<?php unset($__attributesOriginalcfc16483a1e4ddb0071f3793d67ad40c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfc16483a1e4ddb0071f3793d67ad40c)): ?>
<?php $component = $__componentOriginalcfc16483a1e4ddb0071f3793d67ad40c; ?>
<?php unset($__componentOriginalcfc16483a1e4ddb0071f3793d67ad40c); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/input.blade.php ENDPATH**/ ?>