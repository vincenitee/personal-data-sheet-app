<!-- Form Navigation -->
<div x-data="{
    scrollToActive() {
        this.$nextTick(() => {
            let activeStep = this.$refs.activeStep;
            if (activeStep) {
                activeStep.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }
        });
    }
}" x-init="scrollToActive()" class="card shadow-sm sticky-top bg-white border-0"
    style="top: 93px; z-index: 1020;">

    <div class="card-header bg-light py-2 px-3">
        <div class="row align-items-center">
            <div class="col">
                <h6 class="card-title mb-0 fw-bold text-primary">
                    <i class="bi bi-list-check me-2"></i>Form Section
                </h6>
            </div>
            <div class="col-auto">
                <!-- Status Messages -->
                <div class="d-flex align-items-center">
                    <div wire:loading wire:target="saveDraft()">
                        <div class="spinner-border spinner-border-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <small class="text-muted ms-2">Saving...</small>
                    </div>
                    @if (session('flash'))
                        <div wire:loading.remove wire:target="saveDraft()"
                            class="badge bg-{{ session('flash.status') !== 'success' ? 'warning' : 'success' }} text-white">
                            {{ session('flash.message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-2">
        <!-- Mobile Navigation -->
        <div class="d-md-none">
            <div class="position-relative">
                <nav class="nav nav-pills flex-nowrap overflow-auto pb-2" x-ref="navContainer">
                    @foreach ($steps as $index => $step)
                        <div class="nav-item me-2">
                            <button wire:click="jumpToStep({{ $index }})"
                                class="nav-link d-inline-flex align-items-center rounded-pill btn-sm
                                    {{ $currentStep === $index ? 'active bg-primary' :
                                        ($index <= $highestStepReached ? 'text-body' : 'text-muted bg-light') }}"
                                @if ($index > $highestStepReached)
                                    disabled
                                    style="opacity: 0.65; cursor: not-allowed; position: relative;"
                                @endif
                                wire:loading.attr="disabled"
                                x-ref="{{ $currentStep === $index ? 'activeStep' : '' }}"
                                @click="scrollToActive()">
                                <i class="{{ $stepIcons[$index] }} me-2
                                    {{ $index > $highestStepReached ? 'text-secondary' : '' }}"></i>
                                <span class="text-truncate" style="max-width: 100px;">{{ $step }}</span>
                                @if ($index > $highestStepReached)
                                    <i class="bi bi-lock-fill ms-1 text-secondary" style="font-size: 0.7rem;"></i>
                                @elseif ($index < $currentStep)
                                    <i class="bi bi-check-circle-fill ms-1 text-success" style="font-size: 0.7rem;"></i>
                                @endif
                                <div wire:loading wire:target="jumpToStep({{ $index }})"
                                    class="spinner-border spinner-border-sm ms-2"></div>
                            </button>
                        </div>
                    @endforeach
                </nav>
            </div>
        </div>

        <!-- Desktop Navigation -->
        <div class="d-none d-md-block">
            <div class="list-group list-group-flush" x-ref="listGroup">
                @foreach ($steps as $index => $step)
                    <button wire:click="jumpToStep({{ $index }})"
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2 px-3 border-0 rounded
                            {{ $currentStep === $index ? 'active bg-primary text-white' :
                                ($index <= $highestStepReached ? '' : 'bg-light text-muted') }}"
                        @if ($index > $highestStepReached)
                            disabled
                            style="opacity: 0.75; cursor: not-allowed; position: relative;"
                        @endif
                        wire:loading.attr="disabled"
                        x-ref="{{ $currentStep === $index ? 'activeStep' : '' }}"
                        @click="scrollToActive()">
                        <div class="d-flex align-items-center">
                            <i class="{{ $stepIcons[$index] }} me-2
                                {{ $index > $highestStepReached && $currentStep !== $index ? 'text-secondary' : '' }}"></i>
                            <span class="fw-medium">{{ $step }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            @if ($currentStep === $index)
                                <span class="badge bg-white text-primary me-2">Current</span>
                            @elseif ($index < $currentStep)
                                <span class="badge bg-success text-white me-2">Completed</span>
                            @elseif ($index > $highestStepReached)
                                <span class="badge bg-secondary text-white me-2">
                                    <i class="bi bi-lock-fill me-1"></i>Locked
                                </span>
                            @endif
                            <div wire:loading wire:target="jumpToStep({{ $index }})"
                                class="spinner-border spinner-border-sm"></div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>