<!-- resources/views/components/dashboard-card-placeholder.blade.php -->
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'showProgressBar' => true,
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
    'showProgressBar' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="card border-0 h-100">
    <div class="card-body p-3">
        <div class="row g-0">
            <!-- Icon placeholder -->
            <div class="col-auto me-3">
                <div class="placeholder-glow">
                    <div class="placeholder rounded-circle" style="height: 44px; width: 44px;"></div>
                </div>
            </div>

            <div class="col">
                <div class="d-flex justify-content-between align-items-start">
                    <!-- Title and count placeholders -->
                    <div class="placeholder-glow" style="width: 70%;">
                        <span class="placeholder col-7 mb-1" style="height: 14px;"></span>
                        <span class="placeholder col-10" style="height: 28px;"></span>
                    </div>

                    <!-- Change percentage badge placeholder -->
                    <div class="placeholder-glow">
                        <span class="placeholder col-12" style="height: 24px; width: 60px; border-radius: 6px;"></span>
                    </div>
                </div>

                <!--[if BLOCK]><![endif]--><?php if($showProgressBar): ?>
                    <!-- Progress bar placeholder -->
                    <div class="mt-2">
                        <div class="placeholder-glow mt-3">
                            <span class="placeholder col-12" style="height: 6px; border-radius: 3px;"></span>
                        </div>

                        <!-- Capacity label placeholders -->
                        <div class="d-flex justify-content-between mt-1">
                            <div class="placeholder-glow" style="width: 40%;">
                                <span class="placeholder col-12" style="height: 14px;"></span>
                            </div>
                            <div class="placeholder-glow" style="width: 15%;">
                                <span class="placeholder col-12" style="height: 14px;"></span>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Change label placeholder -->
                    <div class="mt-1">
                        <div class="placeholder-glow" style="width: 60%;">
                            <span class="placeholder col-12" style="height: 16px;"></span>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/placeholders/dashboard-card.blade.php ENDPATH**/ ?>