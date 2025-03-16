<div class="card card-body">
    <!--[if BLOCK]><![endif]--><?php if(session('flash')): ?>
        <?php if (isset($component)) { $__componentOriginal62f2d74fa8b498674280fbe32f0633f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal62f2d74fa8b498674280fbe32f0633f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-alerts','data' => ['type' => ''.e(session('flash.status')).'','message' => ''.e(session('flash.message')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flash-alerts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => ''.e(session('flash.status')).'','message' => ''.e(session('flash.message')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal62f2d74fa8b498674280fbe32f0633f5)): ?>
<?php $attributes = $__attributesOriginal62f2d74fa8b498674280fbe32f0633f5; ?>
<?php unset($__attributesOriginal62f2d74fa8b498674280fbe32f0633f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal62f2d74fa8b498674280fbe32f0633f5)): ?>
<?php $component = $__componentOriginal62f2d74fa8b498674280fbe32f0633f5; ?>
<?php unset($__componentOriginal62f2d74fa8b498674280fbe32f0633f5); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <div class="d-flex justify-content-end m-2">
        <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['wire:model.live.debounce' => 'search','name' => 'search','placeholder' => 'Search...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce' => 'search','name' => 'search','placeholder' => 'Search...']); ?> <?php echo $__env->renderComponent(); ?>
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
        <div class="container-fluid p-0 mb-4">

        </div>
        <table class="table table-hover" style="font-size: 14px; min-height: 150px;">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer;">
                        ID
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'id'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer;">
                        First Name
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'first_name'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('middle_name')" style="cursor: pointer;">
                        Middle Name
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'middle_name'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('last_name')" style="cursor: pointer;">
                        Last Name
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'last_name'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('sex')" style="cursor: pointer;">
                        Sex
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'sex'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>

                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        Email
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'email'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th wire:click="sortBy('deactivated')" style="cursor: pointer;">
                        Status
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'deactivated'): ?>
                            <i class="bi bi-arrow-<?php echo e($sortDirection === 'asc' ? 'up' : 'down'); ?>"></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th style="cursor: pointer;">
                        Role
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $this->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="align-middle"> <?php echo e($user->id); ?> </td>
                        <td class="align-middle"> <?php echo e($user->first_name); ?> </td>
                        <td class="align-middle"> <?php echo e($user->middle_name); ?> </td>
                        <td class="align-middle"> <?php echo e($user->last_name); ?> </td>
                        <td class="align-middle"> <?php echo e(ucwords($user->sex)); ?> </td>
                        <td class="align-middle"> <?php echo e($user->email); ?> </td>
                        <td class="align-middle">
                            <span class="badge bg-<?php echo e($user->deactivated ? 'secondary' : 'success'); ?>">
                                <?php echo e($user->deactivated ? 'Deactivated' : 'Active'); ?>

                            </span>
                        </td>
                        <td class="align-middle">
                            <?php
                                $role = $user->getRoleNames()->first();
                                $roleColor = match ($role) {
                                    'admin' => 'danger',
                                    'employee' => 'primary',
                                    default => 'secondary',
                                };
                            ?>

                            <!--[if BLOCK]><![endif]--><?php if($role): ?>
                                <span class="badge bg-<?php echo e($roleColor); ?>"><?php echo e(ucwords($role)); ?></span>
                            <?php else: ?>
                                <span class="badge bg-secondary">No Role</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>

                        <td class="align-middle">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots text-secondary"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-start">
                                    <li>
                                        <a href="<?php echo e(url(route('users.edit', $user->id))); ?>" class="dropdown-item"
                                            wire:navigate.hover>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <button
                                            @click="toggleUserStatus(<?php echo e($user->id); ?>, <?php echo e($user->deactivated); ?>)"
                                            class="dropdown-item">
                                            <?php echo e($user->deactivated ? 'Activate' : 'Deactivate'); ?>

                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            <i class="bi bi-person-x"></i> No users found. Try adjusting your search or filters.
                        </td>
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/manage-users.blade.php ENDPATH**/ ?>