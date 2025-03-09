<!--[if BLOCK]><![endif]--><?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        // Define field types and their corresponding column sizes
        $wideFields = [
            'Academic Honors',
            'Achievements/Certifications',
            'Academic Honors/Certifications Received',
            'Academic Distinctions & Certifications',
            'Certificate',
            'Diploma',
            'Passport Photo',
            'Right Thumbmark Photo',
            'Government ID Photo',
            'Signature Photo',
            'OTR Photo',
            'Diploma Photo',
            'Employement Certificate',
        ];

        $shortFields = [
            'Start Date',
            'End Date',
            'Date Started',
            'Date Graduated (or Last Attended)',
            'Graduation/Last Attendance Date',
            'Total Units Completed',
            'Total Units Earned',
            'Year of Graduation',
            'Completion Year',
            'Highest Level Units/Earned',
            'Grade Level Completed',
            'First Name',
            'Middle Name',
            'Last Name',
            'Suffix',
            'Birth Date',
            'Birth Place',
            'Sex',
            'Civil Status',
            'Height',
            'Weight',
            'Blood Type',
            'Telephone No',
            'Mobile No',
            'Email',
            'Salary',
            'Salary Step',
            'Status',
            'Government Service',
            'Date From',
            'Date To',
            'Total Hours',
            'Address',
        ];

        // Determine the column width based on the field label
        $colClass = match (true) {
            in_array($field['label'], $wideFields) => '12',
            in_array($field['label'], $shortFields) => '3',
            default => '6',
        };

        // Prepare input attributes
        $inputAttributes = [
            'model' => ($modelPrefix ? "{$modelPrefix}." : '') . Str::snake(strtolower($field['label'])),
            'name' => ($modelPrefix ? "{$modelPrefix}." : '') . Str::snake(strtolower($field['label'])),
            'label' => $field['label'],
            'placeholder' => $field['placeholder'] ?? '',
            'type' => $field['type'] ?? 'text',
            'required' => isset($field['required']) && $field['required'] === false ? false : true,
            'disabled' => isset($field['disabled']) && $field['disabled'] === true ? true : false,
        ];

        $field['type'] = $field['type'] ?? 'text';
        // Check if the field is a select input
        $isSelect = $field['type'] === 'select';
    ?>

    <!-- Render the input field with the computed column size -->
    <div class="col-md-<?php echo e($colClass); ?>">
        <!--[if BLOCK]><![endif]--><?php if($isSelect): ?>
            <!-- Render select input -->
            <?php if (isset($component)) { $__componentOriginal7041cc63efd62f0450fe4bb37aadf484 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7041cc63efd62f0450fe4bb37aadf484 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.select','data' => ['model' => $inputAttributes['model'],'name' => $inputAttributes['name'],'label' => $inputAttributes['label'],'required' => $inputAttributes['required'],'disabled' => $inputAttributes['disabled']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['model']),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['name']),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['label']),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['required']),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['disabled'])]); ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($label); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
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
        <?php else: ?>
            <!-- Render regular input -->
            <?php if (isset($component)) { $__componentOriginal4fb6044c7ed6b655352043ff774efcd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fb6044c7ed6b655352043ff774efcd0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input','data' => ['model' => $inputAttributes['model'],'name' => $inputAttributes['name'],'label' => $inputAttributes['label'],'placeholder' => $inputAttributes['placeholder'],'type' => $inputAttributes['type'],'required' => $inputAttributes['required']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['model']),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['name']),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['label']),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['placeholder']),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['type']),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inputAttributes['required'])]); ?>
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
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/form-fields.blade.php ENDPATH**/ ?>