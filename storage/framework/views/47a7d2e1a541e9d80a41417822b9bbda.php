<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDS | <?php echo e($title ?? 'Page Title'); ?> </title>

    <link rel="shortcut icon" href="<?php echo e(asset('images/hris-logo-white.png')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('build/assets/app-D7eHD1Gb.css')); ?>">

    <script defer src="<?php echo e(asset('build/assets/app-BdMOg7Xo.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('styles'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="vh-100" style="background: #e9e9e9;">

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/layouts/auth.blade.php ENDPATH**/ ?>