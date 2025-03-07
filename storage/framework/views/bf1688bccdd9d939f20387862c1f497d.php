<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['label', 'value' => null, 'type' => 'text', 'icon' => null, 'emptyState' => 'Not Applicable']));

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

foreach (array_filter((['label', 'value' => null, 'type' => 'text', 'icon' => null, 'emptyState' => 'Not Applicable']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<tr class="detail-row">
    <th scope="row" class="detail-row__label text-muted fw-semibold text-start ps-3 py-3"
        style="width: 25%; min-width: 150px;">
        <!--[if BLOCK]><![endif]--><?php if($icon): ?>
            <i class="<?php echo e($icon); ?> me-2 text-secondary"></i>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php echo e(Str::upper($label)); ?>

    </th>
    <td class="detail-row__value fw-medium py-3" style="width: 75%;">
        <!--[if BLOCK]><![endif]--><?php if($value !== null && $value !== ''): ?>
            <!--[if BLOCK]><![endif]--><?php switch($type):
                case ('text'): ?>
                    <span class="text-dark"><?php echo e($value); ?></span>
                <?php break; ?>

                <?php case ('email'): ?>
                    <a href="mailto:<?php echo e($value); ?>" class="text-primary text-decoration-underline">
                        <?php echo e($value); ?>

                    </a>
                <?php break; ?>

                <?php case ('url'): ?>
                    <a href="<?php echo e($value); ?>" target="_blank" rel="noopener noreferrer"
                        class="text-primary text-decoration-underline">
                        <?php echo e($value); ?>

                    </a>
                <?php break; ?>

                <?php case ('boolean'): ?>
                    <span class="badge <?php echo e($value ? 'bg-success' : 'bg-danger'); ?>">
                        <?php echo e($value ? 'Yes' : 'No'); ?>

                    </span>
                <?php break; ?>

                <?php default: ?>
                    <span><?php echo e($value); ?></span>
            <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
            <span class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                
                <?php echo e($emptyState); ?>

            </span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/table-row.blade.php ENDPATH**/ ?>