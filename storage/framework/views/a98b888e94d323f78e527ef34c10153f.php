<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDS | <?php echo e($title ?? 'Page Title'); ?></title>

    <link rel="shortcut icon" href="<?php echo e(asset('images/hris-logo-white.png')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('build/assets/app-D7eHD1Gb.css')); ?>">
    <script defer src="<?php echo e(asset('build/assets/app-BdMOg7Xo.js')); ?>"></script>

    

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body style="background: #E9E9E9">
    
    <div x-data="{ open: true }" class="d-flex" style="min-height: 100vh">
        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'employee')): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('employee.sidebar');

$__html = app('livewire')->mount($__name, $__params, 'lw-1319497152-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php else: ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.sidebar');

$__html = app('livewire')->mount($__name, $__params, 'lw-1319497152-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php endif; ?>

        <div class="flex-1 w-100">
            <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <main class="container-fluid mt-3" style="background: #E9E9E9">
                <?php echo $__env->make('partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>