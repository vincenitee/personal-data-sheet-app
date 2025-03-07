<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Other Information']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Other Information']); ?>
    
    <?php
        $maxRows = max(count($skills), count($recognitions), count($organizations));
    ?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle ps-3">Skills and Hobbies</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">Non-Academic Distinctions/Recognitions</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">Membership in Association/Organization</th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php for($i = 0; $i < $maxRows; $i++): ?>
                    <tr>
                        <td class="align-middle text-muted fw-semibold">
                            <!--[if BLOCK]><![endif]--><?php if(isset($skills[$i])): ?>
                                <?php echo e($skills[$i]->skill); ?>

                            <?php else: ?>
                                &nbsp;
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-muted fw-semibold">
                            <!--[if BLOCK]><![endif]--><?php if(isset($recognitions[$i])): ?>
                                <?php echo e($recognitions[$i]->recognition); ?>

                            <?php else: ?>
                                &nbsp;
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle text-muted fw-semibold">
                            <!--[if BLOCK]><![endif]--><?php if(isset($organizations[$i])): ?>
                                <?php echo e($organizations[$i]->organization); ?>

                            <?php else: ?>
                                &nbsp;
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                    </tr>
                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'other_information'
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2202222352-0', $__slots ?? [], get_defined_vars());

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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/other-information.blade.php ENDPATH**/ ?>