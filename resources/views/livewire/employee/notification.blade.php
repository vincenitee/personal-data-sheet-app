<div class="card shadow-sm">
    <div class="card-body">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <small class="text-muted">Notifications</small>
            <button class="btn btn-sm btn-outline-secondary" wire:click="markAllAsRead">
                <i class="bi bi-check-all"></i> Mark all as read
            </button>
        </div>

        <!-- Unread Notifications -->
        <h6 class="text-primary fw-semibold mb-2">Unread</h6>
        <ul class="list-group mb-3">
            <!-- Example Unread Notification -->
            <li class="list-group-item d-flex gap-3 align-items-start bg-light p-3">
                <div class="flex-shrink-0">
                    <span class="d-block rounded-circle bg-success border border-light" style="height: 14px; width: 14px;"></span>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-1">
                        <h6 class="fw-semibold mb-0">Your submission has been approved</h6>
                        <small class="text-muted">1 day ago</small>
                    </div>
                    <p class="text-muted small mb-0">Your submission has been approved by the HR administrator.</p>
                </div>
                <button class="btn btn-sm btn-outline-success" wire:click="markAsRead(1)">
                    <i class="bi bi-check"></i>
                </button>
            </li>

            <!-- Empty State for Unread -->
            <li class="list-group-item text-muted small text-center p-3" wire:if="count($unreadNotifications) === 0">
                No unread notifications.
            </li>
        </ul>

        <!-- Read Notifications -->
        <h6 class="text-muted fw-semibold mb-2">Read</h6>
        <ul class="list-group">
            <!-- Example Read Notification -->
            <li class="list-group-item d-flex gap-3 align-items-start text-muted p-3">
                <div class="flex-grow-1">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-1">
                        <h6 class="fw-semibold mb-0">Your profile update was successful</h6>
                        <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="small mb-0">Your profile details were updated successfully.</p>
                </div>
            </li>

            <!-- Empty State for Read -->
            <li class="list-group-item text-muted small text-center p-3" wire:if="count($readNotifications) === 0">
                No read notifications.
            </li>
        </ul>
    </div>
</div>
