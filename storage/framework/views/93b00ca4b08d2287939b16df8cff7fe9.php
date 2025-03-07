<form <?php echo e($attributes(['method' => 'GET'])); ?>>
    <!--[if BLOCK]><![endif]--><?php if($attributes->get('method', 'GET') !== 'GET'): ?>
        <?php echo csrf_field(); ?>
        <?php echo method_field($attributes->get('method')); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php echo e($slot); ?>

</form>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/forms/form.blade.php ENDPATH**/ ?>