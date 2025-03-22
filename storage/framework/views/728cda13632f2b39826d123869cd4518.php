<div class="table-responsive m-0">
    <table id="pds-table">
        <tbody class="table-body"></tbody>
        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE
                    / VOLUNTARY ORGANIZATION/S
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-bottom-0">
                    <span class="count float-left">29.</span> NAME & ADDRESS OF
                    ORGANIZATION<br />
                    (Write in full)
                </td>
                <td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES OF ATTENDANCE <br> (mm/dd/yyyy)</td>
                <td colspan="1" class="s-label border-bottom-0">NUMBER OF HOURS</td>
                <td colspan="3" class="s-label border-bottom-0">
                    POSITION / NATURE OF WORK
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label">From</td>
                <td colspan="1" class="s-label">To</td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="3" class="s-label border-top-0"></td>
            </tr>

            <?php
                $volWorkExperiences = $volWorkExperiences->pad(7, (object) []);
            ?>

            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $volWorkExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volWorkExp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="6" class="text-center fw-bold">
                        <?php echo e(optional($volWorkExp)->organization_name ? strtoupper($volWorkExp->getOrgAddressAndNameAttribute()) : ''); ?>

                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        <?php echo e(optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_from)->format('m/d/Y') : ''); ?>

                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        <?php echo e(optional($volWorkExp)->date_from ? \Carbon\Carbon::parse($volWorkExp->date_to)->format('m/d/Y') : ''); ?>

                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        <?php echo e(optional($volWorkExp)->total_hours ? $volWorkExp->total_hours . ' HOURS' : ''); ?>

                    </td>
                    <td colspan="3" class="text-center fw-bold">
                        <?php echo e(strtoupper(optional($volWorkExp)->position ?? '')); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>

        <tbody class="table-body">
            <tr>
                <td class="small-text text-danger text-center s-label" colspan="12">
                    <i>(Continue on separate sheet if necessary)</i>
                </td>
            </tr>
        </tbody>

        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE
                    / VOLUNTARY ORGANIZATION/S<br />
                    <small><i>(Start from the most recent L&D/training program and include
                            only the relevant L&D/training taken for the last five (5) years
                            for Division Chief/Executive/Managerial positions)</i></small>
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-bottom-0">
                    <span class="count float-left">30.</span> TITLE OF LEARNING AND
                    DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br />
                    (Write in full)
                </td>
                <td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES OF ATTENDANCE<br>(mm/dd/yyyy)</td>
                <td colspan="1" class="s-label border-bottom-0" style="width: 15%;">NUMBER OF HOURS</td>
                <td colspan="1" class="s-label border-bottom-0">
                    Type of LD (Managerial/ Supervisory/Technical/etc)
                </td>
                <td colspan="2" class="s-label border-bottom-0 text-nowrap">
                    CONDUCTED/ SPONSORED BY<br />(Write in full)
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="6" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label">From</td>
                <td colspan="1" class="s-label">To</td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="1" class="s-label border-top-0"></td>
                <td colspan="2" class="s-label border-top-0"></td>
            </tr>

            <?php
                $trainings = $trainings->pad(41, (object) []);
            ?>

            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="6" class="text-center fw-bold">
                        <?php echo e(strtoupper(optional($training)->title ?? '')); ?>

                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        <?php echo e(optional($training)->date_from ? \Carbon\Carbon::parse($training->date_from)->format('m/d/Y') : ''); ?>

                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        <?php echo e(optional($training)->date_to ? \Carbon\Carbon::parse($training->date_to)->format('m/d/Y') : ''); ?>

                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        <?php echo e(optional($training)->total_hours ? $training->total_hours . ' HOURS' : ''); ?>

                    </td>
                    <td colspan="1" class="text-center fw-bold">
                        <?php echo e(strtoupper(optional($training)->type ?? '')); ?>

                    </td>
                    <td colspan="2" class="text-center fw-bold">
                        <?php echo e(strtoupper(optional($training)->sponsored_by)); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>

        <tbody class="table-body">
            <tr>
                <td class="small-text text-danger text-center s-label" colspan="12">
                    <i>(Continue on separate sheet if necessary)</i>
                </td>
            </tr>
        </tbody>

        <tbody class="table-body">
            <tr>
                <td colspan="12" class="text-white separator">
                    VIII. OTHER INFORMATION
                </td>
            </tr>
            <tr class="text-center">
                <td colspan="4" class="s-label">
                    <span class="count float-left">31.</span> SPECIAL SKILLS and HOBBIES
                </td>
                <td colspan="4" class="s-label">
                    <span class="count float-left">32.</span> NON-ACADEMIC DISTINCTIONS
                    / RECOGNITION<br />(Write in full)
                </td>
                <td colspan="4" class="s-label">
                    <span class="count float-left">33.</span> MEMBERSHIP IN
                    ASSOCIATION/ORGANIZATION<br />(Write in full)
                </td>
            </tr>

            <!--[if BLOCK]><![endif]--><?php for($i = 0; $i < 6; $i++): ?>
                <tr>
                    <td colspan="4" class="text-center fw-bold text-uppercase">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($skills[$i])): ?> <?php echo e($skills[$i]->skill); ?>  <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td colspan="4" class="text-center fw-bold text-uppercase">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($recognitions[$i])): ?> <?php echo e($recognitions[$i]->recognition); ?>  <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td colspan="4" class="text-center fw-bold text-uppercase">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($organizations[$i])): ?> <?php echo e($organizations[$i]->organization); ?>  <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>
            <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->

        </tbody>

        <tbody class="table-body">
            <tr>
                <td class="small-text text-danger text-center s-label" colspan="12">
                    <i>(Continue on separate sheet if necessary)</i>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center s-label">
                    <i><b>SIGNATURE</b></i>
                </td>
                <td colspan="3"></td>
                <td colspan="1" class="text-center s-label">
                    <i><b>DATE</b></i>
                </td>
                <td colspan="4" class="text-center fw-bold"><?php echo e($dateAccomplished); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/print/sections/c3.blade.php ENDPATH**/ ?>