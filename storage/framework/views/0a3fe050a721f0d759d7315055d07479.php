<div class="card card-body" x-data="{ openCard: null }">
    
    <div class="d-flex align-items-center border-bottom justify-content-between mb-3">

        <div class="d-flex align-items-center gap-3 p-2">
            <img src="<?php echo e(asset(($pdsEntry->attachment?->passport_photo ?? 'passport_photos/default.png'))); ?>" alt=""
                class="img-fluid rounded shadow-sm" style="width: 60px; heigth: 60px; object-fit: cover">
            <div class="d-flex justify-content-center flex-column">
                <h4 class="fw-bold mb-0">PDS Entry Review Form</h4>
                <p class="text-muted mb-0">
                    <small>
                        Submitted by:
                        <strong>
                            <?php echo e($pdsEntry->personalInformation?->first_name); ?>

                            <?php echo e($pdsEntry->personalInformation?->middle_name); ?>

                            <?php echo e($pdsEntry->personalInformation?->last_name); ?>

                        </strong>
                        on <strong>
                            <!--[if BLOCK]><![endif]--><?php if($pdsEntry->status === 'approved'): ?>
                                <?php echo e($pdsEntry->updated_at->format('F d, Y')); ?>

                            <?php else: ?>
                                <?php echo e($pdsEntry->created_at->format('F d, Y')); ?>

                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </strong>
                    </small>
                </p>
            </div>
        </div>


        <?php
            $status = $pdsEntry->status;
            $statusColor = match ($pdsEntry->status) {
                'approved' => 'success',
                'under_review' => 'warning',
                'needs_revision' => 'danger',
                'draft' => 'secondary',
                default => 'light',
            };
        ?>
        <span class="badge bg-<?php echo e($statusColor); ?>"><?php echo e(ucwords(str_replace('_', ' ', $status))); ?></span>


    </div>

    

    <div x-data="{ openCard: null }">
        
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.steps.personal-information', [
            'submissionId' => $submission->id,
            'personalInfo' => $pdsEntry->personalInformation,
            'openCard' => 'personal-information',
            'entryStatus' => $pdsEntry->status,
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
            'spouse' => $pdsEntry->spouse,
            'parents' => $pdsEntry->parents,
            'children' => $pdsEntry->children,
            'openCard' => 'family-background',
            'entryStatus' => $pdsEntry->status,
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
            'educationalBackgrounds' => $pdsEntry->educationalBackgrounds,
            'openCard' => 'educational-background',
            'entryStatus' => $pdsEntry->status,
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
            'eligibilities' => $pdsEntry->eligibilities,
            'openCard' => 'civil-service',
            'entryStatus' => $pdsEntry->status,
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
            'workExperiences' => $pdsEntry->workExperiences,
            'openCard' => 'work-experience',
            'entryStatus' => $pdsEntry->status,
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
            'volWorkExperiences' => $pdsEntry->volWorkExperiences,
            'openCard' => 'voluntary-work',
            'entryStatus' => $pdsEntry->status,
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
            'trainings' => $pdsEntry->trainings,
            'openCard' => 'trainings',
            'entryStatus' => $pdsEntry->status,
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
            'skills' => $pdsEntry->skills,
            'recognitions' => $pdsEntry->recognitions,
            'organizations' => $pdsEntry->organizations,
            'openCard' => 'other-information',
            'entryStatus' => $pdsEntry->status,
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
            'questionResponses' => $pdsEntry->question,
            'openCard' => 'questionnaire',
            'entryStatus' => $pdsEntry->status,
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
            'attachmentId' => $pdsEntry?->attachment->id ?? null,
            'openCard' => 'attachments',
            'entryStatus' => $pdsEntry->status,
        ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1539966209-9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>


    <div class="d-flex align-items-center justify-content-end gap-2 mt-4">
        <!--[if BLOCK]><![endif]--><?php if(!in_array($pdsEntry->status, ['approved', 'needs_revision'])): ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button','data' => ['@click' => 'confirmEntryApproval('.e($pdsEntry->id).')','class' => 'btn-sm btn-success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'confirmEntryApproval('.e($pdsEntry->id).')','class' => 'btn-sm btn-success']); ?>
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
        <?php elseif($pdsEntry->status === 'approved'): ?>
            <?php if (isset($component)) { $__componentOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48c3958713aa2b1d2dd1900fbfcfc804 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.button','data' => ['@click' => 'confirmRevertEntry('.e($pdsEntry->id).')','class' => 'btn-sm btn-warning text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['@click' => 'confirmRevertEntry('.e($pdsEntry->id).')','class' => 'btn-sm btn-warning text-white']); ?>
                <i class="bi bi-arrow-counterclockwise"></i>
                Revert to Under Review
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
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>



    
    <div class="modal fade" id="remarksModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <!-- Header with more visual appeal -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-arrow-return-left me-2"></i>
                        Request Revisions
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body with improved messaging and structure -->
                <div class="modal-body p-4">
                    <p class="fw-medium mb-3">What changes are needed before this submission can be approved?</p>

                    <div class="mb-4">
                        <label for="revision-feedback" class="form-label text-secondary mb-2">Be specific about what
                            needs to be corrected or improved</label>
                        <textarea id="revision-feedback" name="remarks" class="form-control"
                            placeholder="Example: Please review sections 2 and 3, add more supporting data, and fix formatting issues in the tables..."
                            rows="5" wire:model="remarks"></textarea>
                    </div>

                    <div class="alert alert-info d-flex p-3 rounded-3 bg-light-subtle border-info">
                        <i class="bi bi-info-circle text-info fs-5 me-3 mt-1"></i>
                        <div>
                            <strong>Note:</strong> This feedback will be sent directly to the submitter. Clear,
                            constructive feedback helps ensure revisions meet expectations the first time.
                        </div>
                    </div>
                </div>

                <!-- Footer with improved button styling and layout -->
                <div class="modal-footer border-top-0 pt-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger px-4 d-flex align-items-center"
                        wire:click="submitForRevisions()" wire:loading.attr="disabled" wire:target="submitForRevisions">
                        <span wire:loading wire:target="submitForRevisions">
                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                aria-hidden="true"></span>
                        </span>
                        Request Revisions
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/pds-review-form.blade.php ENDPATH**/ ?>