
<aside
    class="bg-dark text-white vh-100 position-sticky top-0 overflow-hidden position-relative"
    :class="{ 'w-0': !open, 'w-250': open }"
    @click.outside="if (! event.target.closest('#sidebar-toggler')) open = false"
    id="sidebar">

    
    <div class="d-flex align-items-center px-3 gap-2 border-bottom border-secondary" style="height: 80px;">
        <img src="<?php echo e(Vite::asset('resources/images/hris-logo-white.png')); ?>" alt="" id="logo">
        <span>Digital PDS</span>
        <button @click="open = false" class="ms-auto btn btn-sm text-white">
            <span class="fs-5">&times;</span>
        </button>
    </div>

    
    <ul class="nav flex-column gap-1 mt-3">
        <li class="nav-item <?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>">
            <a
                wire:navigate
                href="<?php echo e(url(route('admin.dashboard'))); ?>"
                class="nav-link text-white"
            >
                <i class="bi bi-speedometer2 me-1" style="font-size: 1.1rem;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?php echo e(request()->is('admin/add-user') ? 'active' : ''); ?>">
            <a
                wire:navigate
                href="<?php echo e(url(route('admin.add-user'))); ?>"
                class="nav-link text-white"
            >
                <i class="bi bi-person-plus me-1" style="font-size: 1.1rem;"></i>
                <span>Add User</span>
            </a>
        </li>
        <li class="nav-item <?php echo e(request()->is('admin/users') ? 'active' : ''); ?>">
            <a
                wire:navigate
                href="<?php echo e(url(route('admin.users'))); ?>"
                class="nav-link text-white"
            >
                <i class="bi bi-people me-1" style="font-size: 1.1rem;"></i>
                <span>Manage Users</span>
            </a>
        </li>
        <li class="nav-item <?php echo e(request()->is('admin/manage-signups') ? 'active' : ''); ?>">
            <a
                wire:navigate
                href="<?php echo e(url(route('admin.manage-signup'))); ?>"
                class="nav-link text-white"
            >
                <i class="bi bi-person-check me-1" style="font-size: 1.1rem;"></i>
                <span>Signups</span>
            </a>
        </li>
        <li class="nav-item <?php echo e(request()->is('admin/submissions') ? 'active' : ''); ?>" >
            <a
                wire:navigate
                href="<?php echo e(url(route('admin.submissions'))); ?>"
                class="nav-link text-white"
            >
                <i class="bi bi-file-earmark-text me-1" style="font-size: 1.1rem;"></i>
                <span>Submission Entries</span>
            </a>
        </li>
        <li class="nav-item">
            <a
                wire:navigate
                
                class="nav-link text-white"
            >
                <i class="bi bi-clipboard-data me-1" style="font-size: 1.1rem;"></i>
                <span>Generate Reports</span>
            </a>
        </li>
        <li class="nav-item">
            <a
                wire:navigate
                
                class="nav-link text-white"
            >
                <i class="bi bi-gear me-1" style="font-size: 1.1rem;"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</aside>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/admin/sidebar.blade.php ENDPATH**/ ?>