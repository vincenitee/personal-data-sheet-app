<div class="card card-body">
    <div class="row">
        
        <div class="col-md-3 p-3 border-end">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.filter-options');

$__html = app('livewire')->mount($__name, $__params, 'lw-207055290-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        
        <div class="col-md-9 p-3">
            <h6 class="mb-3">Report Configuration</h6>
            <div class="d-flex flex-column gap-2 mb-3">
                <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['name' => 'reportName','label' => 'Report Title','placeholder' => 'Enter report title']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'reportName','label' => 'Report Title','placeholder' => 'Enter report title']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal7041cc63efd62f0450fe4bb37aadf484 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7041cc63efd62f0450fe4bb37aadf484 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.select','data' => ['name' => 'reportType','label' => 'Output Format','placeholder' => 'Choose a format']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'reportType','label' => 'Output Format','placeholder' => 'Choose a format']); ?>
                    <option value="pdf" selected>PDF Document</option>
                    <option disabled>More formats coming soon...</option>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7041cc63efd62f0450fe4bb37aadf484)): ?>
<?php $attributes = $__attributesOriginal7041cc63efd62f0450fe4bb37aadf484; ?>
<?php unset($__attributesOriginal7041cc63efd62f0450fe4bb37aadf484); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7041cc63efd62f0450fe4bb37aadf484)): ?>
<?php $component = $__componentOriginal7041cc63efd62f0450fe4bb37aadf484; ?>
<?php unset($__componentOriginal7041cc63efd62f0450fe4bb37aadf484); ?>
<?php endif; ?>
            </div>

            <div class="d-flex justify-content-end align-items-center gap-2">
                <button type="button" class="btn btn-sm btn-success">
                    <i class="bi bi-download"></i>
                    Export Report
                </button>
                <button type="button" class="btn btn-sm btn-primary">
                    <i class="bi bi-printer"></i>
                    Print Report
                </button>
            </div>

            <h6 class="mb-3">Report Preview</h6>
            <div class="table-responsive">
                <table class="table table-hover table-striped" style="font-size: 0.875rem;">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Name</th>
                            <th class="text-nowrap">Job Position</th>
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">Highest Educational Attainment</th>
                            <th class="text-nowrap">Employment Type</th>
                            <th class="text-nowrap">Years in Service</th>
                            <th class="text-nowrap">Eligibility</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($employee['name']); ?></td>
                                <td><?php echo e($employee['job_position']); ?></td>
                                <td><?php echo e($employee['department']); ?></td>
                                <td><?php echo e($employee['education']); ?></td>
                                <td><?php echo e($employee['employment_type']); ?></td>
                                <td><?php echo e($employee['years_in_service']); ?></td>
                                <td><?php echo e($employee['eligibility']); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>


                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/generate-report.blade.php ENDPATH**/ ?>