<div>
    {{-- Filter Card --}}
    @livewire('admin.filter-options')

    {{-- Preview Table --}}
    <div class="card mt-3">
        <div class="card-header">
            <h6 class="card-title mb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div style="font-size: 0.9rem;">
                        <i class="bi bi-eye me-1"></i>Report Preview
                    </div>

                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exportModal"
                        style="font-size: 0.8rem;">
                        <i class="bi bi-download"></i>
                        Export Report
                    </button>
                </div>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="font-size: 0.8rem">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Employment Status</th>
                            <th>Length of Service</th>
                            <th>Civil Status</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Highest Educational Attainment</th>
                            <th>Eligibility</th>
                            <th>Eligibility Valid Until(if any)</th>
                            <th>Citizenship</th>
                            <th>PDS Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($employees as $employee)
                            @php
                                $pdsEntry = $employee
                                    ->entries()
                                    ->where('status', 'approved')
                                    ->first();

                                $eligibility = $pdsEntry?->eligibilities()->first();

                            @endphp
                            <tr>
                                <td>{{ $employee->getFullName() }}</td>
                                <td>
                                    @php
                                        $latestWork = $pdsEntry?->workExperiences()
                                            ->get()
                                            ->sortBy(function ($work){
                                                return empty($work->date_to) ? now()->timestamp + 1 : \Carbon\Carbon::parse($work->date_to)->timestamp;
                                            })->first();
                                    @endphp
                                    {{ $latestWork?->position ?? 'No Work Experience' }}
                                </td>
                                <td>{{ \App\Enums\MunicipalOffice::getValue($employee->department) ?? 'No Department' }}</td>
                                <td>{{ $latestWork?->status ? ucwords(str_replace('_', ' ', $latestWork->status)) : 'No Status' }}</td>
                                <td>
                                    @php
                                        $firstWork = $pdsEntry?->workExperiences()
                                            ->get()
                                            ->filter(fn ($work) => !empty($work->date_from))
                                            ->sort(fn ($work) => \Carbon\Carbon::parse($work->date_from)->timestamp)
                                            ->first();

                                        $lengthOfService = $firstWork
                                            ? \Carbon\Carbon::parse($firstWork->date_from)->diffForHumans(null, true)
                                            : '0 years';
                                    @endphp

                                    {{ $lengthOfService }}
                                </td>
                                <td>
                                    @php
                                        $civilStatus = $pdsEntry?->personalInformation?->civil_status;
                                        $formattedCivilStatus = $civilStatus ? ucwords(str_replace('_', ' ', $civilStatus)) : 'No Civil Status';
                                    @endphp
                                    {{ $formattedCivilStatus }}
                                </td>

                                <td>{{ !empty($employee->sex) ? strtoupper($employee->sex[0]) : '' }}</td>
                                <td>
                                    @php
                                        $birth_date = $pdsEntry?->personalInformation?->birth_date;
                                        $age = $birth_date ? \Carbon\Carbon::parse($birth_date)->diffForHumans(null, true) : 'Not Specified';
                                    @endphp
                                    {{ $age }}
                                </td>
                                <td>
                                    @php
                                        $educationalBackgrounds = $pdsEntry?->educationalBackgrounds()
                                            ->get()
                                            ->filter(fn ($bg) => !empty($bg->school_name));

                                        $levelPriority = [
                                            'elementary' => 1,
                                            'secondary' => 2,
                                            'vocational' => 3,
                                            'college' => 4,
                                            'graduate_studies' => 5,
                                        ];

                                        $highestEducationalLevel = $educationalBackgrounds?->sortByDesc(fn ($bg) => $levelPriority[$bg->level ?? ''] ?? 0)->first();
                                    @endphp

                                    {{ $highestEducationalLevel?->level
                                        ? ucwords(str_replace('_', ' ', $highestEducationalLevel->level))
                                        : 'No Educational Background' }}
                                </td>

                                <td>
                                    {{ $eligibility?->career_service ?? 'Not Eligible' }}
                                </td>
                                <td>
                                    @php
                                        $validUntil = $eligibility?->license_validity
                                            ? \Carbon\Carbon::parse($eligibility->license_validity)
                                            : null;
                                    @endphp

                                    @if ($validUntil)
                                        <span>
                                            {{ $validUntil->format('M d, Y') }}
                                        </span>
                                    @else
                                        <span>No License</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $pdsEntry?->personalInformation?->citizenship ? ucwords(strtolower($pdsEntry->personalInformation->citizenship)) : 'Not Specified' }}
                                </td>

                                <td>{{ ucwords($pdsEntry?->status ?? 'No Submissions') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    {{-- Export Modal --}}
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h5 class="modal-title" id="exportModalLabel" style="font-size: 0.9rem;">
                        <i class="bi bi-download me-2"></i>Export Report
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3" style="font-size: 0.9rem;">
                        <label for="report_title" class="form-label">Report Title</label>
                        <input type="text" class="form-control" id="report_title" name="report_title">
                    </div>

                    <div class="mb-3" style="font-size: 0.9rem;">
                        <label class="form-label">Export as</label>
                        <div class="d-flex gap-3 flex-wrap">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="report_type" id="report-pdf" value="pdf" checked>
                                <label class="form-check-label" for="report-pdf">
                                    <i class="bi bi-file-earmark-pdf me-1 text-danger"></i>PDF
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="report_type" id="report-excel" value="excel">
                                <label class="form-check-label" for="report-excel">
                                    <i class="bi bi-file-earmark-excel me-1 text-success"></i>Excel
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="report_type" id="report-csv" value="csv">
                                <label class="form-check-label" for="report-csv">
                                    <i class="bi bi-filetype-csv me-1 text-primary"></i>CSV
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="font-size: 0.8rem;">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnExport" style="font-size: 0.8rem;">
                        <i class="bi bi-download me-1"></i>Export
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
