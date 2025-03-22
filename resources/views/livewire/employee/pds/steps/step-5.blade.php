{{-- Entry Container --}}
<x-card title="Work Experiences" icon="bi-briefcase" loadingTarget="addWorkEntry()">
    @foreach ($workExperiences as $index => $workEntry)
        @include('partials.count-indicator', ['count' => $index])

        @include('partials.form-fields', [
            'modelPrefix' => "workExperiences.$index",
            'fields' => [
                [
                    'label' => 'Position',
                    'placeholder' => 'Enter job title (e.g., Software Engineer)',
                    'required' => false,
                ],
                [
                    'label' => 'Agency',
                    'placeholder' => 'Enter agency name (e.g., Department of Science and Technology)',
                    'required' => false,
                ],
                [
                    'label' => 'Salary',
                    'type' => 'number',
                    'required' => false,
                    'placeholder' => 'e.g., 50,000',
                ],
                [
                    'label' => 'Salary Grade',
                    'type' => 'select',
                    'options' => array_combine(range(1, 33), range(1, 33)), // Grades 1-33
                    'placeholder' => 'Select salary grade',
                    // 'disabled' => true,
                    'required' => false,
                ],
                [
                    'label' => 'Salary Step',
                    'type' => 'select',
                    'options' => array_combine(range(0, 8), range(0, 8)), // Steps 1-8
                    'placeholder' => 'Select salary step',
                    // 'disabled' => true,
                    'required' => false,
                ],
                [
                    'label' => 'Status',
                    'type' => 'select',
                    'options' => $employementStatusOptions,
                    'placeholder' => 'Select employment status',
                    'required' => false,
                ],
                [
                    'label' => 'Government Service',
                    'type' => 'select',
                    'options' => [
                        true => 'Yes',
                        false => 'No',
                    ],
                    'placeholder' => 'Select if government service',
                    'required' => false,
                ],
                [
                    'label' => 'Date From',
                    'type' => 'date',
                    'placeholder' => 'Select start date',
                    'required' => false,
                ],
                [
                    'label' => 'Date To',
                    'type' => 'date',
                    'placeholder' => 'Select end date or leave blank if current',
                    'required' => false,
                ],
            ],
        ])

        <div class="col-12 text-end">
            <button
                type="button"
                @click="confirmDelete('workExperiences', {{ $index }})"
                class="btn btn-outline-danger btn-sm"
                @if (count($workExperiences) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach

    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllWorkEntry()" class="btn btn-outline-danger btn-sm"
                @if (count($workExperiences) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addWorkEntry()" class="btn btn-primary btn-sm">
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
