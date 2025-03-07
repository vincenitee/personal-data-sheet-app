<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Learning and Development']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Learning and Development']); ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle ps-3"
                        rowspan="2">Title of Learning and Development Interventions/Training Programs</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        colspan="2">Inclusive Date of Attendance</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Number of Hours</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Training Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Conducted/Sponsored By</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Certificate</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">From</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">To</th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($training->title)): ?>
                                <?php echo e($training->title); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($training->date_from)): ?>
                                <?php echo e($training->date_from->format('m/d/Y')); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($training->date_to)): ?>
                                <?php echo e($training->date_to->format('m/d/Y')); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($training->total_hours)): ?>
                                <?php echo e($training->total_hours); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($training->type)): ?>
                                <?php echo e(ucwords($training->type)); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($training->sponsored_by)): ?>
                                <?php echo e($training->sponsored_by); ?>

                            <?php else: ?>
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-center">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($training->certificate)): ?>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="<?php echo e(Storage::url($training->certificate)); ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary rounded-2 d-flex align-items-center">
                                        <i class="bi bi-eye me-1"></i> View
                                    </a>

                                    <div class="certificate-thumbnail position-relative"
                                        style="width: 54px; height: 54px;">
                                        <img src="<?php echo e(asset('storage/' . $training->certificate)); ?>"
                                            alt="Training Certificate" class="img-thumbnail rounded-2 object-fit-cover"
                                            style="width: 54px; height: 54px; cursor: pointer;" data-bs-toggle="modal"
                                            data-bs-target="#certificateModal<?php echo e($training->id); ?>">

                                        <!--[if BLOCK]><![endif]--><?php if(pathinfo($training->certificate, PATHINFO_EXTENSION)): ?>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge bg-secondary rounded-pill"
                                                style="font-size: 0.6rem;">
                                                <?php echo e(strtoupper(pathinfo($training->certificate, PATHINFO_EXTENSION))); ?>

                                            </span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <!-- Modal for Full Image -->
                                <div class="modal fade" id="certificateModal<?php echo e($training->id); ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Certificate</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="<?php echo e(asset('storage/' . $training->certificate)); ?>"
                                                    alt="Full Certificate" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <span class="badge bg-light text-muted rounded-2 py-1 px-2">
                                    No Certificate
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No training records provided
                        </td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'learning_and_development'
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3143814274-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/trainings.blade.php ENDPATH**/ ?>