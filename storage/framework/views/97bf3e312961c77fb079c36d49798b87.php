<?php
    $flash = session('flash', []);
    $type = ($flash['status'] ?? 'success') === 'error' ? 'alert-danger' : 'alert-success';
    $message = $flash['message'] ?? null;
?>

<!--[if BLOCK]><![endif]--><?php if($message): ?>
    <div class="alert <?php echo e($type); ?>">
        <small><?php echo e($message); ?></small>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/components/flash-message.blade.php ENDPATH**/ ?>