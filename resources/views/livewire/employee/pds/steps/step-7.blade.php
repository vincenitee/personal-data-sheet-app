{{-- Entry Container --}}
<x-card title="Learning and Development" icon="bi-mortarboard" loadingTarget="addTrainingEntry()">
    @foreach ($trainings as $index => $entry)
        @include('partials.count-indicator', ['count' => $index])

        @include('partials.form-fields', [
            'modelPrefix' => "trainings.$index",
            'fields' => [
                [
                    'label' => 'Title',
                    'required' => false,
                ],
                [
                    'label' => 'Type',
                    'type' => 'select',
                    'options' => $trainingOptions, // Ensure this is passed correctly from the Livewire component
                    'required' => false,
                ],
                [
                    'label' => 'Sponsored By',
                    'required' => false,
                ],
                [
                    'label' => 'Date From',
                    'type' => 'date',
                    'required' => false,
                ],
                [
                    'label' => 'Date To',
                    'type' => 'date',
                    'required' => false,
                ],
                [
                    'label' => 'Total Hours',
                    'type' => 'number',
                    'required' => false,
                ],
                [
                    'label' => 'Certificate',
                    'type' => 'file',
                    'required' => false,
                ],
            ],
        ])

        {{-- Replace the current certificate preview with the file preview component --}}
        @if (!empty($entry['certificate_path']))
            <!-- Debug info -->
            <div class="alert alert-info">
                Path stored: {{ $entry['certificate_path'] }}<br>
                Full URL: {{ Storage::url($entry['certificate_path']) }}
            </div>

            @include('partials.file-preview', [
                'file' => $entry['certificate_path'],
                'title' => 'Certificate Document',
                'wireTarget' => "trainings.{$index}.certificate",
            ])
        @endif

        <div class="col-12 text-end">
            <button type="button" @click="confirmDelete('trainings', {{ $index }})"
                class="btn btn-outline-danger btn-sm" @if (count($trainings) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach

    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllTrainingEntry()" class="btn btn-outline-danger btn-sm"
                @if (count($trainings) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addTrainingEntry()" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    @endslot
</x-card>
