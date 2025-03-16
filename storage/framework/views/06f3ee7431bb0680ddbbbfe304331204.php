<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'info', 'message' => '']));

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

foreach (array_filter((['type' => 'info', 'message' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    // Get flash message from session if not directly provided
    $alertType = $type ?? session('flash.status') ?? 'info';
    $alertMessage = $message ?? session('flash.message') ?? '';

    // Map alert types to corresponding Bootstrap icons
    $icons = [
        'success' => 'bi-check-circle-fill',
        'danger' => 'bi-exclamation-triangle-fill',
        'warning' => 'bi-exclamation-circle-fill',
        'info' => 'bi-info-circle-fill',
        'primary' => 'bi-bell-fill',
        'secondary' => 'bi-bell-fill',
        'light' => 'bi-bell-fill',
        'dark' => 'bi-bell-fill',
    ];

    $icon = $icons[$alertType] ?? 'bi-bell-fill';
?>

<!--[if BLOCK]><![endif]--><?php if($alertMessage): ?>
    <div class="alert alert-<?php echo e($alertType); ?> alert-dismissible fade show my-3 shadow-sm border-start">
        <div class="d-flex align-items-center">
            <i class="bi <?php echo e($icon); ?> me-2"></i>

            <div class="flex-grow-1">
                <span><?php echo e($alertMessage); ?></span>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/flash-alerts.blade.php ENDPATH**/ ?>