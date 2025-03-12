<div class="row g-2">
    {{-- Form Sections --}}
    @if (in_array($status, [null, 'draft', 'needs_revision']))
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

        @if ($status === 'needs_revision')
            <div class="offcanvas offcanvas-end" tabindex="-1" id="commentsOffcanvas"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">
                        Revision Comments <span class="badge bg-primary rounded-pill">{{ $comments->count() }}</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-3">
                    @php
                        $sectionSteps = [
                            'personal_information' => 1,
                            'family_background' => 2,
                            'educational_background' => 3,
                            'civil_service_eligibility' => 4,
                            'work_experience' => 5,
                            'voluntary_work' => 6,
                            'learning_and_development' => 7,
                            'other_information' => 8,
                            'additional_questions' => 9,
                            'attachments' => 10,
                        ];

                        // Sort comments based on section order
                        $sortedComments = $comments->sortBy(fn($comment) => $sectionSteps[$comment->section] ?? 999);

                        // Group comments by section
                        $groupedComments = $sortedComments->groupBy('section');
                    @endphp

                    @if ($comments->isEmpty())
                        <div class="alert alert-info">
                            No comments have been added yet.
                        </div>
                    @else
                        <div class="accordion" id="commentsAccordion">
                            @foreach ($groupedComments as $section => $sectionComments)
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#section{{ $loop->index }}">
                                            {{ ucwords(str_replace('_', ' ', $section)) }}
                                            <span class="badge bg-secondary ms-2">{{ $sectionComments->count() }}</span>
                                        </button>
                                    </h2>
                                    <div id="section{{ $loop->index }}" class="accordion-collapse collapse show"
                                        data-bs-parent="#commentsAccordion">
                                        <div class="accordion-body p-0">
                                            <div class="list-group list-group-flush">
                                                @foreach ($sectionComments as $comment)
                                                    <div class="list-group-item py-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <div>
                                                                <span class="badge bg-primary me-2">Admin</span>
                                                                <span
                                                                    class="fw-bold">{{ $comment->admin->first_name ?? 'Unknown Admin' }}</span>
                                                            </div>
                                                            <small
                                                                class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                        </div>
                                                        <div
                                                            class="border-start border-4 border-primary ps-3 py-2 bg-light rounded mb-2">
                                                            {{ $comment->comment }}
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <a wire:click="jumpToStep({{ $sectionSteps[$comment->section] }})"
                                                                class="btn btn-sm btn-outline-primary"
                                                                data-bs-dismiss="offcanvas">
                                                                Go to section
                                                            </a>
                                                            <small
                                                                class="text-muted">{{ $comment->created_at->format('M d, Y g:i A') }}</small>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @elseif ($status === 'under_review')
        <div class="card shadow-sm mb-4">
            <div
                class="card-header bg-warning bg-opacity-10 border-warning border-opacity-25 d-flex align-items-center">
                <i class="bi bi-hourglass-split text-warning me-2"></i>
                <h6 class="card-title">Your Submission is Under Review</h6>
            </div>
            <div class="card-body p-3">
                <div class="d-flex flex-column flex-md-row">
                    <div class="d-flex align-items-start me-md-4 mb-3 mb-md-0">
                        <div class="me-3">
                            <i class="bi bi-calendar-event text-info fs-3"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-1">Review in Progress</h6>
                            <p class="card-text mb-0">
                                Your submission is currently being reviewed by the admin. Please allow
                                <span class="fw-semibold">24-48 hours</span> for processing.
                            </p>
                            <small class="text-muted">
                                <i class="bi bi-info-circle-fill me-1"></i>
                                You will be notified once the review is complete.
                            </small>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-start align-items-md-end ms-md-auto mt-3 mt-md-0">
                        <p class="text-warning mb-2">
                            <i class="bi bi-exclamation-circle me-1"></i> You cannot edit your PDS entry at this time.
                        </p>
                        <div class="d-flex flex-column btn-lg-group gap-2 align-self-center w-100">
                            <a href="{{ url(route('employee.submission.logs')) }}"
                                class="btn btn-sm btn-primary w-100">
                                <i class="bi bi-clock me-1"></i> View Submission Logs
                            </a>
                            <a href="{{ url(route('employee.dashboard')) }}"
                                class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-grid me-1"></i> Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card shadow-sm mb-4">
            <div
                class="card-header bg-success bg-opacity-10 border-success border-opacity-25 d-flex align-items-center">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <h5 class="card-title">Entry Approved</h5>
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
                            <a href="{{ url(route('employee.preview.entry')) }}" class="btn btn-sm btn-primary w-100">
                                <i class="bi bi-printer me-1"></i>Print PDS
                            </a>
                            <a href="{{ url(route('employee.preview.entry')) }}" class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-download me-1"></i>Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
