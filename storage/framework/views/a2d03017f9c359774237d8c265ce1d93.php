<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'value' => false, 'model' => null]));

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

foreach (array_filter((['name', 'value' => false, 'model' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="form-check form-check-inline">
    <input
        class="form-check-input"
        type="radio"
        name="<?php echo e($name); ?>"
        id="<?php echo e($name); ?>_yes"
        value="1"
        <?php echo e($value === true ? 'checked' : ''); ?>

        <?php if($model): ?> wire:model.live="<?php echo e($model); ?>" <?php endif; ?>
    >
    <label class="form-check-label" for="<?php echo e($name); ?>_yes">Yes</label>
</div>
<div class="form-check form-check-inline">
    <input
        class="form-check-input"
        type="radio"
        name="<?php echo e($name); ?>"
        id="<?php echo e($name); ?>_no"
        value="0"
        <?php echo e($value === false ? 'checked' : ''); ?>

        <?php if($model): ?> wire:model.live="<?php echo e($model); ?>" <?php endif; ?>
    >
    <label class="form-check-label" for="<?php echo e($name); ?>_no">No</label>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/yes-no-radio.blade.php ENDPATH**/ ?>