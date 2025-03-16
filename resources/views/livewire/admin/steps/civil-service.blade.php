<x-review-card title="Civil Service Eligibility" icon="bi-award" openCard="{{ $openCard }}">
    <div class="eligibility-info-container">
        @forelse ($eligibilities as $eligibility)
            <div class="eligibility-item mb-4">
                <div class="eligibility-header">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 eligibility-service">{{ $eligibility->career_service }}</h6>
                        @php
                            $ratingClass = match (true) {
                                $eligibility->ratings >= 90 => 'success',
                                $eligibility->ratings >= 75 => 'primary',
                                $eligibility->ratings >= 50 => 'warning',
                                default => 'danger',
                            };
                        @endphp
                        <span class="badge bg-{{ $ratingClass }} rating-badge">{{ $eligibility->ratings }}</span>
                    </div>
                </div>

                <div class="eligibility-details">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Exam Date</span>
                                <span class="info-value">{{ \Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y') }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Exam Location</span>
                                <span class="info-value">{{ $eligibility->exam_place }}</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="license-section">
                                <h6 class="license-title">License Information</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">License Number</span>
                                            <span class="info-value">
                                                @if (!empty($eligibility->license_number))
                                                    <code class="license-code">{{ $eligibility->license_number }}</code>
                                                @else
                                                    <span class="text-muted">Not Applicable</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Validity</span>
                                            <span class="info-value">
                                                @if (!empty($eligibility->license_validity))
                                                    @php
                                                        $isValid = now()->lessThan(\Carbon\Carbon::parse($eligibility->license_validity));
                                                        $validityClass = $isValid ? 'valid' : 'expired';
                                                    @endphp
                                                    <span class="license-validity {{ $validityClass }}">
                                                        {{ $eligibility->license_validity->format('m/d/Y') }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">Not Applicable</span>
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
                <hr class="eligibility-divider my-4">
            @endif
        @empty
            <div class="empty-state text-center py-4">
                <i class="bi bi-award text-light mb-3" style="font-size: 2rem"></i>
                <p class="text-secondary mb-0">No eligibility records found</p>
            </div>
        @endforelse
    </div>

    <!-- Comments Section -->
    <div class="comments-section mt-4">
        @livewire('admin.comments', [
            'submissionId' => $submissionId,
            'pdsSection' => 'civil_service_eligibility',
        ])
    </div>

    <style>
        .eligibility-info-container {
            font-size: 0.9rem;
        }
        .eligibility-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .eligibility-header {
            margin-bottom: 0.75rem;
        }
        .eligibility-service {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
        }
        .rating-badge {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
        }
        .eligibility-details {
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
        .license-section {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-top: 0.5rem;
        }
        .license-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
        }
        .license-code {
            background-color: #e9ecef;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 0.85rem;
        }
        .license-validity {
            padding: 0.25rem 0.5rem;vol
            border-radius: 0.25rem;
            font-size: 0.85rem;
        }
        .license-validity.valid {
            background-color: rgba(25, 135, 84, 0.1);
            color: #198754;
        }
        .license-validity.expired {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }
        .eligibility-divider {
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