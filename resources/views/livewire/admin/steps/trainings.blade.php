<x-review-card title="Learning and Development" icon="bi-mortarboard" openCard="{{ $openCard }}">
    <div class="training-info-container">
        @forelse ($trainings as $training)
            <div class="training-item mb-4">
                <div class="training-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 training-title">{{ $training->title ?? 'Untitled Training' }}</h6>
                        <span class="badge bg-primary hours-badge">{{ $training->total_hours ?? 0 }} hours</span>
                    </div>
                    <div class="training-sponsor">{{ $training->sponsored_by ?? 'No sponsor information' }}</div>
                </div>

                <div class="training-details">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="info-item">
                                <span class="info-label">From</span>
                                <span class="info-value">
                                    @if (!empty($training->date_from))
                                        {{ $training->date_from->format('m/d/Y') }}
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-item">
                                <span class="info-label">To</span>
                                <span class="info-value">
                                    @if (!empty($training->date_to))
                                        {{ $training->date_to->format('m/d/Y') }}
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-item">
                                <span class="info-label">Training Type</span>
                                <span class="info-value">
                                    @if (!empty($training->type))
                                        <span class="training-type">{{ ucwords($training->type) }}</span>
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="certificate-section">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="certificate-title mb-0">Certificate Information</h6>

                                    @if (!empty($training->certificate))
                                        <a href="{{ asset($training->certificate) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary rounded-2 d-flex align-items-center">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    @endif
                                </div>

                                <div class="certificate-details mt-3">
                                    @if (!empty($training->certificate))
                                        <div class="d-flex align-items-center">
                                            <div class="certificate-thumbnail position-relative me-3"
                                                style="width: 64px; height: 64px;">
                                                <img src="{{ asset($training->certificate) }}"
                                                    alt="Training Certificate"
                                                    class="img-thumbnail rounded-2 object-fit-cover"
                                                    style="width: 64px; height: 64px; cursor: pointer;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#certificateModal{{ $training->id }}">

                                                @if (pathinfo($training->certificate, PATHINFO_EXTENSION))
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle badge bg-secondary rounded-pill"
                                                        style="font-size: 0.6rem;">
                                                        {{ strtoupper(pathinfo($training->certificate, PATHINFO_EXTENSION)) }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="certificate-info">
                                                <h6 class="certificate-filename mb-1">
                                                    {{ basename($training->certificate) }}
                                                </h6>
                                                <p class="certificate-actions mb-0">
                                                    <a href="#" class="text-primary" data-bs-toggle="modal"
                                                        data-bs-target="#certificateModal{{ $training->id }}">
                                                        <i class="bi bi-eye me-1"></i> View Certificate
                                                    </a>
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Modal for Full Image -->
                                        <div class="modal fade" id="certificateModal{{ $training->id }}"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ $training->title }} - Certificate
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset($training->certificate) }}"
                                                            alt="Full Certificate" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="empty-certificate text-center py-3">
                                            <i class="bi bi-file-earmark-x text-muted mb-2"
                                                style="font-size: 1.5rem"></i>
                                            <p class="mb-0 text-muted">No certificate uploaded</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!$loop->last)
                <hr class="training-divider my-4">
            @endif
        @empty
            <div class="empty-state text-center py-4">
                <i class="bi bi-mortarboard text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No learning and development records found</p>
            </div>
        @endforelse
    </div>

    <!-- Comments Section -->
    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [
                'submissionId' => $submissionId,
                'pdsSection' => 'learning_and_development',
            ])
        </div>
    @endif

    <style>
        .training-info-container {
            font-size: 0.9rem;
        }

        .training-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .training-header {
            margin-bottom: 0.75rem;
        }

        .training-title {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
        }

        .training-sponsor {
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .hours-badge {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }

        .training-details {
            padding-top: 0.5rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 0.5rem;
        }

        .info-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 500;
            color: #212529;
        }

        .training-type {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .certificate-section {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 0.5rem;
        }

        .certificate-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
        }

        .certificate-filename {
            font-size: 0.85rem;
            color: #212529;
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .certificate-actions {
            font-size: 0.8rem;
        }

        .empty-certificate {
            background-color: #e9ecef;
            border-radius: 0.25rem;
        }

        .training-divider {
            border-top: 1px solid #e9ecef;
            margin: 1.5rem 0;
        }

        .empty-state {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 2rem;
        }
    </style>
</x-review-card>
