<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Personal Information']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Personal Information']); ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size: 14px">
            <tbody>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'First Name','value' => $personalInfo->first_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'First Name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->first_name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Middle Name','value' => $personalInfo->middle_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Middle Name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->middle_name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Last Name','value' => $personalInfo->last_name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Last Name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->last_name)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Suffix','value' => $personalInfo->suffix]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Suffix','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->suffix)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Date of Birth','value' => $personalInfo->birth_date?->format('m/d/Y')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Date of Birth','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->birth_date?->format('m/d/Y'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Place of Birth','value' => $personalInfo->birth_place]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Place of Birth','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->birth_place)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Sex','value' => ucwords($personalInfo->sex)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Sex','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucwords($personalInfo->sex))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Civil Status','value' => ucwords($personalInfo->civil_status)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Civil Status','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucwords($personalInfo->civil_status))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Height','value' => $personalInfo->height ? $personalInfo->height . 'm' : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Height','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->height ? $personalInfo->height . 'm' : null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Weight','value' => $personalInfo->weight ? (int) $personalInfo->weight . 'kg' : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Weight','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->weight ? (int) $personalInfo->weight . 'kg' : null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Blood Type','value' => $personalInfo->blood_type]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Blood Type','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->blood_type)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>

                <?php
                    $idTypes = [
                        'gsis' => 'GSIS ID NO',
                        'pagibig' => 'PAGIBIG ID NO',
                        'philhealth' => 'PHILHEALTH ID NO',
                        'sss' => 'SSS ID NO',
                        'tin' => 'TIN ID NO',
                        'agency' => 'AGENCY ID NO',
                    ];
                    $identifierMap = $personalInfo->identifiers->pluck('number', 'type')->toArray();
                ?>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $idTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => $label,'value' => $identifierMap[$type] ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($identifierMap[$type] ?? null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Citizenship','value' => ucwords($personalInfo->citizenship)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Citizenship','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucwords($personalInfo->citizenship))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Citizenship By','value' => ucwords($personalInfo->citizenship_by)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Citizenship By','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucwords($personalInfo->citizenship_by))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>

                
                <?php
                    $addresses = [
                        ['label' => 'Permanent Address', 'data' => $permanentAddress],
                        ['label' => 'Residential Address', 'data' => $residentialAddress],
                    ];
                ?>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalcfef41dd7db2a5a5350e53e972064054 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfef41dd7db2a5a5350e53e972064054 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-separator','data' => ['label' => $address['label'],'colSpan' => '2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($address['label']),'colSpan' => '2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfef41dd7db2a5a5350e53e972064054)): ?>
<?php $attributes = $__attributesOriginalcfef41dd7db2a5a5350e53e972064054; ?>
<?php unset($__attributesOriginalcfef41dd7db2a5a5350e53e972064054); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfef41dd7db2a5a5350e53e972064054)): ?>
<?php $component = $__componentOriginalcfef41dd7db2a5a5350e53e972064054; ?>
<?php unset($__componentOriginalcfef41dd7db2a5a5350e53e972064054); ?>
<?php endif; ?>

                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = ['region' => 'Region', 'province' => 'Province', 'municipality' => 'Municipality', 'barangay' => 'Barangay', 'subdivision' => 'Subdivision/Village', 'street' => 'Street', 'house_no' => 'House/Block/Lot No']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => $label,'value' => $address['data']->$key->name ?? $address['data']->$key]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($address['data']->$key->name ?? $address['data']->$key)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Country','value' => ucwords($personalInfo->country)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Country','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucwords($personalInfo->country))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Telephone No','value' => ucwords($personalInfo->telephone_no)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Telephone No','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucwords($personalInfo->telephone_no))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Mobile No','value' => ucwords($personalInfo->mobile_no)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Mobile No','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(ucwords($personalInfo->mobile_no))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal5624e7818f90ab26cc102f1b791c1b71 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-row','data' => ['label' => 'Email','value' => $personalInfo->email]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($personalInfo->email)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $attributes = $__attributesOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__attributesOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71)): ?>
<?php $component = $__componentOriginal5624e7818f90ab26cc102f1b791c1b71; ?>
<?php unset($__componentOriginal5624e7818f90ab26cc102f1b791c1b71); ?>
<?php endif; ?>
            </tbody>
        </table>

    </div>
    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.comments', [$submissionId, 'personal_information']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2077919620-0', $__slots ?? [], get_defined_vars());

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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/personal-information.blade.php ENDPATH**/ ?>