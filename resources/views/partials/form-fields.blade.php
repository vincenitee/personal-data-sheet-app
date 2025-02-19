@foreach ($fields as $field)
    @php
        // Define field types and their corresponding column sizes
        $wideFields = [
            'Academic Honors',
            'Achievements/Certifications',
            'Academic Honors/Certifications Received',
            'Academic Distinctions & Certifications',
            'Certificate',
            'Diploma',
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
        ];

        $field['type'] = $field['type'] ?? 'text';
        // Check if the field is a select input
        $isSelect = $field['type'] === 'select';
    @endphp

    <!-- Render the input field with the computed column size -->
    <div class="col-md-{{ $colClass }}">
        @if ($isSelect)
            <!-- Render select input -->
            <x-forms.select
                :model="$inputAttributes['model']"
                :name="$inputAttributes['name']"
                :label="$inputAttributes['label']"
                :require="$inputAttributes['required']"
            >
                <option value="">Choose an option</option>
                @foreach ($field['options'] as $key => $label)
                    <option value="{{ $key }}">{{ $label }} </option>
                @endforeach
            </x-forms.select>
        @else
            <!-- Render regular input -->
            <x-forms.input :model="$inputAttributes['model']" :name="$inputAttributes['name']" :label="$inputAttributes['label']" :placeholder="$inputAttributes['placeholder']" :type="$inputAttributes['type']"
                :required="$inputAttributes['required']" />
        @endif
    </div>
@endforeach
