<div class="row g-2">
    
    <!--[if BLOCK]><![endif]--><?php if(!isset($nextUpdateAllowedAt)): ?>
        <div class="col-lg-3">
            <?php echo $__env->make('livewire.employee.pds.form-sections', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        
        <div class="col-lg-9">
            <?php if (isset($component)) { $__componentOriginala22641835cdc236e966401327a423643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala22641835cdc236e966401327a423643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.form','data' => ['wire:submit' => 'save','method' => 'POST']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:submit' => 'save','method' => 'POST']); ?>
                
                <?php echo $__env->make('livewire.employee.pds.form-title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php echo $__env->make("livewire.employee.pds.steps.step-{$currentStep}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php echo $__env->make('livewire.employee.pds.form-navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala22641835cdc236e966401327a423643)): ?>
<?php $attributes = $__attributesOriginala22641835cdc236e966401327a423643; ?>
<?php unset($__attributesOriginala22641835cdc236e966401327a423643); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala22641835cdc236e966401327a423643)): ?>
<?php $component = $__componentOriginala22641835cdc236e966401327a423643; ?>
<?php unset($__componentOriginala22641835cdc236e966401327a423643); ?>
<?php endif; ?>
        </div>
    <?php else: ?>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success bg-opacity-10 border-success border-opacity-25 d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <h5 class="card-title mb-0">Entry Approved</h5>
            </div>
            <div class="card-body p-3">
                <div class="d-flex flex-column flex-md-row">
                    <div class="d-flex align-items-start me-md-4 mb-3 mb-md-0">
                        <div class="me-3">
                            <i class="bi bi-calendar-event text-info fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-1">Next Update Available</h6>
                            <p class="card-text mb-0">
                                <span class="fw-semibold"><?php echo e($nextUpdateAllowedAt->format('F j, Y - g:i A')); ?></span>
                            </p>
                            <small class="text-muted">
                                <i class="bi bi-info-circle-fill me-1"></i>
                                You can update your PDS entry again after this date and time.
                            </small>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-start align-items-md-end ms-md-auto mt-3 mt-md-0">
                        <p class="text-success mb-2"><i class="bi bi-clipboard-check me-1"></i>Your PDS entry has been
                            approved</p>
                        <div class="d-flex flex-column btn-lg-group gap-2 align-self-center w-100">
                            <a href="<?php echo e(url(route('print'))); ?>" class="btn btn-sm btn-primary w-100">
                                <i class="bi bi-printer me-1"></i>Print PDS
                            </a>
                            <a href="<?php echo e(url(route('print'))); ?>"
                                class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-download me-1"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/create.blade.php ENDPATH**/ ?>