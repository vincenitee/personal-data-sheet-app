<div class="card card-body p-4 shadow-sm border-light">
    @if ($pdsEntry)
        <!-- Action Bar with improved spacing and organization -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0 text-primary fw-bold">Form Preview</h5>

            <div class="d-flex gap-2">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-printer me-1"></i>
                        Print
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-file-earmark-text me-2 text-muted"></i>Page 1</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-file-earmark-text me-2 text-muted"></i>Page 2</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-file-earmark-text me-2 text-muted"></i>Page 3</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-file-earmark-text me-2 text-muted"></i>Page 4</a></li>
                    </ul>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-download me-1"></i>
                        Export
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-file-earmark-pdf me-2 text-danger"></i>PDF</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="my-3">

        <!-- Navigation with cleaner design -->
        <nav aria-label="Page navigation" class="d-flex justify-content-between align-items-center mb-4">
            <span class="badge bg-light text-dark border px-3 py-2"><i class="bi bi-layers me-1"></i>Pages</span>

            <ul class="pagination pagination-md-sm mb-0">
                <li class="page-item {{ $currentStep === 1 ? 'active' : '' }}">
                    <button type="button" class="page-link rounded-start" wire:click="jumpToSection(1)">
                        <span wire:loading.remove wire:target="jumpToSection(1)">1</span>
                        <span wire:loading wire:target="jumpToSection(1)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
                <li class="page-item {{ $currentStep === 2 ? 'active' : '' }}">
                    <button type="button" class="page-link" wire:click="jumpToSection(2)">
                        <span wire:loading.remove wire:target="jumpToSection(2)">2</span>
                        <span wire:loading wire:target="jumpToSection(2)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
                <li class="page-item {{ $currentStep === 3 ? 'active' : '' }}">
                    <button type="button" class="page-link" wire:click="jumpToSection(3)">
                        <span wire:loading.remove wire:target="jumpToSection(3)">3</span>
                        <span wire:loading wire:target="jumpToSection(3)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
                <li class="page-item {{ $currentStep === 4 ? 'active' : '' }}">
                    <button type="button" class="page-link rounded-end" wire:click="jumpToSection(4)">
                        <span wire:loading.remove wire:target="jumpToSection(4)">4</span>
                        <span wire:loading wire:target="jumpToSection(4)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
            </ul>
        </nav>

        <!-- Content container with subtle background -->
        <div class="bg-light bg-opacity-50 p-3 rounded-3 mb-3">
            {{-- Form Preview --}}
            @switch($currentStep)
                @case(1)
                    @livewire('print.sections.c1', [
                        'personalInformation' => $pdsEntry?->personalInformation,
                    ])
                @break

                @case(2)
                    @livewire('print.sections.c1', [
                        'personalInformation' => $pdsEntry?->personalInformation,
                    ])
                @break

                @case(3)
                    @livewire('print.sections.c1', [
                        'personalInformation' => $pdsEntry?->personalInformation,
                    ])
                @break

                @case(4)
                    @livewire('print.sections.c1', [
                        'personalInformation' => $pdsEntry?->personalInformation,
                    ])
                @break

                @default
            @endswitch
        </div>
    @else
        <div class="card border-light shadow-sm rounded-3">
            <div class="card-body text-center p-4">
                <div class="d-flex justify-content-center mb-3">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 70px; height: 70px;">
                        <i class="bi bi-hourglass-split text-primary fs-1"></i>
                    </div>
                </div>

                <h4 class="card-title mb-3">Print Action Unavailable</h4>
                <p class="card-text text-muted mb-3">You don't have an approved PDS entry at the moment.</p>
                <p class="card-text text-muted mb-4">Please wait for your submission to be reviewed or create a new entry if you haven't done so.</p>

                <div class="d-grid gap-2 col-md-7 mx-auto">
                    <a href="{{ url(route('employee.submission.logs')) }}" class="btn btn-primary text-white">
                        <i class="bi bi-clipboard-check me-2"></i>Check Submission Status
                    </a>
                    <a href="{{ url(route('employee.pds.create')) }}" class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-plus me-2"></i>Create New Entry
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
