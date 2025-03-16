<x-review-card title="Voluntary Work Experience" icon="bi-heart" openCard="{{ $openCard }}">
    <div class="volunteer-info-container">
        @forelse ($volWorkExperiences as $work)
            <div class="volunteer-item mb-4">
                <div class="volunteer-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 volunteer-position">{{ $work->position }}</h6>
                        <span class="badge bg-info hours-badge">{{ $work->total_hours }} hours</span>
                    </div>
                    <div class="volunteer-organization">{{ $work->organization_name }}</div>
                </div>

                <div class="volunteer-details">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">From</span>
                                <span
                                    class="info-value">{{ \Carbon\Carbon::parse($work->date_from)->format('m/d/Y') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">To</span>
                                <span class="info-value">
                                    @if (empty($work->date_to))
                                        <span class="current-volunteer">Present</span>
                                    @else
                                        {{ \Carbon\Carbon::parse($work->date_to)->format('m/d/Y') }}
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="organization-section">
                                <h6 class="organization-title">Organization Information</h6>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="info-item">
                                            <span class="info-label">Address</span>
                                            <span class="info-value">
                                                @if (!empty($work->organization_address))
                                                    <code class="address-code">{{ $work->organization_address }}</code>
                                                @else
                                                    <span class="text-muted">Not Specified</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Duration</span>
                                            <span class="info-value duration-value">
                                                @php
                                                    $from = \Carbon\Carbon::parse($work->date_from);
                                                    $to = empty($work->date_to)
                                                        ? now()
                                                        : \Carbon\Carbon::parse($work->date_to);
                                                    $daysDiff = $from->diffInDays($to) + 1;
                                                @endphp
                                                {{ $daysDiff }} {{ Str::plural('day', $daysDiff) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Total Hours</span>
                                            <span class="info-value">
                                                <span class="hours-value">{{ $work->total_hours }}</span>
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
                <hr class="volunteer-divider my-4">
            @endif
        @empty
            <div class="empty-state text-center py-4">
                <i class="bi bi-heart text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No voluntary work experience records found</p>
            </div>
        @endforelse
    </div>

    <!-- Comments Section -->
    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [
                'submissionId' => $submissionId,
                'pdsSection' => 'voluntary_work',
            ])
        </div>
    @endif
    <style>
        .volunteer-info-container {
            font-size: 0.9rem;
        }

        .volunteer-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .volunteer-header {
            margin-bottom: 0.75rem;
        }

        .volunteer-position {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
        }

        .volunteer-organization {
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .hours-badge {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }

        .volunteer-details {
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

        .organization-section {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 0.5rem;
        }

        .organization-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
        }

        .address-code {
            background-color: #e9ecef;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 0.85rem;
        }

        .current-volunteer {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .duration-value {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .hours-value {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }

        .volunteer-divider {
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
