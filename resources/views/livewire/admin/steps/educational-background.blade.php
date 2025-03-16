<x-review-card title="Educational Background" icon="bi-mortarboard" openCard="{{ $openCard }}">
    <div class="education-info-container">
        @forelse ($educationalBackgrounds as $background)
            <div class="education-item mb-4">
                <div class="education-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="education-level-badge">
                                {{ !empty($background->level) ? ucwords(str_replace('_', ' ', $background->level)) : 'Not Specified' }}
                            </span>
                            <h6 class="mb-0 education-school">{{ $background->school_name ?: '—' }}</h6>
                        </div>
                        <span class="education-year">{{ $background->year_graduated ?: 'Ongoing' }}</span>
                    </div>
                    <div class="education-degree mb-2">{{ $background->degree_earned ?: '—' }}</div>
                </div>

                <div class="education-details">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Period of Attendance</span>
                                <span class="info-value">
                                    @if (!empty($background->attendance_from) && !empty($background->attendance_to))
                                        {{ $background->attendance_from }} —
                                        {{ $background->attendance_to }}
                                    @else
                                        —
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Highest Level/Units Earned</span>
                                <span class="info-value">{{ $background->highest_level_units ?: '—' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Academic Honors</span>
                                <span class="info-value">{{ $background->academic_honors ?: 'None' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!$loop->last)
                <hr class="education-divider my-4">
            @endif
        @empty
            <div class="empty-state text-center py-4">
                <i class="bi bi-mortarboard text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No educational records provided</p>
            </div>
        @endforelse
    </div>

    <!-- Comments Section -->
    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [
                'submissionId' => $submissionId,
                'pdsSection' => 'educational_background',
            ])
        </div>
    @endif

    <style>
        .education-info-container {
            font-size: 0.9rem;
        }

        .education-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .education-header {
            margin-bottom: 0.75rem;
        }

        .education-level-badge {
            background-color: #e9ecef;
            color: #495057;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            text-transform: uppercase;
        }

        .education-school {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
            margin-left: 0.5rem;
        }

        .education-year {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }

        .education-degree {
            color: #495057;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .education-details {
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

        .education-divider {
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
