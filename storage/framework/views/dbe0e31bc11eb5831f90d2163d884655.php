
<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Learning and Development','icon' => 'bi-mortarboard','loadingTarget' => 'addTrainingEntry()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Learning and Development','icon' => 'bi-mortarboard','loadingTarget' => 'addTrainingEntry()']); ?>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.form-fields', [
            'modelPrefix' => "trainings.$index",
            'fields' => [
                [
                    'label' => 'Title',
                    'required' => false,
                ],
                [
                    'label' => 'Type',
                    'type' => 'select',
                    'options' => $trainingOptions, // Ensure this is passed correctly from the Livewire component
                    'required' => false,
                ],
                [
                    'label' => 'Sponsored By',
                    'required' => false,
                ],
                [
                    'label' => 'Date From',
                    'type' => 'date',
                    'required' => false,
                ],
                [
                    'label' => 'Date To',
                    'type' => 'date',
                    'required' => false,
                ],
                [
                    'label' => 'Total Hours',
                    'type' => 'number',
                    'required' => false,
                ],
                [
                    'label' => 'Certificate',
                    'type' => 'file',
                    'required' => false,
                ],
            ],
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <!--[if BLOCK]><![endif]--><?php if(!empty($entry['certificate_path'])): ?>
            <!-- Debug info -->
            <div class="alert alert-info">
                Path stored: <?php echo e($entry['certificate_path']); ?><br>
                Full URL: <?php echo e(Storage::url($entry['certificate_path'])); ?>

            </div>

            <?php echo $__env->make('partials.file-preview', [
                'file' => $entry['certificate_path'],
                'title' => 'Certificate Document',
                'wireTarget' => "trainings.{$index}.certificate",
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="col-12 text-end">
            <button type="button" @click="confirmDelete('trainings', <?php echo e($index); ?>)"
                class="btn btn-outline-danger btn-sm" <?php if(count($trainings) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

    <?php $__env->slot('footer'); ?>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllTrainingEntry()" class="btn btn-outline-danger btn-sm"
                <?php if(count($trainings) === 1): ?> disabled <?php endif; ?>>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addTrainingEntry()" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/steps/step-7.blade.php ENDPATH**/ ?>