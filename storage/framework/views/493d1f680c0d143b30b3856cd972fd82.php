<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'count' => 0,
    'title' => 'Title',
    'changePercentage' => 0,
    'changeLabel' => 'from last month',
    'iconClass' => 'bi-question-circle',
    'colorClass' => 'primary',
    'capacity' => null,
    'capacityPercentage' => null,
    'capacityLabel' => 'Capacity',
    'showProgressBar' => true,
    'href' => '#', // Default: No redirect
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
    'count' => 0,
    'title' => 'Title',
    'changePercentage' => 0,
    'changeLabel' => 'from last month',
    'iconClass' => 'bi-question-circle',
    'colorClass' => 'primary',
    'capacity' => null,
    'capacityPercentage' => null,
    'capacityLabel' => 'Capacity',
    'showProgressBar' => true,
    'href' => '#', // Default: No redirect
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<a href="<?php echo e($href); ?>" class="text-decoration-none">
    <div class="card border-0 h-100 shadow-sm">
        <div class="card-body p-3">
            <div class="row g-0">
                <div class="col-auto me-3">
                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-<?php echo e($colorClass); ?>-subtle"
                        style="height: 44px; width: 44px;">
                        <i class="bi <?php echo e($iconClass); ?> text-<?php echo e($colorClass); ?>"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-1 fw-normal"><?php echo e($title); ?></h6>
                            <h4 class="mb-0 fw-bold text-muted"><?php echo e($count); ?></h4>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if(isset($changePercentage)): ?>
                            <span class="badge <?php echo e($changePercentage >= 0 ? 'bg-success bg-opacity-10 text-success' : 'bg-danger bg-opacity-10 text-danger'); ?> px-2 py-1 fs-xs">
                                <i class="bi <?php echo e($changePercentage >= 0 ? 'bi-arrow-up' : 'bi-arrow-down'); ?> me-1"></i>
                                <?php echo e(abs($changePercentage)); ?>%
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <!--[if BLOCK]><![endif]--><?php if($showProgressBar): ?>
                        <div class="mt-2">
                            <div class="progress bg-light" style="height: 6px; border-radius: 3px;">
                                <div class="progress-bar bg-<?php echo e($colorClass); ?>" role="progressbar"
                                    style="width: <?php echo e($capacityPercentage ?? ($capacity ?? abs($changePercentage))); ?>%"
                                    aria-valuenow="<?php echo e($capacityPercentage ?? ($capacity ?? abs($changePercentage))); ?>"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <small class="text-muted"><?php echo e($capacityLabel); ?></small>
                                <small class="text-<?php echo e($colorClass); ?> fw-medium"><?php echo e($capacityPercentage ?? ($capacity ?? abs($changePercentage))); ?>%</small>
                            </div>
                        </div>
                    <?php else: ?>
                        <p class="text-muted small mb-0 mt-1"><?php echo e($changeLabel); ?></p>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
</a>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/dashboard-card.blade.php ENDPATH**/ ?>