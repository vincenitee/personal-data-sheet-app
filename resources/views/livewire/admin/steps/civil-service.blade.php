<x-card title="Civil Service Eligibility">
    <div class="table-responsive">
        <table class="table table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder ps-3" rowspan="2">Career
                        Service</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder" rowspan="2">Exam Date</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder" rowspan="2">Rating</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder" rowspan="2">Location</th>
                    <th class="text-uppercase align-middle text-secondary text-xxs font-weight-bolder text-center" colspan="2">
                        License (if applicable)</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Number</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Validity</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($eligibilities as $eligibility)
                    <tr class="align-middle">
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <span class="fw-semibold text-dark">
                                    {{ $eligibility->career_service }}
                                </span>
                            </div>
                        </td>
                        <td>
                            {{-- <span class="badge bg-info text-white"> --}}
                            {{ \Carbon\Carbon::parse($eligibility->exam_date)->format('m/d/Y') }}
                            {{-- </span> --}}
                        </td>
                        <td>
                            @php
                                $ratingBadge = match (true) {
                                    $eligibility->ratings >= 90 => 'bg-success',
                                    $eligibility->ratings >= 75 => 'bg-primary',
                                    $eligibility->ratings >= 50 => 'bg-warning',
                                    default => 'bg-gradient-danger',
                                };
                            @endphp
                            <span class="badge {{ $ratingBadge }} text-white">
                                {{ $eligibility->ratings }}
                            </span>
                        </td>
                        <td>
                            <span class="text-secondary">
                                {{ $eligibility->exam_place }}
                            </span>
                        </td>
                        <td>
                            @if (!empty($eligibility->license_number))
                                <code class="text-dark">
                                    {{ $eligibility->license_number }}
                                </code>
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif

                        </td>
                        <td>
                            @php
                                $isValid = now()->lessThan(\Carbon\Carbon::parse($eligibility->license_validity));
                                $validityBadge = $isValid ? 'bg-success' : 'bg-danger';
                            @endphp
                            <span class="badge {{ $validityBadge }} text-white">
                                {{ $eligibility->license_validity->format('m/d/Y') }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No eligibility records found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'civil_service_eligibility',
    ])
</x-card>
