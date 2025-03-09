<div class="card card-body">
    
    <div class="d-flex align-items-center border-bottom justify-content-between mb-3">
        <div class="d-flex justify-content-center flex-column">
            <h4 class="fw-bold mb-0">PDS Entry Review Form</h4>
            <p class="text-muted">
                <small>
                    Submitted by:
                    <strong>
                        <?php echo e($entry->personalInformation?->first_name); ?>

                        <?php echo e($entry->personalInformation?->middle_name); ?>

                        <?php echo e($entry->personalInformation?->last_name); ?>

                    </strong>
                    on <strong><?php echo e($entry->created_at->format('F d, Y')); ?></strong>
                </small>
            </p>
        </div>
    </div>

    

    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.personal-information', [
        'submissionId' => $submission->id,
        'personalInfo' => $entry->personalInformation,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    

    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.family-background', [
        'submissionId' => $submission->id,
        'spouse' => $entry->spouse,
        'parents' => $entry->parents,
        'children' => $entry->children,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.educational-background', [
        'submissionId' => $submission->id,
        'educationalBackgrounds' => $entry->educationalBackgrounds,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.civil-service', [
        'submissionId' => $submission->id,
        'eligibilities' => $entry->eligibilities,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.work-experience', [
        'submissionId' => $submission->id,
        'workExperiences' => $entry->workExperiences,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.voluntary-work', [
        'submissionId' => $submission->id,
        'volWorkExperiences' => $entry->volWorkExperiences,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.trainings', [
        'submissionId' => $submission->id,
        'trainings' => $entry->trainings,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-6', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.other-information', [
        'submissionId' => $submission->id,
        'skills' => $entry->skills,
        'recognitions' => $entry->recognitions,
        'organizations' => $entry->organizations,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.questionnaire', [
        'submissionId' => $submission->id,
        'questionResponses' => $entry->question,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.attachments', [
        'submissionId' => $submission->id,
        'attachment' => $entry?->attachment,
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <div class="d-flex align-items-center justify-content-end gap-2 mt-4">
        <?php if (isset($component)) { $__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button','data' => ['class' => 'btn-sm btn-danger','dataBsToggle' => 'modal','dataBsTarget' => '#remarksModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-sm btn-danger','data-bs-toggle' => 'modal','data-bs-target' => '#remarksModal']); ?>
            <i class="bi bi-arrow-return-left"></i>
            Return for revisions
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

        <?php if (isset($component)) { $__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button','data' => ['@click' => 'confirmEntryApproval('.e($entry->id).')','class' => 'btn-sm btn-success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'confirmEntryApproval('.e($entry->id).')','class' => 'btn-sm btn-success']); ?>
            <i class="bi bi-check-circle"></i>
            Approve Entry
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


    
    <div class="modal fade" id="remarksModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title">
                        <i class="bi bi-arrow-return-left me-2"></i>
                        Return Submission for Revisions
                    </h6>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Please provide an overall feedback about the required revisions:</p>

                    <div class="mb-3">
                        <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['name' => 'remarks','label' => '','required' => false,'model' => 'remarks']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'remarks','label' => '','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'model' => 'remarks']); ?> <?php echo $__env->renderComponent(); ?>
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

                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle me-2"></i>
                        <div>
                            <small>Your feedback will be sent to the submitter along with the notification that
                                revisions are required.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if (isset($component)) { $__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button','data' => ['type' => 'button','class' => 'btn-sm btn-secondary','dataBsDismiss' => 'modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'btn-sm btn-secondary','data-bs-dismiss' => 'modal']); ?>
                        Cancel
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
                    <?php if (isset($component)) { $__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button','data' => ['type' => 'button','class' => 'btn-sm btn-danger','wire:click' => 'submitForRevisions()','wire:loading.attr' => 'disabled','wire:target' => 'submitForRevisions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'btn-sm btn-danger','wire:click' => 'submitForRevisions()','wire:loading.attr' => 'disabled','wire:target' => 'submitForRevisions']); ?>
                        <span wire:loading wire:target="submitForRevisions">
                            <span class="spinner-border spinner-border-sm me-1" role="status"
                                aria-hidden="true"></span>
                        </span>
                        Submit Revision Request
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
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/pds-review-form.blade.php ENDPATH**/ ?>