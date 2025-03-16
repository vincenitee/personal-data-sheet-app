<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => '',
    'badgeLabel' => 'Required',
    'badgeColor' => 'primary',
    'isRequired' => true,
    'collapsed' => false,
    'openCard' => '',
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
    'title' => '',
    'badgeLabel' => 'Required',
    'badgeColor' => 'primary',
    'isRequired' => true,
    'collapsed' => false,
    'openCard' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
<?php $__env->stopPush(); ?>

<div x-data="{ isOpen: false }" x-init="$watch('openCard', value => isOpen = (value === '<?php echo e($openCard); ?>'))" x-bind:isOpen="openCard === '<?php echo e($openCard); ?>'"
    class="card border-0 shadow-sm mb-2">

    
    
    <div class="card-header bg-<?php echo e($badgeColor); ?> text-light py-3 cursor-pointer"
        @click="openCard = (openCard === '<?php echo e($openCard); ?>' ? null : '<?php echo e($openCard); ?>')" role="button">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">
                <i class="bi <?php echo e($attributes->get('icon')); ?> me-2"></i>
                <?php echo e($title); ?>

            </h6>
            <i class="bi bi-chevron-down transition-transform duration-200" :class="{ 'rotate-180': isOpen }"></i>
        </div>
    </div>

    
    <div x-cloak x-show="isOpen" x-collapse x-transition:enter="transition-all ease-out duration-300"
        x-transition:leave="transition-all ease-in duration-300">
        <!--[if BLOCK]><![endif]--><?php if($attributes->has('loadingTarget')): ?>
            <?php echo $__env->make('partials.loading', [
                'target' => $attributes->get('loadingTarget'),
                'message' => 'Syncing entries...',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        
        <div class="card-body"
            <?php echo e($attributes->has('loadingTarget') ? 'wire:loading.remove wire:target=' . $attributes->get('loadingTarget') : ''); ?>>
            <div class="row g-3 position-relative">
                <?php echo e($slot); ?>

            </div>
        </div>

        
        <!--[if BLOCK]><![endif]--><?php if(isset($footer)): ?>
            <div class="card-footer bg-light py-3">
                <?php echo e($footer); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/review-card.blade.php ENDPATH**/ ?>