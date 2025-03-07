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
        <table class="table table-hover" style="font-size: 14px">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer;">
                        ID
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'id'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer;">
                        Fullname
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'first_name'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        Email
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'email'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('sex')" style="cursor: pointer;">
                        Gender
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'sex'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('status')" style="cursor: pointer;">
                        Status
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'status'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                        Date Registered
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'created_at'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="align-middle"><?php echo e($user->id); ?></td>
                        <td class="align-middle">
                            <?php echo e($user->first_name); ?>

                            <?php echo e(optional($user->middle_name)[0] ? optional($user->middle_name)[0] . '.' : ''); ?>

                            <?php echo e($user->last_name); ?>

                        </td>
                        <td class="align-middle"><?php echo e($user->email); ?></td>
                        <td class="align-middle"><?php echo e(ucwords($user->sex)); ?></td>
                        <td class="align-middle">
                            <span
                                class="badge
                                <?php echo e($user->status === 'approved' ? 'bg-success' : ($user->status === 'rejected' ? 'bg-danger' : 'bg-warning')); ?>">
                                <?php echo e(ucwords($user->status)); ?>

                            </span>

                        </td>
                        <td class="align-middle"><?php echo e($user->created_at->format('M d, Y')); ?></td>
                        
                        <td class="align-middle text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button @click="acceptSignup(<?php echo e($user->id); ?>)" wire:loading.attr="disabled"
                                    class="btn btn-sm btn-success" <?php if($user->status === 'approved'): ?> disabled <?php endif; ?>>
                                    <i class="bi bi-check"></i>
                                    <span class="d-none d-md-inline-block">Accept</span>
                                </button>
                                <button @click="rejectSignup(<?php echo e($user->id); ?>)" wire:loading.attr="disabled"
                                    class="btn btn-sm btn-outline-danger" <?php if($user->status === 'rejected'): ?> disabled <?php endif; ?>>
                                    <i class="bi bi-x"></i>
                                    <span class="d-none d-md-inline-block">Reject</span>
                                </button>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center"><i class="bi bi-person-x"></i> No new signups</td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-3 d-flex justify-content-end">
        <?php echo e($this->users->links()); ?>

    </div>

</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/manage-signup.blade.php ENDPATH**/ ?>