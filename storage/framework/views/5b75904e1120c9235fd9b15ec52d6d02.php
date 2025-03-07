<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'label',
    'colSpan' => 2,
    'type' => 'default',
    'icon' => null,
    'class' => ''
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
    'label',
    'colSpan' => 2,
    'type' => 'default',
    'icon' => null,
    'class' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<tr class="table-separator <?php echo e($class); ?>">
    <th
        colspan="<?php echo e($colSpan); ?>"
        class="table-separator__header
            text-start
            px-3
            py-2
            <?php switch($type):
                case ('primary'): ?>
                    bg-primary text-white
                <?php break; ?>
                <?php case ('secondary'): ?>
                    bg-secondary text-white
                <?php break; ?>
                <?php case ('light'): ?>
                    bg-light text-muted
                <?php break; ?>
                <?php case ('dark'): ?>
                    bg-dark text-white
                <?php break; ?>
                <?php default: ?>
                    bg-soft-primary text-primary
            <?php endswitch; ?>
            fw-semibold
            text-uppercase
            align-middle"
    >
        <!--[if BLOCK]><![endif]--><?php if($icon): ?>
            <i class="<?php echo e($icon); ?> me-2"></i>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php echo e(Str::upper($label)); ?>

    </th>
</tr>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/table-separator.blade.php ENDPATH**/ ?>