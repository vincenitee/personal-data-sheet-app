
<aside
    class="bg-<?php echo e($sidebarColor); ?> bg-gradient text-white vh-100 position-sticky top-0 overflow-hidden position-relative"
    :class="{ 'w-0': !open, 'w-250': open }" @click.outside="if (!event.target.closest('#sidebar-toggler')) open = false"
    id="sidebar">
    
    <div class="d-flex align-items-center px-3 gap-2 border-bottom border-light" style="height: 80px;">
        <a href="<?php echo e(route('employee.dashboard')); ?>">
            <img src="<?php echo e($logoPath); ?>" alt="Logo" id="logo"
                class="img-fluid mb-2 shadow-sm rounded-circle border"
                style="height: 45px; width: 45px; object-fit: cover;">
        </a>

        <span>Digital PDS</span>
        <button @click="open = false" class="ms-auto btn btn-sm text-white">
            <span class="fs-5">&times;</span>
        </button>
    </div>

    
    <ul class="nav flex-column gap-1 mt-3">
        <li class="nav-item <?php echo e(request()->is('employee/dashboard') ? 'bg-white bg-opacity-10' : ''); ?>">
            <a wire:navigate.hover href="<?php echo e(url(route('employee.dashboard'))); ?>" class="nav-link text-white">
                <i class="bi bi-grid me-1" style="font-size: 1.1rem;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?php echo e(request()->is('employee/pds/create') ? 'bg-white bg-opacity-10' : ''); ?>">
            <a wire:navigate.hover href="<?php echo e(url(route('employee.pds.create'))); ?>" class="nav-link text-white">
                <i class="bi bi-file-plus me-1" style="font-size: 1.1rem;"></i>
                Manage My PDS</a>
        </li>
        
        </li>
        <li class="nav-item <?php echo e(request()->is('employee/submission-logs') ? 'bg-white bg-opacity-10' : ''); ?>">
            <a wire:navigate.hover href="<?php echo e(url(route('employee.submission.logs'))); ?>" class="nav-link text-white">
                <i class="bi bi-clock me-1" style="font-size: 1.1rem;"></i>
                Submission Logs</a>
        </li>
        <li class="nav-item <?php echo e(request()->is('employee/notification') ? 'bg-white bg-opacity-10' : ''); ?>">
            <div class="d-flex justify-content-between align-items-center">
                <a wire:navigate href="<?php echo e(url(route('employee.notification'))); ?>" class="nav-link text-white">
                    <i class="bi bi-bell me-1" style="font-size: 1.1rem;"></i>
                    Notification</a>
                <?php
                    $notificationCount = count(Auth::user()->unreadNotifications);
                ?>

                <!--[if BLOCK]><![endif]--><?php if($notificationCount > 0): ?>
                    <span class="badge bg-danger me-2" style="font-size: 0.8rem;"><?php echo e($notificationCount); ?></span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </li>
    </ul>
</aside>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/sidebar.blade.php ENDPATH**/ ?>