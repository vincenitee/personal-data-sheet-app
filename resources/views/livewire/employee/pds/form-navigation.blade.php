<!-- Navigation Controls -->
<div class="card shadow-sm mb-3">
    <div class="card-body p-3">
        <div class="d-flex justify-content-between align-items-center gap-3">
            <!-- Previous Button -->
            <button
                wire:click="decrementSteps"
                type="button"
                class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-2"
                {{ $currentStep === 1 ? 'disabled' : '' }}
                wire:loading.attr="disabled"
            >
                <div wire:loading wire:target="decrementSteps" class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <i wire:loading.remove wire:target="decrementSteps" class="bi bi-chevron-left"></i>
                <span>Previous</span>
            </button>

            <!-- Progress Indicator -->
            <div class="d-none d-md-flex align-items-center gap-2">
                <div class="progress flex-grow-1" style="width: 100px; height: 8px;">
                    <div
                        class="progress-bar bg-primary"
                        role="progressbar"
                        style="width: {{ ($currentStep / count($steps)) * 100 }}%"
                        aria-valuenow="{{ ($currentStep / count($steps)) * 100 }}"
                        aria-valuemin="0"
                        aria-valuemax="100"
                    ></div>
                </div>
                <small class="text-muted">Step {{ $currentStep }} of {{ count($steps) }}</small>
            </div>

            <!-- Action Buttons Group -->
            <div class="btn-group">
                <!-- Save Draft Button -->
                <button
                    type="button"
                    wire:click="saveDraft"
                    class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-2"
                    wire:loading.attr="disabled"
                >
                    <div wire:loading wire:target="saveDraft" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <i wire:loading.remove wire:target="saveDraft" class="bi bi-save"></i>
                    <span>Save Draft</span>
                </button>

                <!-- Next Button -->
                <button
                    wire:click="incrementSteps"
                    type="button"
                    class="btn btn-sm btn-primary d-inline-flex align-items-center gap-2 {{ $currentStep === count($steps) ? 'd-none' : '' }}"
                    wire:loading.attr="disabled"
                >
                    <span>Next</span>
                    <div wire:loading wire:target="incrementSteps" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <i wire:loading.remove wire:target="incrementSteps" class="bi bi-chevron-right"></i>
                </button>

                <!-- Submit Button -->
                <button
                    @click="confirmSubmission()"
                    type="button"
                    class="btn btn-sm btn-success d-inline-flex align-items-center gap-2 {{ $currentStep !== count($steps) ? 'd-none' : '' }}"
                    wire:loading.attr="disabled"
                >
                    <span>Submit Entry</span>
                    <div wire:loading wire:target="incrementSteps" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <i wire:loading.remove wire:target="incrementSteps" class="bi bi-check-lg"></i>
                </button>
            </div>
        </div>
    </div>
</div>
