
<div class="d-flex flex-column gap-3">
    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Skills','icon' => 'bi-lightbulb','loadingTarget' => 'addSkillEntry()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Skills','icon' => 'bi-lightbulb','loadingTarget' => 'addSkillEntry()']); ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('partials.form-fields', [
                'modelPrefix' => "skills.$index",
                'fields' => [
                    [
                        'label' => 'Skill',
                        'required' => 'false',
                    ],
                ],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-12 text-end">
                <button
                    type="button"
                    @click="confirmDelete('skills', <?php echo e($index); ?>)"
                    class="btn btn-outline-danger btn-sm" <?php if(count($skills) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        <?php $__env->slot('footer'); ?>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" wire:click="removeAllSkillEntry()" class="btn btn-outline-danger btn-sm"
                    <?php if(count($skills) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addSkillEntry()" class="btn btn-primary btn-sm">
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

    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Non-Academic Recognitions','icon' => 'bi-patch-check','loadingTarget' => 'addRecognitionEntry()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Non-Academic Recognitions','icon' => 'bi-patch-check','loadingTarget' => 'addRecognitionEntry()']); ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $recognitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('partials.form-fields', [
                'modelPrefix' => "recognitions.$index",
                'fields' => [
                    [
                        'label' => 'Recognition',
                        'required' => 'false',
                    ],
                ],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-12 text-end">
                <button
                    type="button"
                    @click="confirmDelete('recognitions', <?php echo e($index); ?>)"
                    class="btn btn-outline-danger btn-sm" <?php if(count($recognitions) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        <?php $__env->slot('footer'); ?>
            <div class="d-flex justify-content-between align-items-center">
                <button
                    type="button" wire:click="removeAllRecognitionEntry()" class="btn btn-outline-danger btn-sm"
                    <?php if(count($recognitions) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addRecognitionEntry()" class="btn btn-primary btn-sm">
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

    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Organizations','icon' => 'bi-building','loadingTarget' => 'addOrganizationEntry()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Organizations','icon' => 'bi-building','loadingTarget' => 'addOrganizationEntry()']); ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('partials.form-fields', [
                'modelPrefix' => "organizations.$index",
                'fields' => [
                    [
                        'label' => 'Organization',
                        'required' => 'false',
                    ],
                ],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-12 text-end">
                <button
                    type="button"
                    @click="confirmDelete('organizations', <?php echo e($index); ?>)"
                    class="btn btn-outline-danger btn-sm" <?php if(count($organizations) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        <?php $__env->slot('footer'); ?>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" wire:click="removeAllOrganizationEntry()" class="btn btn-outline-danger btn-sm"
                    <?php if(count($organizations) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addOrganizationEntry()" class="btn btn-primary btn-sm">
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
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        console.log('i am added everytime i am loaded')
        function confirmDelete(type, index){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.isConfirmed){
                    Livewire.dispatch('removeEntry', {type: type, index: index})
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/steps/step-8.blade.php ENDPATH**/ ?>