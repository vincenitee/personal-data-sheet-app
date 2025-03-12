<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- PDS Status Card -->
        <div class="col-md-6">
            <div class="dashboard-card card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle p-2 me-3">
                                <i class="bi bi-file-earmark-person text-primary fs-4"></i>
                            </div>
                            <h5 class="card-title mb-0 fw-bold">PDS Status</h5>
                        </div>
                        @php
                            $statusColor = match ($entry->status) {
                                'approved' => 'success',
                                'under_review' => 'warning',
                                'needs_revision' => 'danger',
                                'draft' => 'secondary',
                                default => 'light',
                            };

                            $statusBgColor = match ($entry->status) {
                                'approved' => 'success-subtle',
                                'under_review' => 'warning-subtle',
                                'needs_revision' => 'danger-subtle',
                                'draft' => 'secondary-subtle',
                                default => 'light',
                            };

                            $status = ucwords(str_replace('_', ' ', $entry->status));

                            $statusIcon = match ($entry->status) {
                                'approved' => 'check-circle-fill',
                                'under_review' => 'hourglass-split',
                                'needs_revision' => 'exclamation-triangle-fill',
                                'draft' => 'pencil-square',
                                default => 'circle',
                            };
                        @endphp
                        <span class="badge bg-{{ $statusBgColor }} text-{{ $statusColor }} px-3 py-2 rounded-pill">
                            <i class="bi bi-{{ $statusIcon }} me-1"></i>
                            {{ $status }}
                        </span>
                    </div>

                    <div
                        class="status-card p-4 mb-4 bg-white rounded-3 border-start border-{{ $statusColor }} border-4 shadow-sm">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h6 class="fw-bold mb-1">Personal Data Sheet</h6>
                                <span
                                    class="badge bg-{{ $statusBgColor }} text-{{ $statusColor }} rounded-pill">Version
                                    {{ $latestSubmission->version ?? '1.0' }}</span>
                            </div>
                            <span class="text-muted small">Updated:
                                {{ \Carbon\Carbon::parse($latestSubmission->created_at)->format('M d, Y') }}</span>
                        </div>
                        <p class="mb-3">{{ $latestSubmission->remarks ?? 'Your entry has been approved' }}</p>

                        <div class="mt-3">
                            <div class="d-flex justify-content-between text-muted small mb-2">
                                <span>Draft</span>
                                <span>Submitted</span>
                                <span>Under Review</span>
                                <span>Approved</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                @php
                                    $progressWidth = match ($entry->status) {
                                        'approved' => '100',
                                        'under_review' => '75',
                                        'needs_revision' => '50',
                                        'draft' => '25',
                                        default => '0',
                                    };
                                @endphp
                                <div class="progress-bar bg-{{ $statusColor }}" role="progressbar"
                                    style="width: {{ $progressWidth }}%;" aria-valuenow="{{ $progressWidth }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 border border-light">
                                <div class="me-3 bg-white p-2 rounded-circle shadow-sm"
                                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-calendar-check text-primary"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Submission Date</div>
                                    <div class="fw-bold">
                                        {{ \Carbon\Carbon::parse($latestSubmission->created_at)->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 border border-light">
                                <div class="me-3 bg-white p-2 rounded-circle shadow-sm"
                                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person-check text-primary"></i>
                                </div>
                                <div>
                                    <div class="text-muted small">Reviewed By</div>
                                    <div class="fw-bold">{{ $latestSubmission->reviewer_name ?? 'Pending Review' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($entry->status == 'needs_revision')
                        <div class="d-grid gap-2 mt-3">
                            <a wire:navigate.ref href="{{ url(route('employee.pds.create')) }}"
                                class="btn btn-{{ $statusColor }} d-flex align-items-center justify-content-center">
                                @if ($entry->status == 'needs_revision')
                                    <i class="bi bi-pencil-square me-2"></i>
                                    Edit PDS
                                @endif
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Submission Logs Card -->
        <div class="col-md-6">
            <div class="dashboard-card card border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">
                            <i class="bi bi-journal-text text-primary me-2"></i>
                            Submission Logs
                        </h5>
                        <a wire:navigate href="{{ url(route('employee.submission.logs')) }}"
                            class="btn btn-sm btn-outline-primary">View All</a>
                    </div>

                    <ul class="timeline-dots position-relative ps-0 list-unstyled">
                        @forelse ($submissions as $submission)
                            @php
                                $statusMessages = [
                                    'approved' => 'Your submission has been approved.',
                                    'needs_revision' => 'The admin has returned your entry for revision.',
                                    'under_review' => 'Your submission is under review.',
                                ];

                                $statusConfig = [
                                    'approved' => [
                                        'color' => 'success',
                                        'icon' => 'bi-check-circle-fill',
                                    ],
                                    'needs_revision' => [
                                        'color' => 'danger',
                                        'icon' => 'bi-exclamation-circle-fill',
                                    ],
                                    'under_review' => [
                                        'color' => 'warning',
                                        'icon' => 'bi-hourglass-split',
                                    ],
                                ];

                                $config = $statusConfig[$submission->status] ?? $statusConfig['under_review'];
                            @endphp

                            <li class="timeline-item position-relative mb-4 ps-4">
                                <!-- Timeline dot with icon -->
                                <div class="timeline-dot position-absolute start-0 top-0">
                                    <div
                                        class="dot-circle bg-{{ $config['color'] }} text-white d-flex align-items-center justify-content-center">
                                        <i class="bi {{ $config['icon'] }} icon-small"></i>
                                    </div>
                                </div>

                                <!-- Timeline content -->
                                <div class="timeline-content bg-white border rounded-3 p-3">
                                    <div
                                        class="d-flex flex-column flex-sm-row justify-content-between align-items-start mb-2">
                                        <span class="status-text badge bg-{{ $config['color'] }} mb-2 mb-sm-0">
                                            <i class="bi {{ $config['icon'] }} me-1"></i>
                                            {{ ucwords(str_replace('_', ' ', $submission->status)) }}
                                        </span>
                                        <small
                                            class="text-muted">{{ $submission->created_at->format('M d, Y h:i A') }}</small>
                                    </div>

                                    <div
                                        class="status-message my-2 ps-2 border-start border-3 border-{{ $config['color'] }}">
                                        <p class="mb-1 fw-medium">{{ $statusMessages[$submission->status] }}</p>
                                        <p class="text-muted small mb-0">
                                            {{ $submission->remarks ?: 'No remarks provided' }}</p>
                                    </div>

                                    {{-- @if ($submission->status === 'needs_revision')
                                        <div class="d-flex justify-content-end mt-3">
                                            <a href="{{ url(route('employee.pds.create')) }}"
                                                class="btn btn-sm btn-outline-{{ $config['color'] }}">
                                                <i class="bi bi-pencil me-1"></i> Edit
                                            </a>
                                        </div>
                                    @elseif ($submission->status === 'approved')
                                        <div class="d-flex justify-content-end mt-3">
                                            <a href="{{ url(route('print')) }}"
                                                class="btn btn-sm btn-outline-{{ $config['color'] }}">
                                                <i class="bi bi-printer me-1"></i> Print
                                            </a>
                                        </div>
                                    @endif --}}
                                </div>
                            </li>
                        @empty
                            <li
                                class="timeline-empty text-center p-4 bg-light rounded d-flex justify-content-center align-items-center flex-column">
                                <i class="bi bi-inbox-fill text-secondary fs-1 mb-3"></i>
                                <p class="mb-3">No submission history found.</p>
                                <a href="{{ url(route('employee.pds.create')) }}" wire:navigate.hover
                                    class="btn btn-primary btn-sm">
                                    <i class="bi bi-plus-circle me-1"></i> Create your first submission
                                </a>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="col-md-6">
            <div class="dashboard-card card border-0">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <i class="bi bi-lightning-charge text-primary me-2"></i>
                        Quick Actions
                    </h5>

                    <a href="{{ url(route('employee.preview.entry')) }}" class="quick-action-btn w-100">
                        <i class="bi bi-printer text-primary"></i>
                        Print PDS
                    </a>

                    <a href="{{ url(route('employee.pds.create')) }}" class="quick-action-btn w-100">
                        <i class="bi bi-pencil-square text-success"></i>
                        Edit PDS
                    </a>

                    <a href="{{ url(route('employee.preview.entry')) }}" class="quick-action-btn w-100">
                        <i class="bi bi-file-earmark-arrow-down text-info"></i>
                        Download PDS
                    </a>
                </div>
            </div>
        </div>


        <!-- Notifications Card -->
        <div class="col-md-6">
            <div class="dashboard-card card border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title">
                            <i class="bi bi-bell text-primary me-2"></i>
                            Notifications
                        </h5>
                        <a href="{{ url(route('employee.notification')) }}"
                            class="btn btn-sm btn-outline-primary">View
                            All</a>
                    </div>

                    <div class="notification-item unread">
                        <div class="d-flex justify-content-between">
                            <strong>PDS Revision Requested</strong>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                        <p class="small mb-0">HR has requested revisions to your educational background section.</p>
                    </div>

                    <div class="notification-item unread">
                        <div class="d-flex justify-content-between">
                            <strong>Performance Review</strong>
                            <small class="text-muted">Yesterday</small>
                        </div>
                        <p class="small mb-0">Your annual performance review is scheduled for March 20, 2025.</p>
                    </div>

                    <div class="notification-item">
                        <div class="d-flex justify-content-between">
                            <strong>Team Meeting</strong>
                            <small class="text-muted">Mar 8, 2025</small>
                        </div>
                        <p class="small mb-0">Department-wide meeting has been scheduled for next Monday at 10:00 AM.
                        </p>
                    </div>

                    <div class="notification-item">
                        <div class="d-flex justify-content-between">
                            <strong>Document Approved</strong>
                            <small class="text-muted">Feb 20, 2025</small>
                        </div>
                        <p class="small mb-0">Your medical certificate has been reviewed and approved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
            height: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .status-card {
            border-left: 4px solid;
        }

        .quick-action-btn {
            border-radius: 8px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 0.6rem 1rem;
            margin-bottom: 0.5rem;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #212529;
            text-align: left;
            transition: all 0.2s;
        }

        .quick-action-btn:hover {
            background-color: #e9ecef;
            border-color: #ced4da;
        }

        .quick-action-btn i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .notification-item {
            border-left: 3px solid transparent;
            padding: 10px 15px;
            margin-bottom: 10px;
            background-color: #fff;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .notification-item.unread {
            border-left-color: #0d6efd;
            background-color: #f0f7ff;
        }

        .log-table {
            font-size: 0.85rem;
        }

        .status-progress {
            height: 8px;
        }

        /* Timeline vertical line */
        .timeline-dots::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 12px;
            width: 2px;
            background-color: #e9ecef;
            z-index: 0;
        }

        /* Timeline dot styling with icons */
        .timeline-dot {
            z-index: 1;
        }

        .dot-circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            box-shadow: 0 0 0 4px white;
        }

        .icon-small {
            font-size: 12px;
        }

        /* Spacing for the last item */
        .timeline-item:last-child {
            margin-bottom: 0 !important;
        }

        /* Mobile optimizations */
        @media (max-width: 576px) {
            .timeline-dots::before {
                left: 10px;
            }

            .dot-circle {
                width: 20px;
                height: 20px;
            }

            .icon-small {
                font-size: 10px;
            }

            .timeline-item {
                padding-left: 30px !important;
            }
        }

        /* Hover effect */
        .timeline-content {
            transition: transform 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .timeline-content:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        /* Empty state styling */
        .timeline-empty {
            min-height: 200px;
        }
    </style>
@endpush
