<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['number', 'title' => null, 'subtitle']));

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

foreach (array_filter((['number', 'title' => null, 'subtitle']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="card" style="font-size: 14px;">
    <div class="card-header">
        <div class="card-title mb-0">
            <strong><?php echo e($number); ?>. </strong>
            <?php echo e($title); ?>

            <p class="text-danger d-inline"><?php echo e($subtitle ?? ''); ?></p>
        </div>
    </div>
    <div <?php echo e($attributes->merge(['class' => 'card-body'])); ?>>
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/question-card.blade.php ENDPATH**/ ?>