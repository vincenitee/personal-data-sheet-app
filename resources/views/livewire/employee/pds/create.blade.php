<div class="row g-2">

    {{-- Form Navigation --}}
    <div class="col-lg-2">
        <div class="card shadow-sm sticky-top" style="top: 93px;">
            <div class="card-body p-3">
                <h6 class="text-secondary mb-3">Form Sections</h6>
                <nav class="nav nav-pills flex-column gap-2">
                    @foreach ($steps as $index => $step)
                        <button wire:click="jumpToStep({{ $index }})"
                            class="nav-link border text-start {{ $currentStep === $index ? 'active' : '' }} d-flex align-items-center"
                            @if ($currentStep < $index) disabled @endif>
                            <span>{{ $step }}</span>
                        </button>
                    @endforeach
                </nav>
            </div>
        </div>
    </div>


    {{-- Input Section --}}
    <div class="col-lg-10">
        <x-forms.form method="POST">
            {{-- Title --}}
            <div class="card card-body mb-2">
                <p class="text-secondary mb-0 fs-5">{{ $this->getStepTitleProperty() }}</p>
                <small class="text-muted">{{ $this->getDescriptionProperty() }}</small>
            </div>

            {{-- Form Content --}}
            @include("livewire.employee.pds.steps.step-{$currentStep}")

            {{-- Navigation Controls --}}
            <div class="card card-body mb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <button
                        type="button"
                        wire:click="decrementSteps"
                        class="btn btn-outline-secondary btn-sm"
                        @if($currentStep === 1) disabled @endif
                    >
                        <div wire:loading wire:dirty wire:target="decrementSteps" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        <i class="bi bi-arrow-left me-1"></i>
                        Previous

                    </button>

                    <div class="d-flex gap-2">
                        <button
                            type="button"
                            wire:click="saveDraft"
                            class="btn btn-outline-primary btn-sm"
                        >
                            <i class="bi bi-save me-1"></i>
                            Save Draft
                        </button>

                        {{-- Next Button --}}
                        <button
                            type="button"
                            wire:click="incrementSteps"
                            class="btn btn-primary btn-sm {{ $currentStep === $totalSteps ? 'd-none' : '' }}"
                        >
                            Next
                            <i class="bi bi-arrow-right ms-1"></i>

                            <div wire:loading wire:dirty wire:target="incrementSteps" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>

                        {{-- Submit Button --}}
                        <button
                            wire:click="incrementSteps"
                            class="btn btn-primary btn-sm {{ $currentStep !== $totalSteps ? 'd-none' : '' }}"
                        >
                            Submit
                            <i class="bi bi-upload ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </x-forms.form>
    </div>
</div>
