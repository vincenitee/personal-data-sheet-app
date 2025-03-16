<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Additional Questions','icon' => 'bi-question-circle','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Additional Questions','icon' => 'bi-question-circle','openCard' => ''.e($openCard).'']); ?>
    <div class="additional-questions-container">
        <!-- Questionnaire Section -->
        <div class="questionnaire-section mb-4">
            <div class="section-header mb-3">
                <h6 class="section-title"><i class="bi bi-list-check me-2"></i>Background Questions</h6>
            </div>

            <div class="question-items">
                <!-- Question 34 -->
                <div class="question-group mb-4">
                    <div class="question-header">
                        <div class="question-number">34</div>
                        <div class="question-text">
                            Are you related by consanguinity or affinity to the appointing or recommending authority, or
                            to
                            the chief of bureau or office or to the person who has immediate supervision over you in the
                            Office, Bureau or Department where you will be apppointed,
                        </div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            <span class="sub-question-label">a. within third degree?</span>
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="has_third_degree_relative" type="radio"
                                            value="<?php echo e($value); ?>" class="form-check-input"
                                            id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            <span class="sub-question-label">b. within the fourth degree (for Local Government Unit -
                                Career Employees)?</span>
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="has_fourth_degree_relative" type="radio"
                                            value="<?php echo e($value); ?>" class="form-check-input"
                                            id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="detail-section">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($fourth_degree_relative)): ?>
                                <div class="detail-content"><?php echo e($fourth_degree_relative); ?></div>
                            <?php else: ?>
                                <div class="no-detail-badge">
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                    </span>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>

                <!-- Question 35 -->
                <div class="question-group mb-4">
                    <div class="question-header">
                        <div class="question-number">35</div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            <span class="sub-question-label">a. Have you ever been found guilty of any administrative
                                offense?</span>
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="has_admin_case" type="radio" value="<?php echo e($value); ?>"
                                            class="form-check-input" id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="detail-section">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($admin_case_details)): ?>
                                <div class="detail-content"><?php echo e($admin_case_details); ?></div>
                            <?php else: ?>
                                <div class="no-detail-badge">
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                    </span>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            <span class="sub-question-label">b. Have you been criminally charged before any
                                court?</span>
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="has_criminal_charge" type="radio"
                                            value="<?php echo e($value); ?>" class="form-check-input"
                                            id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="detail-section">
                            <div class="charge-details">
                                <!--[if BLOCK]><![endif]--><?php if(!empty($criminal_charge_date)): ?>
                                    <div class="detail-date">
                                        <span class="detail-label">Charge Date:</span>
                                        <span
                                            class="detail-value"><?php echo e(\Carbon\Carbon::parse($criminal_charge_date)->format('m/d/Y')); ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="no-detail-badge">
                                        <span class="badge rounded-pill bg-warning text-dark">
                                            <i class="bi bi-exclamation-circle me-1"></i>No date provided
                                        </span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <!--[if BLOCK]><![endif]--><?php if(!empty($criminal_charge_status)): ?>
                                    <div class="detail-status">
                                        <span class="badge bg-info">
                                            <?php echo e(ucwords(str_replace('_', ' ', $criminal_charge_status))); ?>

                                        </span>
                                    </div>
                                <?php else: ?>
                                    <div class="no-detail-badge">
                                        <span class="badge rounded-pill bg-warning text-dark">
                                            <i class="bi bi-exclamation-circle me-1"></i>No status provided
                                        </span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Question 36 -->
                <div class="question-group mb-4">
                    <div class="question-header">
                        <div class="question-number">36</div>
                        <div class="question-text">Have you ever been convicted of any crime or violation of any law,
                            decree, ordinance or
                            regulation by any court or tribunal?</div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="has_criminal_conviction" type="radio"
                                            value="<?php echo e($value); ?>" class="form-check-input"
                                            id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="detail-section">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($criminal_conviction_details)): ?>
                                <div class="detail-content"><?php echo e($criminal_conviction_details); ?></div>
                            <?php else: ?>
                                <div class="no-detail-badge">
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                    </span>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>

                <!-- Question 37 -->
                <div class="question-group mb-4">
                    <div class="question-header">
                        <div class="question-number">37</div>
                        <div class="question-text">Have you ever been separated from the service in any of the
                            following modes: resignation,
                            retirement, dropped from the rolls, dismissal, termination, end of term, finished contract
                            or
                            phased out (abolition) in the public or private sector?</div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="has_separation_from_service" type="radio"
                                            value="<?php echo e($value); ?>" class="form-check-input"
                                            id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="detail-section">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($separation_details)): ?>
                                <div class="detail-content"><?php echo e($separation_details); ?></div>
                            <?php else: ?>
                                <div class="no-detail-badge">
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                    </span>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>

                <!-- Question 38 -->
                <div class="question-group mb-4">
                    <div class="question-header">
                        <div class="question-number">38</div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            <span class="sub-question-label">a. Have you ever been a candidate in a national or local
                                election held within the last year?</span>
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="is_election_candidate" type="radio"
                                            value="<?php echo e($value); ?>" class="form-check-input"
                                            id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="detail-section">
                            <!--[if BLOCK]><![endif]--><?php if(!empty($election_details)): ?>
                                <div class="detail-content"><?php echo e($election_details); ?></div>
                            <?php else: ?>
                                <div class="no-detail-badge">
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                    </span>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <div class="question-subitem">
                        <div class="sub-question">
                            <span class="sub-question-label">b. Have you resigned from the government service during
                                the three (3)-month period before the
                                last election to promote/actively campaign for a national or local candidate?</span>
                            <div class="response-options">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline">
                                        <input wire:model="has_resigned_for_election" type="radio"
                                            value="<?php echo e($value); ?>" class="form-check-input"
                                            id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                        <label class="form-check-label"
                                            for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="detail-section">
                            <div class="charge-details">
                                <!--[if BLOCK]><![endif]--><?php if(!empty($resignation_details)): ?>
                                    <div class="detail-date">
                                        <span class="detail-label"></span>
                                        <span class="detail-value"><?php echo e($resignation_details); ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="no-detail-badge">
                                        <span class="badge rounded-pill bg-warning text-dark">
                                            <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                        </span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>

                    
                    <div class="question-group mb-4">
                        <div class="question-header">
                            <div class="question-number">39</div>
                            <div class="question-text">Have you acquired the status of an immigrant or permanent
                                resident of another country?</div>
                        </div>

                        <div class="question-subitem">
                            <div class="sub-question">
                                
                                <div class="response-options">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="is_immigrant" type="radio"
                                                value="<?php echo e($value); ?>" class="form-check-input"
                                                id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                            <label class="form-check-label"
                                                for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="detail-section">
                                <!--[if BLOCK]><![endif]--><?php if(!empty($immigrant_country)): ?>
                                    <div class="detail-date">
                                        <span class="detail-label">Country:</span>
                                        <span class="detail-value"><?php echo e($immigrant_country); ?></span>
                                    </div>
                                <?php else: ?>
                                    <div class="no-detail-badge">
                                        <span class="badge rounded-pill bg-warning text-dark">
                                            <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                        </span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>

                    <div class="question-group mb-4">
                        <div class="question-header">
                            <div class="question-number">38</div>
                        </div>

                        <div class="question-subitem">
                            <div class="sub-question">
                                <span class="sub-question-label">a. Have you ever been a candidate in a national or
                                    local
                                    election held within the last year?</span>
                                <div class="response-options">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="is_election_candidate" type="radio"
                                                value="<?php echo e($value); ?>" class="form-check-input"
                                                id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                            <label class="form-check-label"
                                                for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="detail-section">
                                <!--[if BLOCK]><![endif]--><?php if(!empty($election_details)): ?>
                                    <div class="detail-content"><?php echo e($election_details); ?></div>
                                <?php else: ?>
                                    <div class="no-detail-badge">
                                        <span class="badge rounded-pill bg-warning text-dark">
                                            <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                        </span>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                        <div class="question-subitem">
                            <div class="sub-question">
                                <span class="sub-question-label">b. Have you resigned from the government service
                                    during
                                    the three (3)-month period before the
                                    last election to promote/actively campaign for a national or local candidate?</span>
                                <div class="response-options">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="has_resigned_for_election" type="radio"
                                                value="<?php echo e($value); ?>" class="form-check-input"
                                                id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                            <label class="form-check-label"
                                                for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="detail-section">
                                <div class="charge-details">
                                    <!--[if BLOCK]><![endif]--><?php if(!empty($resignation_details)): ?>
                                        <div class="detail-date">
                                            <span class="detail-label"></span>
                                            <span class="detail-value"><?php echo e($resignation_details); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="no-detail-badge">
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                            </span>
                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        </div>

                        
                        <div class="question-group mb-4">
                            <div class="question-header">
                                <div class="question-number">40</div>
                                <div class="question-text">Pursuant to: (a) Indigenous People's Act (RA 8371); (b)
                                    Magna Carta for Disabled Persons (RA
                                    7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the
                                    following items:</div>
                            </div>

                            <div class="question-subitem">
                                <div class="sub-question">
                                    <span class="sub-question-label">a. Are you a member of any indigenous
                                        group?</span>
                                    <div class="response-options">
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-check-inline">
                                                <input wire:model="is_indigenous" type="radio"
                                                    value="<?php echo e($value); ?>" class="form-check-input"
                                                    id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                                <label class="form-check-label"
                                                    for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                                <div class="detail-section">
                                    <!--[if BLOCK]><![endif]--><?php if(!empty($indigenous_details)): ?>
                                        <div class="detail-content"><?php echo e($indigenous_details); ?></div>
                                    <?php else: ?>
                                        <div class="no-detail-badge">
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                            </span>
                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>

                            <div class="question-subitem">
                                <div class="sub-question">
                                    <span class="sub-question-label">b. Are you a person with disability?</span>
                                    <div class="response-options">
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-check-inline">
                                                <input wire:model="is_disabled" type="radio"
                                                    value="<?php echo e($value); ?>" class="form-check-input"
                                                    id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                                <label class="form-check-label"
                                                    for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                                <div class="detail-section">
                                    <!--[if BLOCK]><![endif]--><?php if(!empty($disabled_person_id)): ?>
                                        <div class="detail-content"><?php echo e($disabled_person_id); ?></div>
                                    <?php else: ?>
                                        <div class="no-detail-badge">
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                            </span>
                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="question-subitem">
                                <div class="sub-question">
                                    <span class="sub-question-label">c. Are you a solo parent?</span>
                                    <div class="response-options">
                                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = [1 => 'YES', 0 => 'NO']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-check-inline">
                                                <input wire:model="is_solo_parent" type="radio"
                                                    value="<?php echo e($value); ?>" class="form-check-input"
                                                    id="q34b-<?php echo e(strtolower($label)); ?>" disabled>
                                                <label class="form-check-label"
                                                    for="q34b-<?php echo e(strtolower($label)); ?>"><?php echo e($label); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                                <div class="detail-section">
                                    <!--[if BLOCK]><![endif]--><?php if(!empty($solo_parent_id)): ?>
                                        <div class="detail-content"><?php echo e($solo_parent_id); ?></div>
                                    <?php else: ?>
                                        <div class="no-detail-badge">
                                            <span class="badge rounded-pill bg-warning text-dark">
                                                <i class="bi bi-exclamation-circle me-1"></i>No details provided
                                            </span>
                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Remaining questions would follow the same pattern -->
                <!-- For brevity, I'm showing just questions 34 and 35 as examples -->
                <!-- The pattern would continue for questions 36-40 -->
            </div>
        </div>

        <!-- References Section -->
        <div class="references-section">
            <div class="section-header mb-3">
                <h6 class="section-title"><i class="bi bi-person-lines-fill me-2"></i>References</h6>
            </div>

            <div class="references-container">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $questionResponses->referencePersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="reference-card mb-3">
                        <div class="reference-info">
                            <div class="reference-name">
                                <!--[if BLOCK]><![endif]--><?php if(!empty($person->fullname)): ?>
                                    <i class="bi bi-person me-2"></i><?php echo e($person->fullname); ?>

                                <?php else: ?>
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-exclamation-circle me-1"></i>No name provided
                                    </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            <div class="reference-details mt-2">
                                <div class="detail-row">
                                    <div class="detail-icon"><i class="bi bi-geo-alt"></i></div>
                                    <div class="detail-text">
                                        <!--[if BLOCK]><![endif]--><?php if(!empty($person->address)): ?>
                                            <?php echo e($person->address); ?>

                                        <?php else: ?>
                                            <span class="text-muted">No address provided</span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <div class="detail-row mt-2">
                                    <div class="detail-icon"><i class="bi bi-telephone"></i></div>
                                    <div class="detail-text">
                                        <!--[if BLOCK]><![endif]--><?php if(!empty($person->telephone_no)): ?>
                                            <?php echo e($person->telephone_no); ?>

                                        <?php else: ?>
                                            <span class="text-muted">No telephone number provided</span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-state text-center py-4">
                        <i class="bi bi-person-x text-light mb-3" style="font-size: 2rem"></i>
                        <p class="text-secondary mb-0">No references provided</p>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <!--[if BLOCK]><![endif]--><?php if(!in_array($entryStatus, ['approved', 'needs_revision'])): ?>
        <div class="comments-section mt-4">
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
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <style>
        .additional-questions-container {
            font-size: 0.9rem;
        }

        .section-header {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 0.75rem;
        }

        .section-title {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
            margin-bottom: 0;
        }

        .question-group {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .question-header {
            display: flex;
            margin-bottom: 1rem;
        }

        .question-number {
            min-width: 2rem;
            height: 2rem;
            background-color: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 0.75rem;
            color: #495057;
            flex-shrink: 0;
        }

        .question-text {
            font-weight: 500;
            color: #212529;
        }

        .question-subitem {
            margin-left: 2.75rem;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-bottom: 1px dashed #e9ecef;
        }

        .question-subitem:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .sub-question {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.75rem;
            flex-wrap: wrap;
        }

        .sub-question-label {
            flex: 1;
            min-width: 200px;
            padding-right: 1rem;
        }

        .response-options {
            display: flex;
            min-width: 120px;
        }

        .detail-section {
            background-color: #f8f9fa;
            border-radius: 0.4rem;
            padding: 0.75rem;
        }

        .detail-content {
            color: #495057;
        }

        .charge-details {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        .detail-date {
            display: flex;
            align-items: center;
        }

        .detail-label {
            font-weight: 500;
            color: #6c757d;
            margin-right: 0.5rem;
            font-size: 0.85rem;
        }

        .detail-value {
            font-weight: 500;
        }

        .references-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1rem;
        }

        .reference-card {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1.25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .reference-name {
            font-weight: 600;
            font-size: 1rem;
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .reference-details {
            color: #495057;
        }

        .detail-row {
            display: flex;
            align-items: flex-start;
        }

        .detail-icon {
            margin-right: 0.75rem;
            color: #6c757d;
        }

        .empty-state {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 2rem;
        }

        .badge {
            font-weight: 500;
        }

        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        @media (max-width: 768px) {
            .sub-question {
                flex-direction: column;
            }

            .response-options {
                margin-top: 0.5rem;
            }
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319)): ?>
<?php $attributes = $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319; ?>
<?php unset($__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c755b64b7bb8b6a080bedeeb703c319)): ?>
<?php $component = $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319; ?>
<?php unset($__componentOriginal9c755b64b7bb8b6a080bedeeb703c319); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/questionnaire.blade.php ENDPATH**/ ?>