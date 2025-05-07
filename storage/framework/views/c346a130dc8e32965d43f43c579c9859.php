<?php if (isset($component)) { $__componentOriginal88210b161ac9da424ac08c0f17c4d197 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88210b161ac9da424ac08c0f17c4d197 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard-card','data' => ['count' => $approvedPdsSubmissionsCount,'changePercentage' => $percentageApproved,'title' => 'Approved Entries','changeLabel' => 'out of total submissions','iconClass' => 'bi-patch-check-fill','colorClass' => 'success','capacityLabel' => 'Approval Progress','href' => $link]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($approvedPdsSubmissionsCount),'changePercentage' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($percentageApproved),'title' => 'Approved Entries','changeLabel' => 'out of total submissions','iconClass' => 'bi-patch-check-fill','colorClass' => 'success','capacityLabel' => 'Approval Progress','href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($link)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88210b161ac9da424ac08c0f17c4d197)): ?>
<?php $attributes = $__attributesOriginal88210b161ac9da424ac08c0f17c4d197; ?>
<?php unset($__attributesOriginal88210b161ac9da424ac08c0f17c4d197); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88210b161ac9da424ac08c0f17c4d197)): ?>
<?php $component = $__componentOriginal88210b161ac9da424ac08c0f17c4d197; ?>
<?php unset($__componentOriginal88210b161ac9da424ac08c0f17c4d197); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/dashboard/approved-pds-entries.blade.php ENDPATH**/ ?>