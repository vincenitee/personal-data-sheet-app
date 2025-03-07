<x-card title="Other Information">
    {{-- @dump($skills, $recognitions, $organizations) --}}
    @php
        $maxRows = max(count($skills), count($recognitions), count($organizations));
    @endphp
    <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0" style="font-size: 14px">
            <thead class="">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle ps-3">Skills and Hobbies</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">Non-Academic Distinctions/Recognitions</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder align-middle">Membership in Association/Organization</th>
                </tr>
            </thead>

            <tbody>
                @for ($i = 0; $i < $maxRows; $i++)
                    <tr>
                        <td class="align-middle text-muted fw-semibold">
                            @if (isset($skills[$i]))
                                {{ $skills[$i]->skill }}
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td class="align-middle text-muted fw-semibold">
                            @if (isset($recognitions[$i]))
                                {{ $recognitions[$i]->recognition }}
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td class="align-middle text-muted fw-semibold">
                            @if (isset($organizations[$i]))
                                {{ $organizations[$i]->organization }}
                            @else
                                &nbsp;
                            @endif
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'other_information'
    ])
</x-card>
