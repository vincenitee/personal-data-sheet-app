<div class="d-flex flex-column gap-3 mb-3">
    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '34','title' => 'Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
                chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau
                or Department where you will be apppointed:']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '34','title' => 'Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
                chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau
                or Department where you will be apppointed:']); ?>

        
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'has_third_degree_relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'has_third_degree_relative']); ?>
             <?php $__env->slot('question', null, []); ?> 
                a. within third degree?
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'has_fourth_degree_relative']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'has_fourth_degree_relative']); ?>
             <?php $__env->slot('question', null, []); ?> 
                b. within the fourth degree (for Local Government Unit - Career Employees)?
             <?php $__env->endSlot(); ?>

            <div class="col-6 d-sm d-md-block"></div>

            
            <div class="col-md-6 col-12">
                <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['model' => 'fourth_degree_relative','name' => 'fourth_degree_relative','required' => $has_fourth_degree_relative,'disabled' => !$has_fourth_degree_relative]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'fourth_degree_relative','name' => 'fourth_degree_relative','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($has_fourth_degree_relative),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$has_fourth_degree_relative)]); ?>
<?php echo $__env->renderComponent(); ?>
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '35 (a)','title' => 'Have you ever been found guilty of any administrative offense?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '35 (a)','title' => 'Have you ever been found guilty of any administrative offense?']); ?>
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'has_admin_case']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'has_admin_case']); ?>
            
            <div class="col-md-6 col-12">
                <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['model' => 'admin_case_details','name' => 'admin_case_details','required' => $has_admin_case,'disabled' => !$has_admin_case]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'admin_case_details','name' => 'admin_case_details','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($has_admin_case),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$has_admin_case)]); ?>
<?php echo $__env->renderComponent(); ?>
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '35 (b)','title' => 'Have you been criminally charged before any court?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '35 (b)','title' => 'Have you been criminally charged before any court?']); ?>
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'has_criminal_charge']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'has_criminal_charge']); ?>
            
            <div class="col-md-6 col-12">
                <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['label' => 'Date Filed','model' => 'criminal_charge_date','name' => 'criminal_charge_date','type' => 'date','required' => $has_criminal_charge,'disabled' => !$has_criminal_charge]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Date Filed','model' => 'criminal_charge_date','name' => 'criminal_charge_date','type' => 'date','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($has_criminal_charge),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$has_criminal_charge)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>

                
                <?php if (isset($component)) { $__componentOriginal7041cc63efd62f0450fe4bb37aadf484 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7041cc63efd62f0450fe4bb37aadf484 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.select','data' => ['label' => 'Status of Case/s','model' => 'criminal_charge_status','name' => 'criminal_charge_status','required' => $has_criminal_charge,'disabled' => !$has_criminal_charge]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Status of Case/s','model' => 'criminal_charge_status','name' => 'criminal_charge_status','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($has_criminal_charge),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$has_criminal_charge)]); ?>
                    <option value="under_investigation">Under Investigation</option>
                    <option value="filed_in_court">Filed in Court</option>
                    <option value="pending_arrest">Pending Arrest</option>
                    <option value="pending_arraignment">Pending Arraignment</option>
                    <option value="pending_trial">Pending Trial</option>
                    <option value="submitted_for_decision">Submitted for Decision</option>
                    <option value="resolved">Resolved</option>
                    <option value="on_appeal">On Appeal</option>
                    <option value="dismissed">Dismissed</option>
                    <option value="archived">Archived</option>
                    <option value="convicted">Convicted</option>
                    <option value="acquitted">Acquitted</option>
                    <option value="probation">Probation</option>
                    <option value="on_bail">On Bail</option>
                    <option value="detained">Detained</option>
                    <option value="suspended">Suspended</option>
                    <option value="withdrawn">Withdrawn</option>
                    <option value="transferred">Transferred</option>
                    <option value="executed">Executed</option>
                    <option value="pardoned">Pardoned</option>
                    <option value="parole">Parole</option>
                    <option value="case_closed">Case Closed</option>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7041cc63efd62f0450fe4bb37aadf484)): ?>
<?php $attributes = $__attributesOriginal7041cc63efd62f0450fe4bb37aadf484; ?>
<?php unset($__attributesOriginal7041cc63efd62f0450fe4bb37aadf484); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7041cc63efd62f0450fe4bb37aadf484)): ?>
<?php $component = $__componentOriginal7041cc63efd62f0450fe4bb37aadf484; ?>
<?php unset($__componentOriginal7041cc63efd62f0450fe4bb37aadf484); ?>
<?php endif; ?>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '36','title' => 'Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation
    by any court or tribunal?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '36','title' => 'Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation
    by any court or tribunal?']); ?>
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'has_criminal_conviction']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'has_criminal_conviction']); ?>
            
            <div class="col-12 col-md-6">
                <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['model' => 'criminal_conviction_details','name' => 'criminal_conviction_details','required' => $has_criminal_conviction,'disabled' => !$has_criminal_conviction]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'criminal_conviction_details','name' => 'criminal_conviction_details','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($has_criminal_conviction),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$has_criminal_conviction)]); ?>
<?php echo $__env->renderComponent(); ?>
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '37','title' => 'Have you ever been separated from the service in any of the following modes: resignation,
    retirement,
    dropped from the rolls, dismissal, termination, end of term, finished contract or phased out
    (abolition)
    in the public or private sector?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '37','title' => 'Have you ever been separated from the service in any of the following modes: resignation,
    retirement,
    dropped from the rolls, dismissal, termination, end of term, finished contract or phased out
    (abolition)
    in the public or private sector?']); ?>
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'has_separation_from_service']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'has_separation_from_service']); ?>
            
            <div class="col-12 col-md-6">
                <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['model' => 'separation_details','name' => 'separation_details','required' => $has_separation_from_service,'disabled' => !$has_separation_from_service]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'separation_details','name' => 'separation_details','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($has_separation_from_service),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$has_separation_from_service)]); ?>
<?php echo $__env->renderComponent(); ?>
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '38 (a)','title' => 'Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '38 (a)','title' => 'Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?']); ?>
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'is_election_candidate']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'is_election_candidate']); ?>
            
            <div class="col-12 col-sm-6">
                <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['model' => 'election_details','name' => 'election_details','required' => $is_election_candidate,'disabled' => !$is_election_candidate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'election_details','name' => 'election_details','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($is_election_candidate),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$is_election_candidate)]); ?>
<?php echo $__env->renderComponent(); ?>
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '38 (b)','title' => 'Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '38 (b)','title' => 'Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?']); ?>
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'has_resigned_for_election']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'has_resigned_for_election']); ?>
            
            <div class="col-12 col-md-6">
                <?php if (isset($component)) { $__componentOriginalea7b7095850fe8bc9657025b89ccf5a5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalea7b7095850fe8bc9657025b89ccf5a5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.textarea','data' => ['model' => 'resignation_details','name' => 'resignation_details','required' => $has_resigned_for_election,'disabled' => !$has_resigned_for_election]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'resignation_details','name' => 'resignation_details','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($has_resigned_for_election),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$has_resigned_for_election)]); ?>
<?php echo $__env->renderComponent(); ?>
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
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '39','title' => 'Have you acquired the status of an immigrant or permanent resident of another country?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '39','title' => 'Have you acquired the status of an immigrant or permanent resident of another country?']); ?>
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'is_immigrant']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'is_immigrant']); ?>
            
            <div class="col-12 col-md-6">
                <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['label' => 'Country','required' => $is_immigrant,'model' => 'immigrant_country','name' => 'immigrant_country','placeholder' => 'e.g., Europe','disabled' => !$is_immigrant]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Country','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($is_immigrant),'model' => 'immigrant_country','name' => 'immigrant_country','placeholder' => 'e.g., Europe','disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$is_immigrant)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-card','data' => ['number' => '40','title' => 'Pursuant to: (a) Indigenous People\'s Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['number' => '40','title' => 'Pursuant to: (a) Indigenous People\'s Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:']); ?>
        
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'is_indigenous']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'is_indigenous']); ?>
             <?php $__env->slot('question', null, []); ?> 
                a. Are you a member of any indigenous group?
             <?php $__env->endSlot(); ?>

            <div class="col-6 d-none d-md-block"></div>

            
            <div class="col-md-6 col-12 mb-3 ">
                <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['label' => 'If YES, give details:','model' => 'indigenous_details','name' => 'indigenious_details','required' => $is_indigenous,'disabled' => !$is_indigenous,'placeholder' => 'Please specify your indigenous group']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'If YES, give details:','model' => 'indigenous_details','name' => 'indigenious_details','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($is_indigenous),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$is_indigenous),'placeholder' => 'Please specify your indigenous group']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'is_disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'is_disabled']); ?>
             <?php $__env->slot('question', null, []); ?> 
                b. Are you a person with disability?
             <?php $__env->endSlot(); ?>

            <div class="col-6 d-none d-md-block"></div>

            
            <div class="col-md-6 col-12 mb-3 ">
                <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['label' => 'If YES, please specify ID No','model' => 'disabled_person_id','name' => 'disabled_person_id','required' => $is_disabled,'disabled' => !$is_disabled,'placeholder' => 'Enter your ID Number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'If YES, please specify ID No','model' => 'disabled_person_id','name' => 'disabled_person_id','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($is_disabled),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$is_disabled),'placeholder' => 'Enter your ID Number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>

        
        <?php if (isset($component)) { $__componentOriginal050dd19627feb596a8600e5582417f57 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal050dd19627feb596a8600e5582417f57 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.question-group','data' => ['name' => 'is_solo_parent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.question-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'is_solo_parent']); ?>
             <?php $__env->slot('question', null, []); ?> 
                c. Are you a solo parent?
             <?php $__env->endSlot(); ?>

            <div class="col-6 d-none d-md-block"></div>

            
            <div class="col-md-6 col-12 mb-3 ">
                <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['label' => 'If YES, please specify ID No','model' => 'solo_parent_id','name' => 'solo_parent_id','required' => $is_solo_parent,'disabled' => !$is_solo_parent,'placeholder' => 'Enter your ID Number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'If YES, please specify ID No','model' => 'solo_parent_id','name' => 'solo_parent_id','required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($is_solo_parent),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(!$is_solo_parent),'placeholder' => 'Enter your ID Number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $attributes = $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__attributesOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0)): ?>
<?php $component = $__componentOriginal4fb6044c7ed6b655352043ff774efcd0; ?>
<?php unset($__componentOriginal4fb6044c7ed6b655352043ff774efcd0); ?>
<?php endif; ?>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $attributes = $__attributesOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__attributesOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal050dd19627feb596a8600e5582417f57)): ?>
<?php $component = $__componentOriginal050dd19627feb596a8600e5582417f57; ?>
<?php unset($__componentOriginal050dd19627feb596a8600e5582417f57); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $attributes = $__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__attributesOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a)): ?>
<?php $component = $__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a; ?>
<?php unset($__componentOriginal8705298c2e7c8c51301f3eb2bdf7e69a); ?>
<?php endif; ?>


    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'References (Person not related by consanguinity or affinity to applicant/employee)','icon' => 'bi-person-lines-fill','loadingTarget' => 'addReferencePeople()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'References (Person not related by consanguinity or affinity to applicant/employee)','icon' => 'bi-person-lines-fill','loadingTarget' => 'addReferencePeople()']); ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('partials.count-indicator', ['count' => $index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('partials.form-fields', [
                'modelPrefix' => "references.$index",
                'fields' => [
                    [
                        'label' => 'Fullname',
                        'required' => false,
                        'placeholder' => 'e.g., Juan Dela Cruz',
                    ],
                    [
                        'label' => 'Address',
                        'required' => false,
                        'placeholder' =>
                            'e.g., 123 Rizal St., Barangay San Isidro, Quezon City, Metro Manila, 1100',
                    ],
                    [
                        'label' => 'Telephone No',
                        'required' => false,
                    ],
                ],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-12 text-end">
                <button type="button" @click="confirmDelete('references', <?php echo e($index); ?>)"
                    class="btn btn-outline-danger btn-sm" <?php if(count($references) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        <?php $__env->slot('footer'); ?>
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" wire:click="removeAllReferencePeople()" class="btn btn-outline-danger btn-sm"
                    <?php if(count($references) === 1): ?> disabled <?php endif; ?>>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addReferencePeople()" class="btn btn-primary btn-sm">
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
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/employee/pds/steps/step-9.blade.php ENDPATH**/ ?>