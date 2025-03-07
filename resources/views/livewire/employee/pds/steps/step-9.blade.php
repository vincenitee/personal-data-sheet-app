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
                <x-forms.textarea model="fourth_degree_relative" name="fourth_degree_relative" />
            </div>
        </x-forms.question-group>

    </x-forms.question-card>

    <x-forms.question-card number="35 (a)" title="Have you ever been found guilty of any administrative offense?">
        <x-forms.question-group name="has_admin_case">
            {{-- Admin Offense Details --}}
            <div class="col-md-6 col-12">
                <x-forms.textarea model="admin_case_details" name="admin_case_details" />
            </div>
        </x-forms.question-group>

    </x-forms.question-card>

    <x-forms.question-card number="35 (b)" title="Have you been criminally charged before any court?">
        <x-forms.question-group name="has_criminal_charge">
            {{-- Date Field --}}
            <div class="col-md-6 col-12">
                <x-forms.input label="Date Filed" model="criminal_charge_date" name="criminal_charge_date"
                    type="date" :required="false" />

                {{-- Status --}}
                <x-forms.select label="Status of Case/s" model="criminal_charge_status" name="criminal_charge_status"
                    :required="false">
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

    <x-employee.questionnaire.questions.criminal-conviction />

    <x-employee.questionnaire.questions.service-separation />

    <x-employee.questionnaire.questions.election-candidacy />

    <x-employee.questionnaire.questions.resigned-for-election />

    <x-employee.questionnaire.questions.immigration-status />

    <x-employee.questionnaire.questions.special-groups />

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
