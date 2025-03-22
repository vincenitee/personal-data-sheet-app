<?php
    // Get the current URI
    $currentUri = request()->path();
    \Log::info("Current URI: " . $currentUri); // Log current URI

    // Define the pages and their corresponding names
    $pages = [
        'dashboard' => 'Dashboard',
        'profile' => 'Profile',
        'employee/pds/create' => 'Manage My PDS',
        'employee/notification' => 'Notifications',
        'manage-signups' => 'Manage Signups',
        'employee/submission-logs' => 'Submission Logs',
        'employee/*/preview-entry' => 'Preview Entry',
        'manage-users' => 'Manage Users',


        'admin/users/*/edit' => 'Edit User Information',
        'admin/add-user' => 'Add User',
        'admin/users' => 'Manage Users',
        'admin/manage-signups' => 'Manage Signups',
        'admin/settings' => 'Settings',
        'admin/backup' => 'Manage Backup',
        'admin/submissions' => 'Submissions',
        'admin/submissions/*/review' => 'Review Entry',
        'admin/reports' => 'Generate Reports',
    ];

    // Function to match dynamic routes (e.g., users/*/edit)
    function matchRoute($uri, $pattern) {
        // Convert '*' to regex pattern and escape slashes
        $regex = '/^' . preg_replace('/\//', '\/', str_replace('*', '([^/]+)', $pattern)) . '$/';

        // Log the regex pattern being used
        \Log::info("Matching URI: $uri with Pattern: $pattern => Regex: $regex");

        return preg_match($regex, $uri);
    }

    // Find the current page by matching the URI
    $currentPage = 'Dashboard'; // Default page

    foreach ($pages as $uri => $pageName) {
        if (str_contains($uri, '*') ? matchRoute($currentUri, $uri) : $currentUri === $uri) {
            \Log::info("Matched Route: " . $uri . " => Page: " . $pageName);

            $currentPage = $pageName;
            break;
        }
    }

    // Extract user ID from dynamic route if applicable
    $userId = null;
    if ($currentPage === 'Edit User Information' && preg_match('/users\/(\d+)\/edit/', $currentUri, $matches)) {
        $userId = $matches[1];
        \Log::info("Extracted User ID: " . $userId);
    }

    // Get the appropriate dashboard route based on user role
    $role = Auth::user()->getRoleNames()->first();
    $dashboardRoute = $role . '.dashboard';
    \Log::info("User Role: $role => Dashboard Route: $dashboardRoute");

?>


<nav aria-label="breadcrumb">
    <h4 class="fw-medium" style="margin-bottom: 0;"><?php echo e($currentPage); ?></h4>
    <ol class="breadcrumb" style="font-size: 0.9rem">
        <li class="breadcrumb-item"><a href="<?php echo e(route($dashboardRoute)); ?>">Home</a></li>

        <!-- Intermediate breadcrumb for dynamic routes -->
        <?php if($currentPage === 'Edit User Information'): ?>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.users')); ?>" wire:navigate>Manage Users</a></li>
        <?php elseif($currentPage === 'Review Entry'): ?>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.submissions')); ?>" wire:navigate>Submissions</a></li>
        <?php endif; ?>

        <li class="breadcrumb-item active" aria-current="page">
            <?php echo e($currentPage); ?>

        </li>
    </ol>
</nav>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/breadcrumb.blade.php ENDPATH**/ ?>