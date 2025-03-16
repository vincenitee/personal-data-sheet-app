<x-review-card title="Work Experiences" icon="bi-briefcase" openCard="{{ $openCard }}">
    <div class="work-info-container">
        @forelse ($workExperiences as $experience)
            <div class="work-item mb-4">
                <div class="work-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 work-position">{{ $experience->position }}</h6>
                        @php
                            $statusClass = match ($experience->status) {
                                'permanent' => 'success',
                                'contract_of_service' => 'primary',
                                'temporary' => 'warning',
                                'casual' => 'info',
                                default => 'secondary',
                            };

                            $statusLabel = match ($experience->status) {
                                'contract_of_service' => 'Contract of Service',
                                'permanent' => 'Permanent',
                                'temporary' => 'Temporary',
                                'casual' => 'Casual',
                                default => ucfirst($experience->status),
                            };
                        @endphp
                        <span class="badge bg-{{ $statusClass }} status-badge">{{ $statusLabel }}</span>
                    </div>
                    <div class="work-agency">{{ $experience->agency }}</div>
                </div>

                <div class="work-details">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">From</span>
                                <span
                                    class="info-value">{{ \Carbon\Carbon::parse($experience->date_from)->format('m/d/Y') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">To</span>
                                <span class="info-value">
                                    @if (empty($experience->date_to))
                                        <span class="current-job">Present</span>
                                    @else
                                        {{ \Carbon\Carbon::parse($experience->date_to)->format('m/d/Y') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="job-section">
                                <h6 class="job-title">Job Information</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="info-item">
                                            <span class="info-label">Salary</span>
                                            <span class="info-value">
                                                @if (!empty($experience->salary))
                                                    <code
                                                        class="salary-code">₱{{ number_format($experience->salary, 2) }}</code>
                                                @else
                                                    <span class="text-muted">Not Specified</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-item">
                                            <span class="info-label">Salary Grade</span>
                                            <span class="info-value">
                                                @if (!empty($experience->salary_grade))
                                                    SG-{{ $experience->salary_grade }}
                                                    @if (!empty($experience->salary_step))
                                                        Step {{ $experience->salary_step }}
                                                    @endif
                                                @else
                                                    <span class="text-muted">Not Applicable</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-item">
                                            <span class="info-label">Government Service</span>
                                            <span class="info-value">
                                                @if ($experience->government_service)
                                                    <span class="govt-badge"><i
                                                            class="bi bi-check-circle-fill text-success me-1"></i>
                                                        Yes</span>
                                                @else
                                                    <span class="private-badge"><i class="bi bi-building me-1"></i>
                                                        No</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!$loop->last)
                <hr class="work-divider my-4">
            @endif
        @empty
            <div class="empty-state text-center py-4">
                <i class="bi bi-briefcase text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No work experience records found</p>
            </div>
        @endforelse
    </div>

    <!-- Comments Section -->
    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [
                'submissionId' => $submissionId,
                'pdsSection' => 'work_experience',
            ])
        </div>
    @endif

    <style>
        .work-info-container {
            font-size: 0.9rem;
        }

        .work-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .work-header {
            margin-bottom: 0.75rem;
        }

        .work-position {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
        }

        .work-agency {
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .status-badge {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }

        .work-details {
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

        .job-section {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 0.5rem;
        }

        .job-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
        }

        .salary-code {
            background-color: #e9ecef;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 0.85rem;
        }

        .current-job {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .govt-badge {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .private-badge {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .work-divider {
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
