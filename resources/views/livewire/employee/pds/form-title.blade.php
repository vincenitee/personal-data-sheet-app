<div class="card border-0 shadow-sm mb-3">
    <div class="card-body">
        {{-- {{ $status }} --}}
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-start gap-3">
            <div class="flex-grow-1">
                <div class="d-flex align-items-center gap-2">
                    <h2 class="h5 text-dark mb-0 fw-bold">{{ $this->getStepTitle() }}</h2>
                    <div class="vr d-none d-sm-block"></div>
                    <span class="badge bg-primary rounded-pill d-none d-sm-inline-block">
                        Step {{ $currentStep }} of {{ count($steps) }}
                    </span>
                </div>
                <p class="text-muted small mb-0 mt-2">{{ $this->getStepDescription() }}</p>
            </div>

            <!-- Mobile-only step indicator -->
            <span class="badge bg-primary rounded-pill d-sm-none">
                {{ $currentStep }}/{{ count($steps) }}
            </span>
        </div>

        <!-- Required Fields Notice -->
        <div class="mt-3">
            <div class="alert alert-light d-flex align-items-center gap-2 mb-0 py-2">
                <i class="bi bi-info-circle text-primary"></i>
                <div class="small">
                    <span class="fw-medium">Required fields are marked with </span>
                    <span class="text-danger fw-bold">*</span>
                    <span class="text-secondary">
                        • Other fields are optional
                    </span>
                </div>
            </div>
        </div>

        <!-- Progress bar (optional, uncomment if needed) -->
        <div class="progress mt-3" style="height: 4px;">
            <div class="progress-bar bg-primary" role="progressbar"
                style="width: {{ ($currentStep / count($steps)) * 100 }}%"
                aria-valuenow="{{ ($currentStep / count($steps)) * 100 }}" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>

        @if ($status === 'needs_revision')
            <div class="mt-3">
                <button class="btn btn-primary btn-sm float-end" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#commentsOffcanvas">
                    <i class="bi bi-chat-square-text me-1"></i> View Comments <span
                        class="badge bg-danger ms-1">{{ count($comments) }}</span>
                </button>
            </div>
        @endif
    </div>
</div>
