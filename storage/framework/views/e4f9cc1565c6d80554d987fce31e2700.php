<?php
    // Get the current URI
    $currentUri = request()->path();

    // Define the pages and their corresponding names
    $pages = [
        'dashboard' => 'Dashboard',
        'profile' => 'Profile',
        'employee/pds/create' => 'Manage My PDS',
        'employee/notification' => 'Notifications',
        'manage-signups' => 'Manage Signups',
        'employee/submission-logs' => 'Submission Logs',
        'print' => 'Print Entry',
        'manage-users' => 'Manage Users',
        'users/*/edit' => 'Edit User Information', // Dynamic route
    ];

    // Function to match dynamic routes (e.g., users/*/edit)
    $matchDynamicRoute = function ($uri, $pattern) {
        // Replace * with a regex pattern to match any segment
        $pattern = str_replace('*', '([^/]+)', $pattern);

        // Escape slashes for regex
        $pattern = str_replace('/', '\/', $pattern);

        // Match the pattern against the URI
        return preg_match("/^{$pattern}$/", $uri);
    };

    // Find the current page by matching the URI
    $currentPage = null;

    foreach ($pages as $uri => $pageName) {

        if (str_contains($uri, '*')) {
            // Match dynamic routes
            if ($matchDynamicRoute($currentUri, $uri)) {
                $currentPage = $pageName;
                break;
            }
        } elseif ($currentUri === $uri) {
            // Match exact routes
            $currentPage = $pageName;
            break;
        }
    }

    // Default to Dashboard if no match found
    $currentPage = $currentPage ?? 'Dashboard';

    // Extract user ID from URI for dynamic routes
    $userId = null;
    if ($currentPage === 'Edit User Information') {
        preg_match('/users\/(\d+)\/edit/', $currentUri, $matches);
        $userId = $matches[1] ?? null;
    }

    // Get the appropriate dashboard route based on user role
    $role = Auth::user()->getRoleNames()->first();
    $dashboardRoute = $role . '.dashboard';

    // Debugging (optional)
    // echo "Current URI: $currentUri<br>";
    // echo "Current Page: $currentPage<br>";
    // echo "User ID: $userId<br>";
    // echo "Dashboard Route: $dashboardRoute<br>";
?>

<nav aria-label="breadcrumb">
    <h4 class="fw-medium" style="margin-bottom: 0;"><?php echo e($currentPage); ?></h4>
    <ol class="breadcrumb" style="font-size: 0.9rem">
        <li class="breadcrumb-item"><a href="<?php echo e(route($dashboardRoute)); ?>">Home</a></li>

        <!-- Intermediate breadcrumb for dynamic routes -->
        <?php if($currentPage === 'Edit User Information'): ?>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.manage-users')); ?>">Manage Users</a></li>
        <?php endif; ?>

        <li class="breadcrumb-item active" aria-current="page">
            <?php echo e($currentPage); ?>

        </li>
    </ol>
</nav>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/breadcrumb.blade.php ENDPATH**/ ?>