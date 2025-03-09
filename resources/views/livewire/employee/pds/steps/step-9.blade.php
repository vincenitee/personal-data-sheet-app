<div class="d-flex flex-column gap-3 mb-3">
    <x-forms.question-card number="34"
        title="Are you related by consanguinity or affinity to the appointing or recommending authority, or to the
                chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau
                or Department where you will be apppointed:">

        {{-- A --}}
        <x-forms.question-group name="has_third_degree_relative">
            <x-slot:question>
                a. within third degree?
            </x-slot:question>
        </x-forms.question-group>

        {{-- B --}}
        <x-forms.question-group name="has_fourth_degree_relative">
            <x-slot:question>
                b. within the fourth degree (for Local Government Unit - Career Employees)?
            </x-slot:question>

            <div class="col-6 d-sm d-md-block"></div>

            {{-- Details --}}
            <div class="col-md-6 col-12">
                <x-forms.textarea model="fourth_degree_relative" name="fourth_degree_relative" :required="$has_fourth_degree_relative"
                    :disabled="!$has_fourth_degree_relative" />
            </div>
        </x-forms.question-group>

    </x-forms.question-card>

    <x-forms.question-card number="35 (a)" title="Have you ever been found guilty of any administrative offense?">
        <x-forms.question-group name="has_admin_case">
            {{-- Admin Offense Details --}}
            <div class="col-md-6 col-12">
                <x-forms.textarea model="admin_case_details" name="admin_case_details" :required="$has_admin_case"
                    :disabled="!$has_admin_case" />
            </div>
        </x-forms.question-group>

    </x-forms.question-card>

    <x-forms.question-card number="35 (b)" title="Have you been criminally charged before any court?">
        <x-forms.question-group name="has_criminal_charge">
            {{-- Date Field --}}
            <div class="col-md-6 col-12">
                <x-forms.input label="Date Filed" model="criminal_charge_date" name="criminal_charge_date"
                    type="date" :required="false" :required="$has_criminal_charge" :disabled="!$has_criminal_charge" />

                {{-- Status --}}
                <x-forms.select label="Status of Case/s" model="criminal_charge_status" name="criminal_charge_status"
                    :required="$has_criminal_charge" :disabled="!$has_criminal_charge">
                    <option value="under_investigation">Under Investigation</option>
                    <option value="filed_in_court">Filed in Court</option>
                    <option value="pending_arrest">Pending Arrest</option>
                    <option value="pending_arraignment">Pending Arraignment</option>
                    <option value="pending_trial">Pending Trial</option>
                    <option value="submitted_for_decision">Submitted for Decision</option>
                    <option value="resolved">Resolved</option>
                    <option value="on_appeal">On Appeal</option>
                    <option value="dismissed">Dismissed</option>
                    <option value="archived">Archived</option>
                    <option value="convicted">Convicted</option>
                    <option value="acquitted">Acquitted</option>
                    <option value="probation">Probation</option>
                    <option value="on_bail">On Bail</option>
                    <option value="detained">Detained</option>
                    <option value="suspended">Suspended</option>
                    <option value="withdrawn">Withdrawn</option>
                    <option value="transferred">Transferred</option>
                    <option value="executed">Executed</option>
                    <option value="pardoned">Pardoned</option>
                    <option value="parole">Parole</option>
                    <option value="case_closed">Case Closed</option>
                </x-forms.select>
            </div>
        </x-forms.question-group>
    </x-forms.question-card>

    <x-forms.question-card number="36"
        title="Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation
    by any court or tribunal?">
        <x-forms.question-group name="has_criminal_conviction">
            {{-- Details --}}
            <div class="col-12 col-md-6">
                <x-forms.textarea model="criminal_conviction_details" name="criminal_conviction_details"
                    :required="$has_criminal_conviction" :disabled="!$has_criminal_conviction" />
            </div>
        </x-forms.question-group>
    </x-forms.question-card>

    <x-forms.question-card number="37"
        title="Have you ever been separated from the service in any of the following modes: resignation,
    retirement,
    dropped from the rolls, dismissal, termination, end of term, finished contract or phased out
    (abolition)
    in the public or private sector?">
        <x-forms.question-group name="has_separation_from_service">
            {{-- Details --}}
            <div class="col-12 col-md-6">
                <x-forms.textarea model="separation_details" name="separation_details" :required="$has_separation_from_service"
                    :disabled="!$has_separation_from_service" />
            </div>
        </x-forms.question-group>
    </x-forms.question-card>

    <x-forms.question-card number="38 (a)"
        title="Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?">
        <x-forms.question-group name="is_election_candidate">
            {{-- Details --}}
            <div class="col-12 col-sm-6">
                <x-forms.textarea model="election_details" name="election_details" :required="$is_election_candidate"
                    :disabled="!$is_election_candidate" />
            </div>
        </x-forms.question-group>
    </x-forms.question-card>

    <x-forms.question-card number="38 (b)"
        title="Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?">
        <x-forms.question-group name="has_resigned_for_election">
            {{-- Details --}}
            <div class="col-12 col-md-6">
                <x-forms.textarea model="resignation_details" name="resignation_details" :required="$has_resigned_for_election"
                    :disabled="!$has_resigned_for_election" />
            </div>
        </x-forms.question-group>
    </x-forms.question-card>

    <x-forms.question-card number="39"
        title="Have you acquired the status of an immigrant or permanent resident of another country?">
        <x-forms.question-group name="is_immigrant">
            {{-- Details --}}
            <div class="col-12 col-md-6">
                <x-forms.input label="Country" :required="$is_immigrant" model="immigrant_country" name="immigrant_country"
                    placeholder="e.g., Europe" :disabled="!$is_immigrant"></x-forms.input>
            </div>
        </x-forms.question-group>
    </x-forms.question-card>

    <x-forms.question-card number="40"
        title="Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:">
        {{-- Indigineous member --}}
        <x-forms.question-group name="is_indigenous">
            <x-slot:question>
                a. Are you a member of any indigenous group?
            </x-slot:question>

            <div class="col-6 d-none d-md-block"></div>

            {{-- Details --}}
            <div class="col-md-6 col-12 mb-3 ">
                <x-forms.input label="If YES, give details:" model="indigenous_details" name="indigenious_details"
                    :required="$is_indigenous" :disabled="!$is_indigenous" placeholder="Please specify your indigenous group" />
            </div>
        </x-forms.question-group>

        {{-- Person with disability --}}
        <x-forms.question-group name="is_disabled">
            <x-slot:question>
                b. Are you a person with disability?
            </x-slot:question>

            <div class="col-6 d-none d-md-block"></div>

            {{-- Details --}}
            <div class="col-md-6 col-12 mb-3 ">
                <x-forms.input label="If YES, please specify ID No" model="disabled_person_id" name="disabled_person_id"
                    :required="$is_disabled" :disabled="!$is_disabled"  placeholder="Enter your ID Number" />
            </div>
        </x-forms.question-group>

        {{-- Solo parent --}}
        <x-forms.question-group name="is_solo_parent">
            <x-slot:question>
                c. Are you a solo parent?
            </x-slot:question>

            <div class="col-6 d-none d-md-block"></div>

            {{-- Details --}}
            <div class="col-md-6 col-12 mb-3 ">
                <x-forms.input label="If YES, please specify ID No" model="solo_parent_id" name="solo_parent_id"
                    :required="$is_solo_parent" :disabled="!$is_solo_parent"  placeholder="Enter your ID Number" />
            </div>
        </x-forms.question-group>
    </x-forms.question-card>


    <x-card title="References (Person not related by consanguinity or affinity to applicant/employee)"
        icon="bi-person-lines-fill" loadingTarget="addReferencePeople()">
        @foreach ($references as $index => $entry)
            @include('partials.count-indicator', ['count' => $index])

            @include('partials.form-fields', [
                'modelPrefix' => "references.$index",
                'fields' => [
                    [
                        'label' => 'Fullname',
                        'required' => false,
                        'placeholder' => 'e.g., Juan Dela Cruz',
                    ],
                    [
                        'label' => 'Address',
                        'required' => false,
                        'placeholder' =>
                            'e.g., 123 Rizal St., Barangay San Isidro, Quezon City, Metro Manila, 1100',
                    ],
                    [
                        'label' => 'Telephone No',
                        'required' => false,
                    ],
                ],
            ])

            <div class="col-12 text-end">
                <button type="button" @click="confirmDelete('references', {{ $index }})"
                    class="btn btn-outline-danger btn-sm" @if (count($references) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Remove Entry
                </button>
            </div>
        @endforeach

        @slot('footer')
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" wire:click="removeAllReferencePeople()" class="btn btn-outline-danger btn-sm"
                    @if (count($references) === 1) disabled @endif>
                    <i class="bi bi-trash3-fill me-1"></i>
                    Clear All Entries
                </button>
                <button type="button" wire:click="addReferencePeople()" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle-fill me-1"></i>
                    Add Another Entry
                </button>
            </div>
        @endslot
    </x-card>
</div>
