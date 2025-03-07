{{-- Basic Information --}}

{{-- @dump($bloodTypeOptions) --}}
<x-card
    title="Basic Information"
    icon="bi-person"

>
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'First Name',
            ],
            [
                'label' => 'Middle Name',
                'required' => false,
            ],
            [
                'label' => 'Last Name',
            ],
            [
                'label' => 'Suffix',
                'required' => false,
            ],
            [
                'label' => 'Birth Date',
                'type' => 'date',
            ],
            [
                'label' => 'Birth Place',
            ],
            [
                'label' => 'Sex',
                'type' => 'select',
                'options' => $sexOptions,
            ],
            [
                'label' => 'Civil Status',
                'type' => 'select',
                'options' => $civilStatusOptions,
            ],
            [
                'label' => 'Height',
                'type' => 'number',
                'placeholder' => 'Enter your height in meters'
            ],
            [
                'label' => 'Weight',
                'type' => 'number',
                'placeholder' => 'Enter your weight in kilograms'
            ],
            [
                'label' => 'Blood Type',
                'type' => 'select',
                'options' => $bloodTypeOptions,
                'required' => false,
            ],
        ]
    ])
</x-card>

{{-- Identifiers --}}
<x-card
    title="Identification"
    icon="bi-card-list"
>
    @include('partials.form-fields', [
        'modelPrefix' => 'identifiers',
        'fields' => [
            [
                'label' => 'GSIS',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'PAGIBIG',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'PHILHEALTH',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'SSS',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'TIN',
                'type' => 'number',
                'required' => false,
            ],
            [
                'label' => 'AGENCY',
                'type' => 'number',
                'required' => false,
            ],
        ]
    ])
</x-card>


{{-- Nationality --}}
<livewire:forms.nationality-picker>

{{-- Addresses --}}
<livewire:forms.address-picker>

<x-card
    title="Contact Information"
    icon="bi-telephone"
>
    @include('partials.form-fields', [
        'modelPrefix' => '',
        'fields' => [
            [
                'label' => 'Telephone No',
                'required' => false,
            ],
            [
                'label' => 'Mobile No',
                'type' => 'number',
            ],
            [
                'label' => 'Email',
                'type' => 'email',
            ],
        ]
    ])
</x-card>

