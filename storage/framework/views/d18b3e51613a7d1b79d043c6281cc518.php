<div class="comment-section bg-white shadow-sm border-0 rounded-4 overflow-hidden" style="font-size: 0.875rem">
    <div class="comment-header d-flex flex-wrap justify-content-between align-items-center p-3 border-bottom bg-light">
        <h6 class="mb-0 text-primary d-flex align-items-center gap-2">
            <i class="bi bi-chat-left-text"></i>
            Comments
        </h6>
        <span class="badge bg-secondary mt-2 mt-sm-0">
            <?php echo e(count($comments)); ?> <?php echo e(Str::plural('comment', count($comments))); ?>

        </span>
    </div>

    <!-- Existing Comments -->
    <div class="comments-list px-2 px-sm-3 py-2 overflow-auto" style="max-height: 400px">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="comment-item border-bottom py-3">
                <!-- Comment Header Section -->
                <div class="d-flex flex-column flex-sm-row justify-content-between gap-2 mb-2">
                    <!-- User Info -->
                    <div class="d-flex align-items-center gap-2">
                        <div class="user-avatar rounded-circle bg-primary-soft text-primary d-flex align-items-center justify-content-center"
                            style="min-width: 32px; height: 32px">
                            <?php echo e(Str::substr($comment->admin->first_name, 0, 1)); ?>

                        </div>
                        <div class="text-break">
                            <h6 class="mb-0 text-dark d-flex flex-wrap align-items-center gap-2">
                                <span class="text-truncate"><?php echo e($comment->admin->first_name); ?></span>
                                <?php
                                    $role = $comment->admin->getRoleNames()->first();

                                    $roleColor = match ($role) {
                                        'admin' => 'danger',
                                        'employee' => 'primary',
                                        default => 'secondary',
                                    };
                                ?>
                                <span
                                    class="badge bg-<?php echo e($roleColor); ?>-soft text-<?php echo e($roleColor); ?> rounded-pill px-2 py-1"
                                    style="font-size: 0.675rem">
                                    <?php echo e(ucwords($role)); ?>

                                </span>
                            </h6>
                        </div>
                    </div>

                    <!-- Timestamp and Delete Button -->
                    <div class="d-flex align-items-center gap-2">
                        <small class="text-muted text-nowrap"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                        <!--[if BLOCK]><![endif]--><?php if($comment->admin_id === auth()->id()): ?>
                            <button wire:click="deleteComment(<?php echo e($comment->id); ?>)"
                                wire:confirm="Are you sure you want to delete this comment?"
                                class="btn btn-sm btn-outline-danger border-0" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Delete comment">
                                <i class="bi bi-trash"></i>
                            </button>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                <!-- Comment Content -->
                <p class="text-dark-emphasis mb-0 ps-2 ps-sm-5 text-break">
                    <?php echo e($comment->comment); ?>

                </p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center text-muted py-4">
                <i class="bi bi-chat-dots opacity-50 mb-2 d-block" style="font-size: 2rem"></i>
                <p class="mb-0">No comments yet.</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- New Comment Section -->
    <div class="new-comment-section bg-light p-2 p-sm-3 border-top">
        <h6 class="mb-2 mb-sm-3 text-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-circle"></i>
            Add a Comment
        </h6>
        <div class="mb-2 mb-sm-3">
            <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['label' => '','name' => 'comment','model' => 'comment','placeholder' => 'Write your comment here...','class' => 'form-control rounded-3','rows' => '3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => '','name' => 'comment','model' => 'comment','placeholder' => 'Write your comment here...','class' => 'form-control rounded-3','rows' => '3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5)): ?>
<?php $attributes = $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5; ?>
<?php unset($__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalea7b7095850fe8bc9657025b89ccf5a5)): ?>
<?php $component = $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5; ?>
<?php unset($__componentOriginalea7b7095850fe8bc9657025b89ccf5a5); ?>
<?php endif; ?>
        </div>
        <div class="d-flex justify-content-end align-items-center gap-2">
            <?php if (isset($component)) { $__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button','data' => ['wire:click' => 'submitComment()','class' => 'btn btn-sm btn-primary d-flex align-items-center gap-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'submitComment()','class' => 'btn btn-sm btn-primary d-flex align-items-center gap-2']); ?>
                <i wire:loading.remove wire:target="submitComment()" class="bi bi-send"></i>
                <div wire:loading wire:target="submitComment()" class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <span class="d-none d-sm-inline">Submit Comment</span>
                <span class="d-inline d-sm-none">Submit</span>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804)): ?>
<?php $attributes = $__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804; ?>
<?php unset($__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804)): ?>
<?php $component = $__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804; ?>
<?php unset($__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804); ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/comments.blade.php ENDPATH**/ ?>