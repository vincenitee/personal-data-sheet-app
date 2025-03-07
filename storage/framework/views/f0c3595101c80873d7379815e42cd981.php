<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'required' => false]));

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

foreach (array_filter((['name', 'required' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<label for="<?php echo e($name); ?>" class="form-label" style="font-size: 0.8rem; margin-bottom: 0.2rem;">
    <?php echo e($slot); ?>


    <!--[if BLOCK]><![endif]--><?php if($required): ?>
        <span class="text-danger fw-bold">*</span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</label>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/label.blade.php ENDPATH**/ ?>