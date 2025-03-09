<div class="card card-body">

    <div class="d-flex justify-content-end m-2">
        <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['name' => 'search','placeholder' => 'Search...','wire:model.live.debounce.250ms' => 'search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','placeholder' => 'Search...','wire:model.live.debounce.250ms' => 'search']); ?> <?php echo $__env->renderComponent(); ?>
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

                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->submissionEntries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $submissionEntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                    <tr class="p-4">
                        
                        <td class="align-middle"><?php echo e($index + 1); ?></td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    
                                    <img src="<?php echo e(asset('storage/' . ($submissionEntry->attachment?->passport_photo ?? 'passport_photos/default.png'))); ?>"
                                        alt="Employee Photo" class="rounded border shadow-sm" width="45"
                                        height="45" style="object-fit: cover">
                                </div>
                                <div class="employee-details">
                                    <h6 class="fw-semibold mb-1"><a
                                            href="<?php echo e(url(route('submissions.review', $submissionEntry->id))); ?>"
                                            class="nav-link text-primary"
                                            wire:navigate><?php echo e($this->getUserFullName($submissionEntry->user)); ?></a></h6>
                                    <span class="text-muted fs-7">
                                        Employee ID: <span class="fw-medium"><?php echo e($submissionEntry->user->id); ?></span>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <span class="badge bg-warning">Under Review</span>
                        </td>

                        <td class="align-middle">
                            <?php echo e($submissionEntry->created_at->format('M d, Y')); ?>

                        </td>
                        <td class="align-middle">
                            

                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots text-secondary"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-start">
                                    <li>
                                        <a href="<?php echo e(url(route('submissions.review', $submissionEntry->id))); ?>"
                                            class="dropdown-item">View</a>
                                        <a href="" class="dropdown-item">Download</a>
                                        <a href="" class="dropdown-item">Print</a>
                                    </li>
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
        <!--[if BLOCK]><![endif]--><?php if($this->submissionEntries->hasPages()): ?>
            <?php echo e($this->submissionEntries->links()); ?>

        <?php else: ?>
            <p class="text-muted mx-2">Showing all entries</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/submission-entries.blade.php ENDPATH**/ ?>