<x-review-card title="Personal Information" icon="bi-person" collapsed="false" openCard="{{ $openCard }}">
    <div class="personal-info-container">
        <!-- Basic Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Basic Information</h6>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Full Name</span>
                        <span class="info-value">{{ $personalInfo->first_name }} {{ $personalInfo->middle_name }}
                            {{ $personalInfo->last_name }} {{ $personalInfo->suffix }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Date of Birth</span>
                        <span class="info-value">{{ $personalInfo->birth_date?->format('m/d/Y') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Place of Birth</span>
                        <span class="info-value">{{ $personalInfo->birth_place }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Sex</span>
                        <span class="info-value">{{ ucwords($personalInfo->sex) }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Civil Status</span>
                        <span class="info-value">{{ ucwords($personalInfo->civil_status) }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Citizenship</span>
                        <span class="info-value">{{ ucwords($personalInfo->citizenship) }}
                            ({{ ucwords($personalInfo->citizenship_by) }})</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Country</span>
                    @if($personalInfo->citizenship_by === 'birth' && $personalInfo->citizenship === 'filipino')
                        <span class="info-value">Philippines</span>
                    @else
                        <span class="info-value">{{ $personalInfo?->country }}</span>
                    @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Physical Characteristics Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Physical Characteristics</h6>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Height</span>
                        <span class="info-value">{{ $personalInfo->height ? $personalInfo->height . 'm' : '—' }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Weight</span>
                        <span
                            class="info-value">{{ $personalInfo->weight ? (int) $personalInfo->weight . 'kg' : '—' }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Blood Type</span>
                        <span class="info-value">{{ $personalInfo->blood_type ?: '—' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">Contact Information</h6>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Mobile No</span>
                        <span class="info-value">{{ $personalInfo->mobile_no ?: '—' }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Telephone No</span>
                        <span class="info-value">{{ $personalInfo->telephone_no ?: '—' }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ $personalInfo->email ?: '—' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ID Numbers Section -->
        <div class="info-section mb-4">
            <h6 class="section-title">ID Numbers</h6>
            <div class="row g-3">
                @php
                    $idTypes = [
                        'gsis' => 'GSIS ID',
                        'pagibig' => 'PAGIBIG ID',
                        'philhealth' => 'PHILHEALTH ID',
                        'sss' => 'SSS ID',
                        'tin' => 'TIN ID',
                        'agency' => 'AGENCY ID',
                    ];
                    $identifierMap = $personalInfo->identifiers->pluck('number', 'type')->toArray();
                @endphp

                @foreach ($idTypes as $type => $label)
                    <div class="col-md-4">
                        <div class="info-item">
                            <span class="info-label">{{ $label }}</span>
                            <span class="info-value">{{ $identifierMap[$type] ?? '—' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Addresses Section -->
        <div class="info-section">
            <h6 class="section-title">Addresses</h6>
            <div class="row g-4">
                @php
                    $addresses = [
                        ['label' => 'Permanent Address', 'data' => $permanentAddress],
                        ['label' => 'Residential Address', 'data' => $residentialAddress],
                    ];
                @endphp

                @foreach ($addresses as $address)
                    <div class="col-md-6">
                        <div class="address-card">
                            <h6 class="address-title">{{ $address['label'] }}</h6>
                            <div class="address-details">
                                @if ($address['data']->house_no)
                                    <p class="mb-1">{{ $address['data']->house_no }},
                                        {{ $address['data']->street ?? '' }} {{ $address['data']->subdivision ?? '' }}
                                    </p>
                                @endif
                                <p class="mb-1">{{ $address['data']->barangay->name ?? $address['data']->barangay }},
                                    {{ $address['data']->municipality->name ?? $address['data']->municipality }}</p>
                                <p class="mb-1">{{ $address['data']->province->name ?? $address['data']->province }},
                                    {{ $address['data']->region->name ?? $address['data']->region }}</p>
                                <p class="mb-0">{{ ucwords($personalInfo->country) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [$submissionId, 'personal_information'])
        </div>
    @endif

    <style>
        .personal-info-container {
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

        .address-card {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            height: 100%;
        }

        .address-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #495057;
        }

        .address-details {
            font-size: 0.85rem;
            color: #495057;
        }
    </style>
</x-review-card>
