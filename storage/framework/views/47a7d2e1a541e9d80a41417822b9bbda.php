<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PDS | <?php echo e($title ?? 'Page Title'); ?> </title>

    <link rel="stylesheet" href="<?php echo e(Vite::asset('resources/css/app.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(Vite::asset('resources/images/hris-logo-white.png')); ?>" type="image/x-icon">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

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