<x-card title="Voluntary Work Experience">
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center ps-3"
                        rowspan="2">Name and Address of the Organization</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        colspan="2">Inclusive Dates</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Number of Hours</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle text-center"
                        rowspan="2">Position/Nature of Work</th>
                </tr>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">From</th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder">To</th>
                </tr>
            </thead>

            <tbody>
                {{-- @dump( $volWorkExperiences) --}}
                @forelse ($volWorkExperiences as $experience)
                    <tr>
                        <td class="align-middle">
                            {{ $experience->getOrgAddressAndNameAttribute() }}
                        </td>
                        <td class="align-middle">
                            @if (!empty($experience->date_from))
                                {{ $experience->date_from->format('m/d/Y')}}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($experience->date_to))
                                {{ $experience->date_to->format('m/d/Y')}}
                            @else
                                <span
                                    class="badge bg-soft-warning bg-warning d-inline-flex align-items-center gap-2 py-1 px-2 rounded-2">
                                    Not Applicable
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($experience->total_hours))
                                {{ $experience->total_hours }}
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-clipboard-x me-2"></i>
                            No voluntary experience records provided
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'voluntary_work'
    ])
</x-card>
