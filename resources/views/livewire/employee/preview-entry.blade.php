
<div class="card card-body p-0 shadow border-0 overflow-hidden">
    @if ($pdsEntry)
        <!-- Header with improved styling -->
        <div class="bg-light border-bottom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-primary fw-bold d-flex align-items-center">
                    <i class="bi bi-file-text me-2"></i>
                    Form Preview
                </h5>

                <div class="d-flex gap-2">
                    <a href="{{ route('pds.print', $pdsEntry->id) }}" class="btn btn-primary px-3">
                        <i class="bi bi-printer me-2"></i>
                        Print
                    </a>
                    {{-- <div class="dropdown">
                        <button type="button" class="btn btn-outline-success dropdown-toggle px-3"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-download me-2"></i>
                            Export
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-light" style="z-index: 9999">
                            <li><a class="dropdown-item d-flex align-items-center py-2" wire:click="exportToPdf()">
                                    <i class="bi bi-file-earmark-pdf me-2 text-danger"></i>Export as PDF
                                </a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Improved page navigation with sticky behavior -->
        <div class="bg-white sticky-top border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 fw-normal">
                <i class="bi bi-layers me-1"></i>Page {{ $currentStep }} of 4
            </span>

            <ul class="pagination pagination-sm mb-0">
                <li class="page-item {{ $currentStep === 1 ? 'active' : '' }}">
                    <button type="button" class="page-link rounded-start fw-medium" wire:click="jumpToSection(1)">
                        <span wire:loading.remove wire:target="jumpToSection(1)">1</span>
                        <span wire:loading wire:target="jumpToSection(1)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
                <li class="page-item {{ $currentStep === 2 ? 'active' : '' }}">
                    <button type="button" class="page-link fw-medium" wire:click="jumpToSection(2)">
                        <span wire:loading.remove wire:target="jumpToSection(2)">2</span>
                        <span wire:loading wire:target="jumpToSection(2)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
                <li class="page-item {{ $currentStep === 3 ? 'active' : '' }}">
                    <button type="button" class="page-link fw-medium" wire:click="jumpToSection(3)">
                        <span wire:loading.remove wire:target="jumpToSection(3)">3</span>
                        <span wire:loading wire:target="jumpToSection(3)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
                <li class="page-item {{ $currentStep === 4 ? 'active' : '' }}">
                    <button type="button" class="page-link rounded-end fw-medium" wire:click="jumpToSection(4)">
                        <span wire:loading.remove wire:target="jumpToSection(4)">4</span>
                        <span wire:loading wire:target="jumpToSection(4)" class="spinner-border spinner-border-sm"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </li>
            </ul>
        </div>

        <!-- Content container with better spacing and subtle design -->
        <div class="p-4">
            <div class="bg-light bg-opacity-50 p-4 rounded-3 border border-light scalable-container">
                {{-- Form Preview --}}
                @switch($currentStep)
                    @case(1)
                        @livewire('print.sections.c1', ['pdsEntry' => $pdsEntry])
                    @break

                    @case(2)
                        @livewire('print.sections.c2', ['pdsEntry' => $pdsEntry])
                    @break

                    @case(3)
                        @livewire('print.sections.c3', ['pdsEntry' => $pdsEntry])
                    @break

                    @case(4)
                        @livewire('print.sections.c4', ['pdsEntry' => $pdsEntry])
                    @break

                    @default
                @endswitch
            </div>
        </div>

        <!-- Footer navigation with improved styling -->
        <div class="bg-light border-top p-3 d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-outline-secondary px-3 {{ $currentStep === 1 ? 'disabled' : '' }}"
                wire:click="jumpToSection({{ $currentStep - 1 }})" wire:loading.attr="disabled"
                wire:target="jumpToSection({{ $currentStep - 1 }})" {{ $currentStep === 1 ? 'disabled' : '' }}>
                <span wire:loading.remove wire:target="jumpToSection({{ $currentStep - 1 }})">
                    <i class="bi bi-arrow-left me-2"></i>Previous
                </span>
                <span wire:loading wire:target="jumpToSection({{ $currentStep - 1 }})">
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Loading...
                </span>
            </button>

            <button type="button" class="btn btn-primary px-3 {{ $currentStep === 4 ? 'disabled' : '' }}"
                wire:click="jumpToSection({{ $currentStep + 1 }})" wire:loading.attr="disabled"
                wire:target="jumpToSection({{ $currentStep + 1 }})" {{ $currentStep === 4 ? 'disabled' : '' }}>
                <span wire:loading.remove wire:target="jumpToSection({{ $currentStep + 1 }})">
                    Next<i class="bi bi-arrow-right ms-2"></i>
                </span>
                <span wire:loading wire:target="jumpToSection({{ $currentStep + 1 }})">
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Loading...
                </span>
            </button>
        </div>
    @else
        <!-- Improved empty state -->
        <div class="p-5">
            <div class="text-center py-5">
                <div class="mb-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto"
                        style="width: 90px; height: 90px;">
                        <i class="bi bi-file-earmark-x text-primary fs-1"></i>
                    </div>
                </div>

                <h4 class="fw-bold mb-3">Print Action Unavailable</h4>
                <p class="text-muted mb-1 fs-6">You don't have an approved PDS entry at the moment.</p>
                <p class="text-muted mb-4 fs-6">Please wait for your submission to be reviewed or create a new entry.
                </p>

                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                    <a href="{{ url(route('employee.submission.logs')) }}" class="btn btn-primary px-4">
                        <i class="bi bi-clipboard-check me-2"></i>Check Submission Status
                    </a>
                    <a href="{{ url(route('employee.pds.create')) }}" class="btn btn-outline-primary px-4">
                        <i class="bi bi-file-earmark-plus me-2"></i>Create New Entry
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
