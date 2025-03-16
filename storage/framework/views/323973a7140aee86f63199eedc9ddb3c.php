<div class="table-responsive">
    <table id="pds-table">
        <!-- Q1 -->
        <tbody class="table-body question-block">
            <tr>
                <td colspan="12" class="separator"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label border-bottom-0">
                    <span class="count">34.</span> Are you related by consanguinity or
                    affinity to the appointing or recommending authority, or to the<br />
                    <span class="count"></span>chief of bureau or office or to the
                    person who has immediate supervision over you in the Office,<br />
                    <span class="count"></span>Bureau or Department where you will be
                    appointed,<br />
                </td>
                <td colspan="2"></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span>a. within the third degree?<br />
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox"
                                    <?php echo e($questions->has_third_degree_relative === $value ? 'checked' : ''); ?> disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span>b. within the fourth degree (for Local
                    Government Unit - Career Employees)?
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox"
                                    <?php echo e($questions->has_fourth_degree_relative === $value ? 'checked' : ''); ?> disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2">If YES, give details:</td>
                <td colspan="3">
                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="5" class="fw-bold text-center text-uppercase">
                    <!--[if BLOCK]><![endif]--><?php if($questions->fourth_degree_relative): ?>
                        <?php echo e($questions->fourth_degree_relative); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
            </tr>
        </tbody>

        <!-- Q2 -->
        <tbody class="table-body question-block">
            <tr>
                <td colspan="7" class="s-label border-bottom-0">
                    <span class="count">35.</span> a. Have you ever been found guilty of
                    any administrative offense?
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" <?php echo e($questions->has_admin_case === $value ? 'checked' : ''); ?>

                                    disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3">
                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="5">If YES, give details:</td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="5" class="fw-bold text-center text-uppercase">
                    <!--[if BLOCK]><![endif]--><?php if($questions->admin_case_details): ?>
                        <?php echo e($questions->admin_case_details); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count me-4"></span> b. Have you been criminally charged before any court?
                </td>
                <td colspan="2" style="border-top-width: 1px !important">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" <?php echo e($questions->has_admin_case === $value ? 'checked' : ''); ?>

                                    disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3" style="border-top-width: 1px !important"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="5">If YES, give details:</td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2">Date Filed:</td>
                <td colspan="3" class="fw-bold">
                    <!--[if BLOCK]><![endif]--><?php if($questions->criminal_charge_date): ?>
                        <?php echo e(\Carbon\Carbon::parse($questions->criminal_charge_date)->format('m/d/Y')); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2">Status of Case/s:</td>
                <td colspan="3" class="text-uppercase fw-bold">
                    <!--[if BLOCK]><![endif]--><?php if($questions->criminal_charge_status): ?>
                        <?php echo e(str_replace('_', ' ', $questions->criminal_charge_status)); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
            </tr>
        </tbody>

        <!-- Q3 -->
        <tbody class="table-body question-block">
            <tr>
                <td colspan="7" class="s-label border-bottom-0">
                    <span class="count">36.</span> Have you ever been convicted of any
                    crime or violation of any law, decree, ordinance or regulation by
                    any court or tribunal?
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox"
                                    <?php echo e($questions->has_criminal_conviction === $value ? 'checked' : ''); ?> disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3">
                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="5">If YES, give details:</td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="5" class="text-uppercase fw-bold">
                    <!--[if BLOCK]><![endif]--><?php if($questions->criminal_conviction_details): ?>
                        <?php echo e($questions->criminal_conviction_details); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
            </tr>
        </tbody>

        <!-- Q4 -->
        <tbody class="table-body question-block">
            <tr>
                <td colspan="7" class="s-label border-bottom-0">
                    <span class="count">37.</span> Have you ever been separated from the
                    service in any of the following modes: resignation,<br />
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox"
                                    <?php echo e($questions->has_separation_from_service === $value ? 'checked' : ''); ?> disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span> retirement, dropped from the rolls,
                    dismissal, termination, end of term, finished contract or phased<br />
                </td>
                <td colspan="5">If YES, give details:</td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span> out (abolition) in the public or private
                    sector?
                </td>
                <td colspan="2" class="text-uppercase fw-bold">
                    <!--[if BLOCK]><![endif]--><?php if($questions->separation_details): ?>
                        <?php echo e($questions->separation_details); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
                <td colspan="3"></td>
            </tr>
        </tbody>

        <!-- Q5 -->
        <tbody class="table-body question-block">
            <tr>
                <td colspan="7" class="s-label border-bottom-0">
                    <span class="count">38.</span> a. Have you ever been a candidate in
                    a national or local election held within the last year (except
                    Barangay election)?
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox"
                                    <?php echo e($questions->is_election_candidate === $value ? 'checked' : ''); ?> disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"><span class="count"></span><br /></td>
                <td colspan="2">If YES, give details:</td>
                <td colspan="3" class="text-uppercase fw-bold">
                    <!--[if BLOCK]><![endif]--><?php if($questions->election_details): ?>
                        <?php echo e($questions->election_details); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span> b. Have you resigned from the government
                    service during the three (3)-month period before the last
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox"
                                    <?php echo e($questions->has_resigned_for_election === $value ? 'checked' : ''); ?> disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span> election to promote/actively campaign
                    for a national or local candidate?
                </td>
                <td colspan="2">If YES, give details:</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2" class="text-uppercase fw-bold">
                    <!--[if BLOCK]><![endif]--><?php if($questions->resignation_details): ?>
                        <?php echo e($questions->resignation_details); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
                <td colspan="3"></td>
            </tr>
        </tbody>

        <!-- Q6 -->
        <tbody class="table-body question-block">
            <tr>
                <td colspan="7" class="s-label border-bottom-0">
                    <span class="count">39.</span> Have you acquired the status of an
                    immigrant or permanent resident of another country?
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" <?php echo e($questions->is_immigrant === $value ? 'checked' : ''); ?>

                                    disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2">if YES, give details (country):</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2" class="text-uppercase fw-bold">
                    <!--[if BLOCK]><![endif]--><?php if($questions->immigrant_country): ?>
                        <?php echo e($questions->immigrant_country); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </td>
                <td colspan="3"></td>
            </tr>
        </tbody>

        <!-- Q7 -->
        <tbody class="table-body question-block">
            <tr>
                <td colspan="7" class="s-label border-bottom-0">
                    <span class="count">40.</span> Pursuant to: (a) Indigenous People's
                    Act (RA 8371); (b) Magna Carta for Disabled Persons (RA<br />
                    <span class="count"></span> 7277); and (c) Solo Parents Welfare Act
                    of 2000 (RA 8972), please answer the following items:
                </td>
                <td colspan="2"></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span>a. Are you a member of any indigenous
                    group?<br />
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" <?php echo e($questions->is_indigenous === $value ? 'checked' : ''); ?>

                                    disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"><span class="count"></span><br /></td>
                <td colspan="2">If YES, please specify:</td>
                <td colspan="3" class="fw-bold text-uppercase">
                    <?php echo e(optional($questions)->indigenous_details ?? ''); ?>

                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span>b. Are you a person with disability?
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" <?php echo e($questions->is_disabled === $value ? 'checked' : ''); ?>

                                    disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2">If YES, please specify:</td>
                <td colspan="3" class="fw-bold">
                    <?php echo e(optional($questions)->disabled_person_id ?? ''); ?>

                </td>
            </tr>
            <tr>
                <td colspan="7" class="s-label">
                    <span class="count"></span>c. Are you a solo parent?
                </td>
                <td colspan="2">
                    <div class="d-flex align-items-center gap-4">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" <?php echo e($questions->is_solo_parent === $value ? 'checked' : ''); ?>

                                    disabled>
                                <label><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="7" class="s-label"></td>
                <td colspan="2">If YES, please specify:</td>
                <td colspan="3" class="fw-bold">
                    <?php echo e(optional($questions)->solo_parent_id ?? ''); ?>

                </td>
            </tr>
        </tbody>

        <!--  Page 4 -->

        <tbody class="table-body">
            <tr>
                <td colspan="8" class="s-label">
                    <span class="count">41.</span> REFERENCES
                    <span class="text-danger">(Person not related by consanguinity or affinity to applicant
                        /appointee)</span>
                </td>
                <td colspan="4" rowspan="6" class="p-5 border-bottom-0">
                    <div class="d-flex justify-content-center">
                        <img src="<?php echo e(optional($attachment)->passport_photo ? Storage::url($attachment->passport_photo) : asset('images/default-passport.png')); ?>"
                            alt="Passport Photo"
                            style="height: 150px; width: 100%; object-fit: contain;">
                    </div>
                    <h6 class="lead text-center text-muted">Photo</h6>
                </td>

            </tr>
            <tr class="text-center">
                <td colspan="4" class="s-label">NAME</td>
                <td colspan="2" class="s-label">ADDRESS</td>
                <td colspan="2" class="s-label">TEL. NO.</td>
            </tr>

            <?php
                $referencePersons = $referencePersons->pad(3, (object) []);
            ?>

            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $referencePersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="4" class="text-center fw-bold text-uppercase">
                        <?php echo e(optional($r)->fullname ?? ''); ?>

                    </td>
                    <td colspan="2" class="text-center fw-bold text-uppercase">
                        <?php echo e(optional($r)->address ?? ''); ?>

                    </td>
                    <td colspan="2" class="text-center fw-bold text-uppercase">
                        <?php echo e(optional($r)->telephone_no ?? ''); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <tr>
                <td colspan="8">
                    <span class="count">42.</span> I declare under oath that I have
                    personally accomplished this Personal Data Sheet which is a true
                    correct and<br /><span class="count"></span> complete statement
                    pursuant to the provisions of pertinent laws, rules and regulations
                    of the Republic of the<br /><span class="count"></span> Philippines.
                    I authorize the agency head / authorized representative t verify
                    validate the contents stated herein.<br /><span class="count"></span>
                    I agree that any misrepresentation made in this document and its
                    attachments shall cause the filing of<br /><span class="count"></span>
                    administrative/criminal case/s against me.
                </td>

            </tr>
            <tr>
                <td colspan="12" class="border-0 p-0">
                    <table class="border-0 w-100">
                        <tbody class="border-0">
                            <tr>
                                <td colspan="4" class="border-0 p-3" style="width: 30%">
                                    <table class="border-0 w-100">
                                        <tbody>
                                            <tr>
                                                <td class="s-label py-2">
                                                    Government Issued ID(i.e.Passport, GSIS, SSS, PRC,
                                                    Driver's License, etc.)<br />
                                                    PLEASE INDICATE ID Number and Date of Issuance
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">Government Issued ID: <strong
                                                        class="text-uppercase"><?php echo e(optional($attachment)->government_id_type ? str_replace('_', ' ', $attachment->government_id_type) : ''); ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">ID/License/Passport No.: <strong
                                                        class="text-uppercase"><?php echo e(optional($attachment)->government_id_no ?? ''); ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 30%">Date/Place of Issuance: <strong
                                                        class="text-uppercase"><?php echo e(optional($attachment)->date_of_issuance ? \Carbon\Carbon::parse($attachment->date_of_issuance)->format('Y-m-d') : ''); ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td colspan="4" class="border-0 p-3" style="width: 31.5%">
                                    <table class="border-0 w-100 h-100">
                                        <tbody class="border-0 text-center">
                                            <tr>
                                                <td class="py-4"></td>
                                            </tr>
                                            <tr>
                                                <td class="s-label">
                                                    <small>Signature (Sign inside the box)</small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-uppercase">
                                                    <?php echo e($dateAccomplished); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="s-label">
                                                    <small>Date Accomplished</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td colspan="" class="border-0 p-3">
                                    <table class="border-0 w-75 mx-auto">
                                        <tbody class="border-0">
                                            <tr>
                                                <td class="text-center p-1">
                                                    <img src="<?php echo e(optional($attachment)->right_thumbmark_photo ? Storage::url($attachment->right_thumbmark_photo) : ''); ?>" alt="" style="width: 100px; height: 100px; object-fit: contain;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="s-label text-center">Right Thumbmark</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>

                        <tbody class="table-body">
                            <tr>
                                <td colspan="12" class="text-center py-2">
                                    SUBSCRIBED AND SWORN to before me this
                                    <input type="text" class="border-top-0 border-start-0 border-end-0"
                                        style="width: 25%; cursor: pointer; pointer-events: none;" readonly />
                                    , affiant exhibiting his/her validly issued government ID as
                                    indicated above.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" class="py-5">
                                    <table class="w-25 mx-auto">
                                        <tbody>
                                            <tr>
                                                <td class="py-5"></td>
                                            </tr>
                                            <tr>
                                                <td class="s-label text-center">
                                                    Person Administering Oath
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/print/sections/c4.blade.php ENDPATH**/ ?>