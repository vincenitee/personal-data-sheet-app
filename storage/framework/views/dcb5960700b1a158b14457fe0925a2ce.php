<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Additional Questions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Additional Questions']); ?>
    
    <div class="table-responsive">
        <table class="table table-bordered mb-3" style="font-size: 14px; width: 100%;">
            <thead class="bg-light">
                <tr>
                    <th style="width: 3%;">#</th>
                    <th style="width: 47%;">Question</th>
                    <th style="width: 5%;">Yes</th>
                    <th style="width: 5%;">No</th>
                    <th style="width: 35%;">Details</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td rowspan="3">34</td>
                    <td>Are you related by consanguinity or affinity to the appointing or recommending authority, or to
                        the chief of bureau or office or to the person who has immediate supervision over you in the
                        Office, Bureau or Department where you will be apppointed,</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>a. within third degree?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_third_degree_relative" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_third_degree_relative" type="radio" value="0" class="form-check">
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>b. within the fourth degree (for Local Government Unit - Career Employees)?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_fourth_degree_relative" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_fourth_degree_relative" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($fourth_degree_relative)): ?>
                            <?php echo e($fourth_degree_relative); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                
                <tr>
                    <td rowspan="2">35</td>
                    <td>a. Have you ever been found guilty of any administrative offense? </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_admin_case" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_admin_case" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($admin_case_details)): ?>
                            <?php echo e($admin_case_details); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>
                <tr>
                    <td>b. Have you been criminally charged before any court?
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_charge" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_charge" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle p-3">
                        <div class="d-flex flex-column">
                            <div class="mb-1">
                                <!--[if BLOCK]><![endif]--><?php if(!empty($criminal_charge_date)): ?>
                                    <span class="text-muted small">Charge Date:</span>
                                    <span class="ms-1 fw-semibold">
                                        <?php echo e(\Carbon\Carbon::parse($criminal_charge_date)->format('m/d/Y')); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-warning">
                                        No additional details provided
                                    </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div>
                                <!--[if BLOCK]><![endif]--><?php if(!empty($criminal_charge_status)): ?>
                                    <span class="badge bg-secondary">
                                        <?php echo e(ucwords(str_replace('_', ' ', $criminal_charge_status))); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-warning">
                                        No additional details provided
                                    </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </td>
                </tr>

                
                <tr>
                    <td>36</td>
                    <td>Have you ever been convicted of any crime or violation of any law, decree, ordinance or
                        regulation by any court or tribunal?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_conviction" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_conviction" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($criminal_conviction_details)): ?>
                            <?php echo e($criminal_conviction_details); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                
                <tr>
                    <td>37</td>
                    <td>Have you ever been separated from the service in any of the following modes: resignation,
                        retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or
                        phased out (abolition) in the public or private sector?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_separation_from_service" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_separation_from_service" type="radio" value="0"
                            class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($separation_details)): ?>
                            <?php echo e($separation_details); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                
                <tr>
                    <td rowspan="2">38</td>
                    <td>a. Have you ever been a candidate in a national or local election held within the last year
                        (except Barangay election)?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_election_candidate" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_election_candidate" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($election_details)): ?>
                            <?php echo e($election_details); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                <tr>
                    <td>b. Have you resigned from the government service during the three (3)-month period before the
                        last election to promote/actively campaign for a national or local candidate?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_resigned_for_election" type="radio" value="1"
                            class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_resigned_for_election" type="radio" value="0"
                            class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($resignation_details)): ?>
                            <?php echo e($resignation_details); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                
                <tr>
                    <td>39</td>
                    <td>Have you acquired the status of an immigrant or permanent resident of another country?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_immigrant" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_immigrant" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($immigrant_country)): ?>
                            <?php echo e($immigrant_country); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                
                <tr>
                    <td rowspan="4">40</td>
                    <td>Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA
                        7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td>a. Are you a member of any indigenous group?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_indigenous" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_indigenous" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($indigenous_details)): ?>
                            <?php echo e($indigenous_details); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                <tr>
                    <td>b. Are you a person with disability?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_disabled" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_disabled" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($disabled_person_id)): ?>
                            <?php echo e($disabled_person_id); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>

                <tr>
                    <td>c. Are you a solo parent?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_solo_parent" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_solo_parent" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($solo_parent_id)): ?>
                            <?php echo e($solo_parent_id); ?>

                        <?php else: ?>
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>
            </tbody>
        </table>

        <h6>41. REFERENCES</h6>
        <table class="table table-hover table-bordered" style="font-size: 14px">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Telephone No</th>
                </tr>
            </thead>

            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $questionResponses->referencePersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($person->fullname)): ?>
                                <?php echo e($person->fullname); ?>

                            <?php else: ?>
                                <span class="badge bg-warning">
                                    No additional details provided
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($person->address)): ?>
                                <?php echo e($person->address); ?>

                            <?php else: ?>
                                <span class="badge bg-warning">
                                    No additional details provided
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                        <td class="align-middle">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($person->telephone_no)): ?>
                                <?php echo e($person->telephone_no); ?>

                            <?php else: ?>
                                <span class="badge bg-warning">
                                    No additional details provided
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3">No details provided</td>
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
        'pdsSection' => 'additional_questions',
    ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-4141891175-0', $__slots ?? [], get_defined_vars());

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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/questionnaire.blade.php ENDPATH**/ ?>