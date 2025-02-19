{{-- Spouse Information --}}
<x-card
    title="Spouse Information"
    icon="bi-people"
>
    @include('partials.form-fields', [
        'modelPrefix' => 'spouse',
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
            ],
            [
                'label' => 'Occupation',
            ],
            [
                'label' => 'Employer',
            ],
            [
                'label' => 'Business Address',
            ],
            [
                'label' => 'Telephone No',
            ],
        ]
    ])
</x-card>

{{-- Father Information --}}
<x-card
    title="Father Information"
    icon="bi-people"
>
    @include('partials.form-fields', [
        'modelPrefix' => 'father',
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
            ],
        ]
    ])
</x-card>

{{-- Mother Information --}}
<x-card
    title="Mother Information (Please enter your mother's maiden information)"
    icon="bi-people"
>
    @include('partials.form-fields', [
        'modelPrefix' => 'mother',
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
        ]
    ])
</x-card>

<x-card
    title="Children Information"
    icon="bi-people"
    loadingTarget="addChild"
>
    @foreach ($children as $index => $child)
        <div class="col-12 d-flex align-items-center">
            <!-- Badge -->
            <div class="badge bg-primary text-white rounded-circle">
                {{ $index + 1 }}
            </div>

            <!-- Separator -->
            <div class="flex-grow-1 border"></div>
        </div>

        @include('partials.form-fields',[
            'modelPrefix' => "children.$index",
            'fields' => [
                [
                    'label' => 'Full Name',
                    'placeholder' => 'Juan Dela Cruz Jr.',
                ],
                [
                    'label' => 'Birth Date',
                    'type' => 'date',
                ]
            ],
        ])

        <div class="col-12 text-end">
            <button type="button" wire:click="removeChild({{ $index }})"
                class="btn btn-outline-danger btn-sm" @if (count($children) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach
    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllChild()" class="btn btn-outline-danger btn-sm"
                @if (count($education['college']) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addChild()" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    @endslot
</x-card>
