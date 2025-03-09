<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body p-3 p-md-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="card-title mb-0 d-flex align-items-center">
                <i class="bi bi-bell me-2 text-primary"></i>
                Notifications
            </h5>
            <button class="btn btn-sm btn-outline-primary px-3 rounded-pill" wire:click="markAllAsRead">
                <i class="bi bi-check-all me-1"></i> Mark all as read
            </button>
        </div>

        <!-- Unread Notifications -->
        <!--[if BLOCK]><![endif]--><?php if(count($unreadNotifications) > 0): ?>
            <div class="notification-section mb-4">
                <div class="section-header d-flex align-items-center mb-3">
                    <span class="badge bg-primary rounded-pill me-2"><?php echo e(count($unreadNotifications)); ?></span>
                    <h6 class="fw-semibold mb-0">Unread</h6>
                </div>

                <div class="notification-list">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="notification-item unread position-relative mb-3 p-3 rounded-3 border-start border-primary border-3">
                            <div class="notification-content">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold mb-0"><?php echo e($notification->data['title'] ?? 'Notification'); ?></h6>
                                    <div class="d-flex align-items-center">
                                        <span class="notification-indicator bg-primary rounded-circle me-2"
                                            title="Unread"></span>
                                        <small
                                            class="text-muted"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                    </div>
                                </div>
                                <p class="text-dark small mb-2"><?php echo e($notification->data['message']); ?></p>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-link text-primary p-0"
                                        wire:click="markAsRead('<?php echo e($notification->id); ?>')">
                                        <i class="bi bi-check-circle me-1"></i> Mark as read
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        <?php else: ?>
            <div class="empty-state text-center py-4 mb-4 bg-light rounded-3">
                <i class="bi bi-check-circle text-primary opacity-50 fs-1 mb-2"></i>
                <p class="text-muted mb-0">No unread notifications</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- Read Notifications -->
        <div class="notification-section">
            <div class="section-header d-flex align-items-center mb-3">
                <!--[if BLOCK]><![endif]--><?php if(count($readNotifications) > 0): ?>
                    <span class="badge bg-secondary rounded-pill me-2"><?php echo e(count($readNotifications)); ?></span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <h6 class="fw-semibold text-secondary mb-0">Previously Read</h6>
            </div>

            <div class="notification-list">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $readNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="notification-item read position-relative mb-2 p-3 rounded-3">
                        <div class="notification-content opacity-75">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-medium mb-0"><?php echo e($notification->data['title'] ?? 'Notification'); ?></h6>
                                <small class="text-muted"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                            </div>
                            <p class="text-muted small mb-0"><?php echo e($notification->data['message']); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-state text-center py-3 bg-light rounded-3">
                        <p class="text-muted small mb-0">No read notifications</p>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
    <style>
        .notification-item {
            transition: all 0.2s ease;
            background-color: #f8f9fa;
        }

        .notification-item.unread {
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .notification-item:hover {
            background-color: #f8f9fa;
        }

        .notification-indicator {
            width: 8px;
            height: 8px;
        }

        .empty-state {
            padding: 1.5rem;
        }

        @media (max-width: 576px) {
            .notification-item {
                padding: 0.75rem !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/notification.blade.php ENDPATH**/ ?>