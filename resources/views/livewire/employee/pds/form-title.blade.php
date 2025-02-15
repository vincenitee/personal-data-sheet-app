<div class="card card-body mb-3 shadow-sm">
    <div class="d-flex justify-content-between align-items-center">
        <p class="text-secondary mb-0 fs-4 fw-bold">{{ $this->getStepTitle() }}</p>
        <span class="badge bg-primary rounded-pill px-3 py-2">{{ $currentStep }} of {{ count($steps) }}</span>
    </div>

    <small class="text-muted d-block mt-1 fw-medium">{{ $this->getStepDescription() }}</small>

    <div class="mt-2 p-2 bg-light rounded border-start border-4 border-primary">
        <small class="text-secondary fw-bold fst-italic">
            (<span class="text-danger">*</span>) Required fields. Fields without this mark can be leaved as blank.
        </small>
    </div>
</div>
