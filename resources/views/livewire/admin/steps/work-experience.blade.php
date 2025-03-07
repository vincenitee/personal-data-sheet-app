<x-card title="Work Experiences">
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center ps-3"
                        colspan="2">Inclusive Dates</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Position Title</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Department/Agency/Office/Company</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Monthly Salary</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Salary/Job/Pay Grade</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Status of Appointment</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Government Service</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">From</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">To</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($workExperiences as $experience)
                    <tr>
                        <td class="align-middle text-center">
                            @if (!empty($experience->date_from))
                                {{ $experience->date_from->format('m/d/Y')}}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($experience->date_to))
                                {{ $experience->date_to->format('m/d/Y') }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>

                        <td class="align-middle">
                            @if (!empty($experience->position))
                                {{ $experience->position }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($experience->agency))
                                {{ $experience->agency }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($experience->salary))
                                <code class="text-dark">
                                    ₱{{ number_format($experience->salary, 2) }}
                                </code>
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($experience->salary_grade) && !empty($experience->salary_step))
                                <code class="text-dark">
                                    {{ $experience->salary_grade }}-{{ $experience->salary_step }}
                                </code>
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($experience->status))
                                @php
                                    $statusColorMap = [
                                        'permanent' => 'success',
                                        'contractual' => 'primary',
                                        'casual' => 'warning',
                                        'contract_of_service' => 'info',
                                        'temporary' => 'secondary',
                                    ];

                                    $statusLabelMap = [
                                        'permanent' => 'Permanent',
                                        'contractual' => 'Contractual',
                                        'casual' => 'Casual',
                                        'contract_of_service' => 'Contract of Service',
                                        'temporary' => 'Temporary',
                                    ];

                                    $color = $statusColorMap[$experience->status] ?? 'light';
                                    $label =
                                        $statusLabelMap[$experience->status] ??
                                        ucwords(str_replace('_', ' ', $experience->status));
                                @endphp
                                <span class="badge bg-{{ $color }} text-white rounded-2 py-1 px-2">
                                    {{ $label }}
                                </span>
                            @else
                                <span class="badge bg-light text-muted rounded-2 py-1 px-2">
                                    Not Specified
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @php
                                $serviceColor = $experience->government_service ? 'primary' : 'danger';
                            @endphp
                            <span class="badge bg-{{ $serviceColor }} text-white rounded-2 py-1 px-2">
                                {{ $experience->government_service ? 'Yes' : 'No' }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No work experience records provided
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'work_experience'
    ])
</x-card>
