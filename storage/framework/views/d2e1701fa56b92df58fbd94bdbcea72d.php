<div class="container h-100">
    <div class="row h-100">
        <div class="col-lg-4 col-md-11 m-auto">
            <div class="card p-4 card-body shadow">
                <?php if (isset($component)) { $__componentOriginala22641835cdc236e966401327a423643 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala22641835cdc236e966401327a423643 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.form','data' => ['wire:submit' => 'sendResetLink','method' => 'POST']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:submit' => 'sendResetLink','method' => 'POST']); ?>
                    <!--[if BLOCK]><![endif]--><?php if(session('status')): ?>
                        <?php if (isset($component)) { $__componentOriginalbb0843bd48625210e6e530f88101357e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbb0843bd48625210e6e530f88101357e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flash-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbb0843bd48625210e6e530f88101357e)): ?>
<?php $attributes = $__attributesOriginalbb0843bd48625210e6e530f88101357e; ?>
<?php unset($__attributesOriginalbb0843bd48625210e6e530f88101357e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbb0843bd48625210e6e530f88101357e)): ?>
<?php $component = $__componentOriginalbb0843bd48625210e6e530f88101357e; ?>
<?php unset($__componentOriginalbb0843bd48625210e6e530f88101357e); ?>
<?php endif; ?>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    
                    <div class="d-flex flex-column gap-1 align-items-center mb-2">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($logoPath) && Str::startsWith($logoPath, 'http')): ?>
                            <img src="<?php echo e($logoPath); ?>" alt="Logo" id="logo"
                                class="img-fluid mb-2 shadow-sm rounded-circle border"
                                style="height: 85px; width: 85px; object-fit: cover;">
                        <?php elseif(!empty($logoPath) && Storage::disk('public')->exists($logoPath)): ?>
                            <img src="<?php echo e(Storage::url($logoPath)); ?>" alt="Logo" id="logo"
                                class="img-fluid mb-2 shadow-sm rounded-circle border"
                                style="height: 85px; width: 85px; object-fit: cover;">
                        <?php else: ?>
                            <img src="<?php echo e(Vite::asset('resources/images/hris-logo-white.png')); ?>" alt="Default Logo"
                                id="logo" style="height: 85px; width: 85px; object-fit: cover;">
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <div class="d-flex flex-column align-items-center mb-3">
                            <h3 class="text-centerfw-bold">Forgot your password?</h3>
                            <span class="text-center text-muted mx-auto" style="font-size: 0.9rem">No problem. Just let
                                us know your email address and we will email you a password reset link that will allow
                                you to choose a new one.</span>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['model' => 'email','icon' => 'bi bi-envelope','name' => 'email','label' => '','required' => false,'placeholder' => 'Email Address']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'email','icon' => 'bi bi-envelope','name' => 'email','label' => '','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'placeholder' => 'Email Address']); ?>
<?php echo $__env->renderComponent(); ?>
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

                    <button class="btn btn-<?php echo e($sidebarColor ?? 'dark'); ?> w-100">
                        Send password reset link
                        <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading>
                            <span class="sr-only"></span>
                        </div>
                    </button>

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
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/auth/forgot-password.blade.php ENDPATH**/ ?>