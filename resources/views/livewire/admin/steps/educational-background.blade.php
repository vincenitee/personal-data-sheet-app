<x-card title="Educational Background">
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center ps-3"
                        rowspan="2">Level</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">School Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Degree Earned</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        colspan="2">Period of Attendance</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Highest Level/Units Earned</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Year Graduated</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center pe-3"
                        rowspan="2">Academic Honors Received</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">From</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">To</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($educationalBackgrounds as $background)
                    <tr>
                        <td class="align-middle text-center fw-semibold text-dark">
                            @if (!empty($background->level))
                                {{ ucwords($background->level) }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center fw-semibold text-secondary">
                            @if (!empty($background->school_name))
                                {{ $background->school_name }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center text-secondary">
                            @if (!empty($background->degree_earned))
                                {{ $background->degree_earned }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($background->attendance_to))
                                {{ \Carbon\Carbon::parse($background->attendance_from)->format('m/d/Y') }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($background->attendance_to))
                                {{ \Carbon\Carbon::parse($background->attendance_to)->format('m/d/Y') }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($background->highest_level_units))
                                {{ $background->highest_level_units }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($background->year_graduated))
                                {{ $background->year_graduated }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($background->academic_honors))
                                {{ $background->academic_honors }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No educational records provided
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'educational_background',
    ])
</x-card>
