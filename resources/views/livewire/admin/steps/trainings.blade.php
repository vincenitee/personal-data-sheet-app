<x-card title="Learning and Development">
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle ps-3"
                        rowspan="2">Title of Learning and Development Interventions/Training Programs</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        colspan="2">Inclusive Date of Attendance</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Number of Hours</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Training Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Conducted/Sponsored By</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Certificate</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">From</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">To</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($trainings as $training)
                    <tr>
                        <td class="align-middle">
                            @if (!empty($training->title))
                                {{ $training->title }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($training->date_from))
                                {{ $training->date_from->format('m/d/Y') }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($training->date_to))
                                {{ $training->date_to->format('m/d/Y') }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($training->total_hours))
                                {{ $training->total_hours }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($training->type))
                                {{ ucwords($training->type) }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($training->sponsored_by))
                                {{ $training->sponsored_by }}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if (!empty($training->certificate))
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="{{ Storage::url($training->certificate) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary rounded-2 d-flex align-items-center">
                                        <i class="bi bi-eye me-1"></i> View
                                    </a>

                                    <div class="certificate-thumbnail position-relative"
                                        style="width: 54px; height: 54px;">
                                        <img src="{{ asset('storage/' . $training->certificate) }}"
                                            alt="Training Certificate" class="img-thumbnail rounded-2 object-fit-cover"
                                            style="width: 54px; height: 54px; cursor: pointer;" data-bs-toggle="modal"
                                            data-bs-target="#certificateModal{{ $training->id }}">

                                        @if (pathinfo($training->certificate, PATHINFO_EXTENSION))
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge bg-secondary rounded-pill"
                                                style="font-size: 0.6rem;">
                                                {{ strtoupper(pathinfo($training->certificate, PATHINFO_EXTENSION)) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Modal for Full Image -->
                                <div class="modal fade" id="certificateModal{{ $training->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Certificate</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $training->certificate) }}"
                                                    alt="Full Certificate" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <span class="badge bg-light text-muted rounded-2 py-1 px-2">
                                    No Certificate
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No training records provided
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'learning_and_development'
    ])
</x-card>
