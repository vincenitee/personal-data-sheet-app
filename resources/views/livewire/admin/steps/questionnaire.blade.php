<x-card title="Additional Questions">
    {{-- @dump($questionResponses->referencePersons) --}}
    <div class="table-responsive">
        <table class="table table-bordered mb-3" style="font-size: 14px; width: 100%;">
            <thead class="bg-light">
                <tr>
                    <th style="width: 3%;">#</th>
                    <th style="width: 47%;">Question</th>
                    <th style="width: 5%;">Yes</th>
                    <th style="width: 5%;">No</th>
                    <th style="width: 35%;">Details</th>
                </tr>
            </thead>
            <tbody>
                {{-- 34 --}}
                <tr>
                    <td rowspan="3">34</td>
                    <td>Are you related by consanguinity or affinity to the appointing or recommending authority, or to
                        the chief of bureau or office or to the person who has immediate supervision over you in the
                        Office, Bureau or Department where you will be apppointed,</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>a. within third degree?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_third_degree_relative" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_third_degree_relative" type="radio" value="0" class="form-check">
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>b. within the fourth degree (for Local Government Unit - Career Employees)?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_fourth_degree_relative" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_fourth_degree_relative" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($fourth_degree_relative))
                            {{ $fourth_degree_relative }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                {{-- 35 --}}
                <tr>
                    <td rowspan="2">35</td>
                    <td>a. Have you ever been found guilty of any administrative offense? </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_admin_case" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_admin_case" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($admin_case_details))
                            {{ $admin_case_details }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>b. Have you been criminally charged before any court?
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_charge" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_charge" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle p-3">
                        <div class="d-flex flex-column">
                            <div class="mb-1">
                                @if (!empty($criminal_charge_date))
                                    <span class="text-muted small">Charge Date:</span>
                                    <span class="ms-1 fw-semibold">
                                        {{ \Carbon\Carbon::parse($criminal_charge_date)->format('m/d/Y') }}
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        No additional details provided
                                    </span>
                                @endif
                            </div>
                            <div>
                                @if (!empty($criminal_charge_status))
                                    <span class="badge bg-secondary">
                                        {{ ucwords(str_replace('_', ' ', $criminal_charge_status)) }}
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        No additional details provided
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>

                {{-- 36 --}}
                <tr>
                    <td>36</td>
                    <td>Have you ever been convicted of any crime or violation of any law, decree, ordinance or
                        regulation by any court or tribunal?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_conviction" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_criminal_conviction" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($criminal_conviction_details))
                            {{ $criminal_conviction_details }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                {{-- 37 --}}
                <tr>
                    <td>37</td>
                    <td>Have you ever been separated from the service in any of the following modes: resignation,
                        retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or
                        phased out (abolition) in the public or private sector?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_separation_from_service" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_separation_from_service" type="radio" value="0"
                            class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($separation_details))
                            {{ $separation_details }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                {{-- 38 --}}
                <tr>
                    <td rowspan="2">38</td>
                    <td>a. Have you ever been a candidate in a national or local election held within the last year
                        (except Barangay election)?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_election_candidate" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_election_candidate" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($election_details))
                            {{ $election_details }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>b. Have you resigned from the government service during the three (3)-month period before the
                        last election to promote/actively campaign for a national or local candidate?</td>
                    <td class="align-middle text-center">
                        <input wire:model="has_resigned_for_election" type="radio" value="1"
                            class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="has_resigned_for_election" type="radio" value="0"
                            class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($resignation_details))
                            {{ $resignation_details }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                {{-- 39 --}}
                <tr>
                    <td>39</td>
                    <td>Have you acquired the status of an immigrant or permanent resident of another country?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_immigrant" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_immigrant" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($immigrant_country))
                            {{ $immigrant_country }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                {{-- 40 --}}
                <tr>
                    <td rowspan="4">40</td>
                    <td>Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA
                        7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td>a. Are you a member of any indigenous group?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_indigenous" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_indigenous" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($indigenous_details))
                            {{ $indigenous_details }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>b. Are you a person with disability?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_disabled" type="radio" value="1" class="form-check" disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_disabled" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($disabled_person_id))
                            {{ $disabled_person_id }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td>c. Are you a solo parent?</td>
                    <td class="align-middle text-center">
                        <input wire:model="is_solo_parent" type="radio" value="1" class="form-check"
                            disabled>
                    </td>
                    <td class="align-middle text-center">
                        <input wire:model="is_solo_parent" type="radio" value="0" class="form-check">
                    </td>
                    <td class="align-middle">
                        @if (!empty($solo_parent_id))
                            {{ $solo_parent_id }}
                        @else
                            <span class="badge bg-warning">
                                No additional details provided
                            </span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <h6>41. REFERENCES</h6>
        <table class="table table-hover table-bordered" style="font-size: 14px">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Telephone No</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($questionResponses->referencePersons as $person)
                    <tr>
                        <td class="align-middle">
                            @if (!empty($person->fullname))
                                {{ $person->fullname }}
                            @else
                                <span class="badge bg-warning">
                                    No additional details provided
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($person->address))
                                {{ $person->address }}
                            @else
                                <span class="badge bg-warning">
                                    No additional details provided
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if (!empty($person->telephone_no))
                                {{ $person->telephone_no }}
                            @else
                                <span class="badge bg-warning">
                                    No additional details provided
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No details provided</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @livewire('admin.comments', [
        'submissionId' => $submissionId,
        'pdsSection' => 'additional_questions',
    ])
</x-card>
