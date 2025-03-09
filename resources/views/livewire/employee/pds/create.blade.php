<div class="row g-2">
    {{-- Form Sections --}}
    @if (!isset($nextUpdateAllowedAt))
        <div class="col-lg-3">
            @include('livewire.employee.pds.form-sections')
        </div>

        {{-- Input Section --}}
        <div class="col-lg-9">
            <x-forms.form wire:submit="save" method="POST">
                {{-- Title --}}
                @include('livewire.employee.pds.form-title')

                {{-- Form Content --}}
                @include("livewire.employee.pds.steps.step-{$currentStep}")

                {{-- Form Navigation --}}
                @include('livewire.employee.pds.form-navigation')
            </x-forms.form>
        </div>
    @else
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success bg-opacity-10 border-success border-opacity-25 d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <h5 class="card-title mb-0">Entry Approved</h5>
            </div>
            <div class="card-body p-3">
                <div class="d-flex flex-column flex-md-row">
                    <div class="d-flex align-items-start me-md-4 mb-3 mb-md-0">
                        <div class="me-3">
                            <i class="bi bi-calendar-event text-info fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-1">Next Update Available</h6>
                            <p class="card-text mb-0">
                                <span class="fw-semibold">{{ $nextUpdateAllowedAt->format('F j, Y - g:i A') }}</span>
                            </p>
                            <small class="text-muted">
                                <i class="bi bi-info-circle-fill me-1"></i>
                                You can update your PDS entry again after this date and time.
                            </small>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-start align-items-md-end ms-md-auto mt-3 mt-md-0">
                        <p class="text-success mb-2"><i class="bi bi-clipboard-check me-1"></i>Your PDS entry has been
                            approved</p>
                        <div class="d-flex flex-column btn-lg-group gap-2 align-self-center w-100">
                            <a href="{{ url(route('print')) }}" class="btn btn-sm btn-primary w-100">
                                <i class="bi bi-printer me-1"></i>Print PDS
                            </a>
                            <a href="{{ url(route('print')) }}"
                                class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-download me-1"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
