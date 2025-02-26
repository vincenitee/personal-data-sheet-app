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

        {{-- Uploaded image preview --}}
        @if (!empty($entry['certificate']) && Storage::disk('public')->exists($entry['certificate']))
            @php
                $filePath = Storage::url($entry['certificate']);
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                $isImage = in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                $fileName = basename($entry['certificate']);
            @endphp

            <div class="card shadow-sm mt-3">
                <div class="card-header bg-light">
                    <h6 class="mb-0">
                        <i class="bi bi-file-earmark me-2"></i>Certificate Document
                    </h6>
                </div>
                <div class="card-body">
                    {{-- Loading Indicator --}}
                    <div class="d-flex justify-content-center align-items-center">
                        @include('partials.loading', ['target' => "trainings.{{ $index }}.certificate", 'message' => 'Uploading document'])
                        <div wire:loading wire:target="trainings.{{ $index }}.certificate"
                            class="text-center mb-3">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Uploading file...</p>
                        </div>
                    </div>

                    {{-- File Preview --}}
                    <div wire:loading.remove wire:target="trainings.{{ $index }}.certificate">
                        @if ($isImage)
                            <div class="text-center mb-3">
                                <img src="{{ $filePath }}" alt="Certificate Preview" class="img-fluid rounded"
                                    style="max-width: 300px; max-height: 300px; object-fit: contain;">
                            </div>
                        @else
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-file-earmark-text fs-2 me-3 text-secondary"></i>
                                <div>
                                    <h6 class="mb-1">{{ $fileName }}</h6>
                                    <small class="text-muted text-uppercase">{{ strtoupper($fileExtension) }}
                                        File</small>
                                </div>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="bi bi-paperclip me-1"></i>Uploaded Certificate
                            </span>
                            {{-- Download Button --}}
                            <a href="{{ $filePath }}" download="{{ $fileName }}"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
