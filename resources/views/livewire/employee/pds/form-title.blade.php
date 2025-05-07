<div class="card border-0 shadow-sm mb-3">
    <!-- Status banner at the top when not draft -->
    @php
        $status = $entry?->status ?? 'draft';
        $statusColor = match ($status) {
            'approved' => 'success',
            'needs_revision' => 'danger',
            'under_review' => 'warning',
            default => 'secondary',
        };
        $statusIcon = match ($status) {
            'approved' => 'bi-check-circle',
            'needs_revision' => 'bi-exclamation-triangle',
            'under_review' => 'bi-hourglass-split',
            default => 'bi-pencil-square',
        };
    @endphp

    @if ($status !== 'draft')
        <div
            class="card-header bg-{{ $statusColor }} bg-opacity-10 border-{{ $statusColor }} d-flex justify-content-between align-items-center py-2">
            <div class="d-flex align-items-center">
                <i class="bi {{ $statusIcon }} text-{{ $statusColor }} me-2"></i>
                <span class="fw-medium">Status: <span
                        class="fw-bold">{{ Str::title(str_replace('_', ' ', $status)) }}</span></span>
            </div>
            @if ($status === 'needs_revision')
                <button class="btn btn-sm btn-outline-{{ $statusColor }} d-inline-flex align-items-center gap-1"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#commentsOffcanvas">
                    <i class="bi bi-chat-square-text"></i>
                    <span>View Comments</span>
                    @if (count($comments) > 0)
                        <span class="badge bg-{{ $statusColor }}">{{ count($comments) }}</span>
                    @endif
                </button>
            @endif
        </div>
    @endif

    <div class="card-body">
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


        @if ($status === 'needs_revision' && $status !== 'draft')
            <!-- Progress bar with improved styling -->
            <div class="mt-3">
                <div class="d-flex justify-content-between align-items-center mb-1 small">
                    <span class="text-muted">Progress</span>
                    <span class="text-primary fw-medium">{{ round(($currentStep / count($steps)) * 100) }}%</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-primary" role="progressbar"
                        style="width: {{ ($currentStep / count($steps)) * 100 }}%"
                        aria-valuenow="{{ ($currentStep / count($steps)) * 100 }}" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-end">
                <button @click="confirmSubmission()" type="button"
                    class="btn btn-sm btn-success d-inline-flex align-items-center gap-2" wire:loading.attr="disabled">
                    <span>Re-submit</span>
                    <div wire:loading wire:target="incrementSteps" class="spinner-border spinner-border-sm"
                        role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <i wire:loading.remove wire:target="incrementSteps" class="bi bi-check-lg"></i>
                </button>
            </div>
        @endif
    </div>
</div>
