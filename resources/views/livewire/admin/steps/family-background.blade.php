<x-review-card title="Family Background" icon="bi-people" openCard="{{ $openCard }}">
    <div class="family-info-container">
        <!-- Spouse Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Spouse Information</h6>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Full Name</span>
                        @if ($spouse)
                            <span class="info-value">
                                {{ $spouse->first_name ?? '' }}
                                {{ $spouse->middle_name ?? '' }}
                                {{ $spouse->last_name ?? '' }}
                                {{ $spouse->suffix ?? '' }}
                            </span>
                        @else
                            <span class="info-value text-muted">-</span>
                        @endif

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Occupation</span>
                        <span class="info-value">{{ $spouse->occupation ?: '—' }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Employer/Business Name</span>
                        <span class="info-value">{{ $spouse->employer ?: '—' }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item">
                        <span class="info-label">Telephone No</span>
                        <span class="info-value">{{ $spouse->telephone_no ?: '—' }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="info-item">
                        <span class="info-label">Business Address</span>
                        <span class="info-value">{{ $spouse->business_address ?: '—' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parents Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Parents Information</h6>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="family-card">
                        <h6 class="family-title">Father</h6>
                        <div class="family-details">
                            <div class="info-item mb-2">
                                <span class="info-label">Full Name</span>
                                <span class="info-value">{{ $father->first_name }} {{ $father->middle_name }}
                                    {{ $father->last_name }} {{ $father->suffix }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="family-card">
                        <h6 class="family-title">Mother (Maiden)</h6>
                        <div class="family-details">
                            <div class="info-item mb-2">
                                <span class="info-label">Full Name</span>
                                <span class="info-value">{{ $mother->first_name }} {{ $mother->middle_name }}
                                    {{ $mother->last_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Children Information Section -->
        <div class="info-section">
            <h6 class="section-title">Children Information</h6>
            @forelse ($children as $child)
                <div class="child-item mb-3">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Full Name</span>
                                <span class="info-value">{{ $child->fullname }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <span class="info-label">Birth Date</span>
                                <span
                                    class="info-value">{{ \Carbon\Carbon::parse($child->birth_date)->format('m/d/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr class="child-divider my-3">
                @endif
            @empty
                <div class="empty-state text-center py-4">
                    <i class="bi bi-people text-light mb-2" style="font-size: 1.5rem"></i>
                    <p class="text-secondary mb-0">No children information provided</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Comments Section -->
    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [$submissionId, 'family_background'])
        </div>
    @endif

    <style>
        .family-info-container {
            font-size: 0.9rem;
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #495057;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 0.5rem;
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

        .family-card {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            height: 100%;
        }

        .family-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #495057;
        }

        .family-details {
            font-size: 0.85rem;
            color: #495057;
        }

        .child-divider {
            border-top: 1px dashed #dee2e6;
            opacity: 0.5;
        }

        .empty-state {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1.5rem;
        }
    </style>
</x-review-card>
