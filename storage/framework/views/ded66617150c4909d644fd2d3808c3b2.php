<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['icon' => null]));

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

foreach (array_filter((['icon' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<button <?php echo e($attributes->merge(['class' => 'btn btn-primary'])); ?>>
    <!--[if BLOCK]><![endif]--><?php if($icon): ?> <i class="<?php echo e($icon); ?>"></i> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php echo e($slot); ?>

</button>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/button.blade.php ENDPATH**/ ?>