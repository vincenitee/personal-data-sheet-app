<div class="card card-body">

    <div class="d-flex flex-column flex-md-row gap-3 justify-content-between align-items-center mb-3">
        <!-- Search input remains at the top right -->
        <div class="d-flex flex-wrap gap-2 align-items-center">
            <!-- Status Filter -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-flex align-items-center gap-1"
                    type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-filter"></i> Status
                    <!--[if BLOCK]><![endif]--><?php if($statusFilter): ?>
                        <span class="badge bg-primary ms-1">1</span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </button>
                <ul class="dropdown-menu p-2" style="min-width: 200px;">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-all"
                                wire:model.live="statusFilter" value="" checked>
                            <label class="form-check-label" for="status-all">All</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-approved"
                                wire:model.live="statusFilter" value="approved">
                            <label class="form-check-label" for="status-approved">
                                <span class="badge bg-success">Approved</span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-under-review"
                                wire:model.live="statusFilter" value="under_review">
                            <label class="form-check-label" for="status-under-review">
                                <span class="badge bg-warning">Under Review</span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-needs-revision"
                                wire:model.live="statusFilter" value="needs_revision">
                            <label class="form-check-label" for="status-needs-revision">
                                <span class="badge bg-danger">Needs Revision</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Date Range Filter -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-flex align-items-center gap-1"
                    type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-calendar-range"></i> Date Range
                    <!--[if BLOCK]><![endif]--><?php if($dateFrom || $dateTo): ?>
                        <span class="badge bg-primary ms-1">1</span>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </button>
                <div class="dropdown-menu p-3" style="min-width: 280px;">
                    <div class="mb-2">
                        <label for="date-from" class="form-label small">From</label>
                        <input type="date" class="form-control form-control-sm" id="date-from"
                            wire:model.live.debounce.500ms="dateFrom">
                    </div>
                    <div class="mb-2">
                        <label for="date-to" class="form-label small">To</label>
                        <input type="date" class="form-control form-control-sm" id="date-to"
                            wire:model.live.debounce.500ms="dateTo">
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <button class="btn btn-sm btn-outline-secondary" wire:click="resetDateFilter">Clear</button>
                        <button class="btn btn-sm btn-primary" wire:click="applyDateFilter">Apply</button>
                    </div>
                </div>
            </div>

            <!-- Department Filter (if applicable) -->
            

            <!-- Clear All Filters Button -->
            <!--[if BLOCK]><![endif]--><?php if($statusFilter || $dateFrom || $dateTo || $departmentFilter): ?>
                <button class="btn btn-sm btn-danger d-flex align-items-center gap-1" wire:click="resetAllFilters">
                    <i class="bi bi-x-circle"></i> Clear Filters
                </button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!-- Search input (moved to the right) -->
        <div class="d-flex justify-content-end">
            <div class="input-group">
                <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['name' => 'search','placeholder' => 'Search...','wire:model.live.debounce.250ms' => 'search','class' => 'form-control-sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','placeholder' => 'Search...','wire:model.live.debounce.250ms' => 'search','class' => 'form-control-sm']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
            </div>
        </div>
    </div>

    

    <div class="table-responsive">
        <table class="table table-hover" style="font-size: 14px;">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer">
                        ID
                        
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer">
                        Employee
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'first_name'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer">
                        Office
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'first_name'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('status')" style="cursor: pointer">
                        Status
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'status'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>

                    <th wire:click="sortBy('created_at')" style="cursor: pointer">
                        Date Submitted
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'created_at'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->pdsEntries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pdsEntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                    <tr class="p-4">
                        
                        <td class="align-middle"><?php echo e($index + 1); ?></td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    
                                    <img src="<?php echo e(asset($pdsEntry->attachment?->passport_photo ?? 'passport_photos/default.png')); ?>"
                                        loading="lazy" alt="Employee Photo" class="rounded border shadow-sm"
                                        width="45" height="45" style="object-fit: cover">
                                </div>
                                <div class="employee-details">
                                    <h6 class="fw-semibold mb-1"><a
                                            href="<?php echo e(url(route('submissions.review', $pdsEntry->id))); ?>"
                                            class="nav-link text-primary"
                                            wire:navigate><?php echo e($this->getUserFullName($pdsEntry->user)); ?></a></h6>
                                    <span class="text-muted fs-7">
                                        Employee ID: <span class="fw-medium"><?php echo e($pdsEntry->user->id); ?></span>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <?php echo e($this->getValue($pdsEntry->user->department)); ?>

                        </td>
                        <td class="align-middle">
                            <?php
                                $status = $pdsEntry->status;
                                $statusColor = match ($status) {
                                    'approved' => 'success',
                                    'under_review' => 'warning',
                                    'needs_revision' => 'danger',
                                    default => 'secondary',
                                };
                            ?>

                            <span
                                class="badge bg-<?php echo e($statusColor); ?>"><?php echo e(ucwords(str_replace('_', ' ', $status))); ?></span>
                        </td>

                        <td class="align-middle">
                            <?php echo e($pdsEntry->updated_at->format('M d, Y')); ?>

                        </td>
                        <td class="align-middle">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown" data-bs-boundary="viewport">
                                    <i class="bi bi-three-dots text-secondary"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-start">
                                    <!--[if BLOCK]><![endif]--><?php if($pdsEntry->status === 'under_review'): ?>
                                        <li>
                                            <a wire:navigate href="<?php echo e(route('submissions.review', $pdsEntry->id)); ?>"
                                                class="dropdown-item">
                                                Review
                                            </a>
                                        </li>
                                        <li>
                                            <a wire:navigate href="<?php echo e(route('pds.print', $pdsEntry->id)); ?>"
                                                class="dropdown-item">
                                                Print
                                            </a>
                                        </li>
                                        <li>
                                            <a @click="confirmEntryApproval(<?php echo e($pdsEntry->id); ?>)"
                                                class="dropdown-item text-success">
                                                Approve
                                            </a>
                                        </li>
                                    <?php elseif($pdsEntry->status === 'approved'): ?>
                                        <li>
                                            <a class="dropdown-item">
                                                Download
                                            </a>
                                        </li>
                                        <li>
                                            <a wire:navigate href="<?php echo e(route('pds.print', $pdsEntry->id)); ?>"
                                                class="dropdown-item">
                                                Print
                                            </a>
                                        </li>
                                        <li>
                                            <a @click="confirmRevertEntry(<?php echo e($pdsEntry->id); ?>)"
                                                class="dropdown-item text-warning">
                                                Revert to Under Review
                                            </a>
                                        </li>
                                    <?php elseif($pdsEntry->status === 'needs_revision'): ?>
                                        <li>
                                            <a wire:navigate href="<?php echo e(route('submissions.review', $pdsEntry->id)); ?>"
                                                class="dropdown-item">
                                                View
                                            </a>
                                        </li>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No Entries found. Try adjusting your search or filters.
                        </td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        <!--[if BLOCK]><![endif]--><?php if($this->pdsEntries->hasPages()): ?>
            <?php echo e($this->pdsEntries->links()); ?>

        <?php else: ?>
            <p class="text-muted mx-2">Showing all entries</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/submission-entries.blade.php ENDPATH**/ ?>