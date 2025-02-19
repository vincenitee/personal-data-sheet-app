    {{-- Basic Information --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
            ],
            [
                'label' => 'Weight',
                'type' => 'number',
            ],
            [
                'label' => 'Blood Type',
                'type' => 'select',
                'options' => ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
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

