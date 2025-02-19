{{-- Entry Container --}}
<x-card title="Civil Service Eligibilities" icon="bi-award" loadingTarget="addEligibility()">

    @foreach ($eligibilities as $index => $eligibily)
        <div class="col-12 d-flex align-items-center">
            <!-- Badge -->
            <div class="badge bg-primary text-white rounded-circle">
                {{ $index + 1 }}
            </div>

            <!-- Separator -->
            <div class="flex-grow-1 border"></div>
        </div>
        @include('partials.form-fields', [
            'modelPrefix' => "eligibilities.$index",
            'fields' => [
                [
                    'label' => 'Career Service',
                    'placeholder' => 'Enter career service eligibility',
                    'required' => false,
                ],
                [
                    'label' => 'Ratings',
                    'type' => 'number',
                    'placeholder' => 'Enter rating (0-100)',
                    'required' => false,
                ],
                [
                    'label' => 'Exam Date',
                    'type' => 'date',
                    'placeholder' => 'Select exam date',
                    'required' => false,
                ],
                [
                    'label' => 'Exam Place',
                    'placeholder' => 'Enter location of examination',
                    'required' => false,
                ],
                [
                    'label' => 'License Number',
                    'type' => 'number',
                    'required' => false,
                    'placeholder' => 'Enter license number (if applicable)',
                ],
                [
                    'label' => 'License Validity',
                    'type' => 'date',
                    'required' => false,
                    'placeholder' => 'Select license validity date',
                ],
            ],
        ])


        <div class="col-12 text-end">
            <button type="button" wire:click="removeEligibility({{ $index }})" class="btn btn-outline-danger btn-sm"
                @if (count($eligibilities) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Remove Entry
            </button>
        </div>
    @endforeach
    @slot('footer')
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" wire:click="removeAllEligibilities()" class="btn btn-outline-danger btn-sm"
                @if (count($eligibilities) === 1) disabled @endif>
                <i class="bi bi-trash3-fill me-1"></i>
                Clear All Entries
            </button>
            <button type="button" wire:click="addEligibility()" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>
                Add Another Entry
            </button>
        </div>
    @endslot

</x-card>
