<div class="card border-0 shadow-sm">
    <div class="card-body p-3 p-md-4">
        <h6 class="card-title mb-4">
            <i class="bi bi-clock-history me-2"></i>Timeline
        </h6>

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
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start mb-2">
                            <span class="status-text badge bg-{{ $config['color'] }} mb-2 mb-sm-0">
                                <i class="bi {{ $config['icon'] }} me-1"></i>
                                {{ ucwords(str_replace('_', ' ', $submission->status)) }}
                            </span>
                            <small class="text-muted">{{ $submission->created_at->format('M d, Y h:i A') }}</small>
                        </div>

                        <div class="status-message my-2 ps-2 border-start border-3 border-{{ $config['color'] }}">
                            <p class="mb-1 fw-medium">{{ $statusMessages[$submission->status] }}</p>
                            <p class="text-muted small mb-0">{{ $submission->remarks ?: 'No remarks provided' }}</p>
                        </div>

                        @if ($submission->status === 'needs_revision')
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ url(route('employee.pds.create')) }}"
                                    class="btn btn-sm btn-outline-{{ $config['color'] }}">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </a>
                            </div>
                        @elseif ($submission->status === 'approved')
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ url(route('employee.preview.entry')) }}"
                                    class="btn btn-sm btn-outline-{{ $config['color'] }}">
                                    <i class="bi bi-printer me-1"></i> Print
                                </a>
                            </div>
                        @endif
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

@push('styles')
    <style>
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
