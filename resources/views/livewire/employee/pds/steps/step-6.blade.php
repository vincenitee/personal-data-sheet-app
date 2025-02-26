<x-card title="Voluntary Works" icon="bi-heart" loadingTarget="addVolWorkEntry()">

    @foreach ($voluntaryWorks as $index => $entry)
        @include('partials.count-indicator', ['count' => $index])

        @include('partials.form-fields', [
            'modelPrefix' => "voluntaryWorks.$index",
            'fields' => [
                [
                    'label' => 'Position',
                    'required' => false,
                    'placeholder' => 'e.g., Volunteer Teacher',
                ],
                [
                    'label' => 'Organization Name',
                    'required' => false,
                    'placeholder' => 'e.g., Red Cross Foundation',
                ],
                [
                    'label' => 'Organization Address',
                    'required' => false,
                    'placeholder' => 'e.g., 123 Main Street, City, Country',
                ],
                [
                    'label' => 'Date From',
                    'type' => 'date',
                    'required' => false,
                    'placeholder' => 'Select start date',
                ],
                [
                    'label' => 'Date To',
                    'type' => 'date',
                    'required' => false,
                    'placeholder' => 'Select end date',
                ],
                [
                    'label' => 'Total Hours',
                    'required' => false,
                    'placeholder' => 'e.g., 40 hours',
                ],
            ],
        ])

        <div class="col-12 text-end">
            <button
                type="button"
                @click="confirmDelete('voluntaryWorks', {{ $index }})"
                class="btn btn-outline-danger btn-sm"
                @if (count($voluntaryWorks) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach

    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllWorkEntry()" class="btn btn-outline-danger btn-sm"
                @if (count($voluntaryWorks) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addVolWorkEntry()" class="btn btn-primary btn-sm">
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
