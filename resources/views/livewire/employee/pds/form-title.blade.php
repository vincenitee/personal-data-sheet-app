<div class="card card-body mb-2">
    <div class="d-flex justify-content-between align-items-center">
        <p class="text-secondary mb-0 fs-5">{{ $this->getStepTitleProperty() }}</p>
        <span class="badge bg-primary">{{ $currentStep }} of {{ count($steps) }}</span>
    </div>
    <small class="text-muted italic">{{ $this->getDescriptionProperty() }}</small>
</div>
