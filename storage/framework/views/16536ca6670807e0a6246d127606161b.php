<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['target' => null, 'message' => '']));

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

foreach (array_filter((['target' => null, 'message' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="col-12 text-center my-2"
    wire:loading
    <?php if(!is_null($target)): ?> wire:target="<?php echo e($target); ?>" <?php endif; ?>
>
    <div
        class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Syncing address...</span>
    </div>
    <small class="d-block mt-2"><?php echo e($message); ?></small>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/loading.blade.php ENDPATH**/ ?>