{{-- Navigation Controls --}}
<div class="card card-body mb-2">
    <div class="d-flex justify-content-between align-items-center">
        <button
            wire:click="decrementSteps"
            type="button"
            class="btn btn-outline-secondary btn-sm"
            {{ $currentStep === 1 ? 'disabled' : '' }}
            wire:loading.attr="disabled"
            wire:loading.class="disabled"
        >
            <!-- Spinner (only visible while processing) -->
            <div wire:loading wire:target="decrementSteps" class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>

            <!-- Arrow icon (hidden while processing) -->
            <i wire:loading.remove wire:target="decrementSteps" class="bi bi-arrow-left me-1"></i>

            <span>Previous</span>
        </button>

        <div class="d-flex gap-2">
            {{-- Save Draft --}}
            <button
                type="button"
                wire:click="saveDraft"
                class="btn btn-outline-primary btn-sm"
                wire:loading.attr="disabled"
            >
                <i class="bi bi-save me-1"></i>
                Save Draft
            </button>

            {{-- Next Button --}}
            <x-forms.button
                wire:click="incrementSteps"
                type="button"
                class="btn btn-primary btn-sm {{ $currentStep === count($steps) ? 'd-none' : '' }}"
                wire:loading.attr="disabled"
            >
                <span>Next</span>

                <i wire:loading.remove wire:target="incrementSteps" class="bi bi-arrow-right ms-1"></i>

                <div wire:loading wire:target="incrementSteps" class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </x-forms.button>

            {{-- Submit Button --}}
            <button
                wire:click="incrementSteps"
                class="btn btn-primary btn-sm {{ $currentStep !== count($steps) ? 'd-none' : '' }}"
                wire:loading.attr="disabled"
            >
                <span>Submit</span>
                <i class="bi bi-upload ms-1"></i>
            </button>
        </div>
    </div>
</div>

