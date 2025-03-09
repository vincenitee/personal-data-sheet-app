
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

        
        <!--[if BLOCK]><![endif]--><?php if(!empty($entry['certificate']) && Storage::disk('public')->exists($entry['certificate'])): ?>
            <?php
                $filePath = Storage::url($entry['certificate']);
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                $isImage = in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                $fileName = basename($entry['certificate']);
            ?>

            <div class="card shadow-sm mt-3">
                <div class="card-header bg-light">
                    <h6 class="mb-0">
                        <i class="bi bi-file-earmark me-2"></i>Certificate Document
                    </h6>
                </div>
                <div class="card-body">
                    
                    <div class="d-flex justify-content-center align-items-center">
                        <?php echo $__env->make('partials.loading', ['target' => "trainings.<?php echo e($index); ?>.certificate", 'message' => 'Uploading document'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div wire:loading wire:target="trainings.<?php echo e($index); ?>.certificate"
                            class="text-center mb-3">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Uploading file...</p>
                        </div>
                    </div>

                    
                    <div wire:loading.remove wire:target="trainings.<?php echo e($index); ?>.certificate">
                        <!--[if BLOCK]><![endif]--><?php if($isImage): ?>
                            <div class="text-center mb-3">
                                <img src="<?php echo e($filePath); ?>" alt="Certificate Preview" class="img-fluid rounded"
                                    style="max-width: 300px; max-height: 300px; object-fit: contain;">
                            </div>
                        <?php else: ?>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-file-earmark-text fs-2 me-3 text-secondary"></i>
                                <div>
                                    <h6 class="mb-1"><?php echo e($fileName); ?></h6>
                                    <small class="text-muted text-uppercase"><?php echo e(strtoupper($fileExtension)); ?>

                                        File</small>
                                </div>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="bi bi-paperclip me-1"></i>Uploaded Certificate
                            </span>
                            
                            <a href="<?php echo e($filePath); ?>" download="<?php echo e($fileName); ?>"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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