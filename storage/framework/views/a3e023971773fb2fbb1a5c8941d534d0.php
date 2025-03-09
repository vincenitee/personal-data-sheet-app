
<nav class="navbar py-3 navbar-expand-lg bg-white shadow-sm border border-bottom position-sticky top-0"
    style="z-index: 1050;">
    <div class="container-fluid">
        
        <button @click="open = !open" class="btn btn-sm" id="sidebar-toggler">
            <i class="bi bi-grid" style="font-size: 1.3rem;"></i>
        </button>

        <div class="d-flex gap-2 align-items-start">
            
            <?php
                $isEmployee = Auth::user()->hasRole('employee');
                $notificationCount = count(Auth::user()->unreadNotifications);
            ?>

            <?php if($isEmployee): ?>
                <a wire:navigate href="<?php echo e(url(route('employee.notification'))); ?>" type="button"
                    class="my-auto btn btn-sm position-relative">
                    <i class="bi bi-bell" style="font-size: 1.1rem;"></i>

                    <?php if($notificationCount > 0): ?>
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    <?php endif; ?>
                </a>
            <?php endif; ?>

            
            <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    <img src="<?php echo e(Vite::asset('resources/images/hris-logo-black.png')); ?>" alt=""
                        class="rounded-circle border border-primary" style="height: 35px; width: 35px;">
                </button>

                
                <ul class="dropdown-menu dropdown-menu-end" style="max-width: 150px;">
                    <li class="dropdown-item-text">
                        <div class="text-truncate" style="max-width: 100%;">
                            <span class="d-block"><?php echo e(auth()->user()->first_name); ?>

                                <?php echo e(auth()->user()->last_name); ?></span>
                            <small class="d-block text-muted text-truncate"><?php echo e(auth()->user()->email); ?></small>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" wire:navigate href="<?php echo e(url(route('profile'))); ?>">
                            <i class="bi bi-user"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('logout-button', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3760175157-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/navbar.blade.php ENDPATH**/ ?>