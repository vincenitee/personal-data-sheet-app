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
                'required' => false,
            ],
            [
                'label' => 'Middle Name',
                'required' => false,
            ],
            [
                'label' => 'Last Name',
                'required' => false,
            ],
            [
                'label' => 'Suffix',
                'required' => false,
            ],
            [
                'label' => 'Occupation',
                'required' => false,
            ],
            [
                'label' => 'Employer',
                'required' => false,
            ],
            [
                'label' => 'Business Address',
                'required' => false,
            ],
            [
                'label' => 'Telephone No',
                'required' => false,
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
                'required' => false,
            ],
            [
                'label' => 'Last Name',
            ],
            [
                'label' => 'Suffix',
                'required' => false,
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
                'required' => false,
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
                    'required' => false,
                ],
                [
                    'label' => 'Birth Date',
                    'type' => 'date',
                    'required' => false,
                ]
            ],
        ])

        <div class="col-12 text-end">
            <button
                type="button"
                @click="confirmDelete('children', {{ $index }})"
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

{{-- @push('scripts')
    <script>
        function confirmDelete(type, index){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.isConfirmed){
                    Livewire.dispatch('removeEntry', {type: type, index: index})
                }
            });
        }
    </script>
@endpush

@script
    <script>
        $wire.on('show-alert', (data) => {
            Swal.fire(data[0])
        })
    </script>
@endscript --}}
