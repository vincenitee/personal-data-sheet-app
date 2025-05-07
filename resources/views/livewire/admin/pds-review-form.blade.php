<div class="card card-body" x-data="{ openCard: null }">
    {{-- Header --}}
    <div class="d-flex align-items-center border-bottom justify-content-between mb-3">

        <div class="d-flex align-items-center gap-3 p-2">

            @php
                $user = $pdsEntry?->user;
                $passportPhoto = $pdsEntry?->attachment?->passport_photo;

                $avatarPath = '';

                if (!empty($passportPhoto) && Storage::disk('public')->exists($passportPhoto)) {
                    // File exists in storage
                    $avatarPath = Storage::disk('public')->url($passportPhoto);
                } else {
                    // Use external avatar if no photo or file not found
                    $avatarPath = asset('images/avatar-placeholder.gif');
                }
            @endphp


                <img src="{{ $avatarPath }}"
                    loading="lazy" alt="Employee Photo" class="rounded border shadow-sm"
                    width="45" height="45" style="object-fit: cover">
            <div class="d-flex justify-content-center flex-column">
                <h4 class="fw-bold mb-0">PDS Entry Review Form</h4>
                <p class="text-muted mb-0">
                    <small>
                        Submitted by:
                        <strong>
                            {{ $pdsEntry->personalInformation?->first_name }}
                            {{ $pdsEntry->personalInformation?->middle_name }}
                            {{ $pdsEntry->personalInformation?->last_name }}
                        </strong>
                        on <strong>
                            @if ($pdsEntry->status === 'approved')
                                {{ $pdsEntry->updated_at->format('F d, Y') }}
                            @else
                                {{ $pdsEntry->created_at->format('F d, Y') }}
                            @endif
                        </strong>
                    </small>
                </p>
            </div>
        </div>


        @php
            $status = $pdsEntry->status;
            $statusColor = match ($pdsEntry->status) {
                'approved' => 'success',
                'under_review' => 'warning',
                'needs_revision' => 'danger',
                'draft' => 'secondary',
                default => 'light',
            };
        @endphp
        <span class="badge bg-{{ $statusColor }}">{{ ucwords(str_replace('_', ' ', $status)) }}</span>


    </div>

    {{-- End of Header --}}

    <div x-data="{ openCard: null }">
        {{-- Personal Information --}}
        @livewire('admin.steps.personal-information', [
            'submissionId' => $submission->id,
            'personalInfo' => $pdsEntry->personalInformation,
            'openCard' => 'personal-information',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Family Background --}}
        @livewire('admin.steps.family-background', [
            'submissionId' => $submission->id,
            'spouse' => $pdsEntry->spouse,
            'parents' => $pdsEntry->parents,
            'children' => $pdsEntry->children,
            'openCard' => 'family-background',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Educational Background --}}
        @livewire('admin.steps.educational-background', [
            'submissionId' => $submission->id,
            'educationalBackgrounds' => $pdsEntry->educationalBackgrounds,
            'openCard' => 'educational-background',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Civil Service --}}
        @livewire('admin.steps.civil-service', [
            'submissionId' => $submission->id,
            'eligibilities' => $pdsEntry->eligibilities,
            'openCard' => 'civil-service',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Work Experience --}}
        @livewire('admin.steps.work-experience', [
            'submissionId' => $submission->id,
            'workExperiences' => $pdsEntry->workExperiences,
            'openCard' => 'work-experience',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Voluntary Work --}}
        @livewire('admin.steps.voluntary-work', [
            'submissionId' => $submission->id,
            'volWorkExperiences' => $pdsEntry->volWorkExperiences,
            'openCard' => 'voluntary-work',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Trainings --}}
        @livewire('admin.steps.trainings', [
            'submissionId' => $submission->id,
            'trainings' => $pdsEntry->trainings,
            'openCard' => 'trainings',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Other Information --}}
        @livewire('admin.steps.other-information', [
            'submissionId' => $submission->id,
            'skills' => $pdsEntry->skills,
            'recognitions' => $pdsEntry->recognitions,
            'organizations' => $pdsEntry->organizations,
            'openCard' => 'other-information',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Questionnaire --}}
        @livewire('admin.steps.questionnaire', [
            'submissionId' => $submission->id,
            'questionResponses' => $pdsEntry->question,
            'openCard' => 'questionnaire',
            'entryStatus' => $pdsEntry->status,
        ])

        {{-- Attachments --}}
        @livewire('admin.steps.attachments', [
            'submissionId' => $submission->id,
            'attachmentId' => $pdsEntry?->attachment->id ?? null,
            'openCard' => 'attachments',
            'entryStatus' => $pdsEntry->status,
        ])
    </div>


    <div class="d-flex align-items-center justify-content-end gap-2 mt-4">
        @if (!in_array($pdsEntry->status, ['approved', 'needs_revision']))
            <x-forms.button class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#remarksModal">
                <i class="bi bi-arrow-return-left"></i>
                Return for revisions
            </x-forms.button>

            <x-forms.button @click="confirmEntryApproval({{ $pdsEntry->id }})" class="btn-sm btn-success">
                <i class="bi bi-check-circle"></i>
                Approve Entry
            </x-forms.button>
        @elseif($pdsEntry->status === 'approved')
            <x-forms.button @click="confirmRevertEntry({{ $pdsEntry->id }})" class="btn-sm btn-warning text-white">
                <i class="bi bi-arrow-counterclockwise"></i>
                Revert to Under Review
            </x-forms.button>
        @endif
    </div>



    {{-- Revision Modal --}}
    <div class="modal fade" id="remarksModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <!-- Header with more visual appeal -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-arrow-return-left me-2"></i>
                        Request Revisions
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body with improved messaging and structure -->
                <div class="modal-body p-4">
                    <p class="fw-medium mb-3">What changes are needed before this submission can be approved?</p>

                    <div class="mb-4">
                        <label for="revision-feedback" class="form-label text-secondary mb-2">Be specific about what
                            needs to be corrected or improved</label>
                        <textarea id="revision-feedback" name="remarks" class="form-control"
                            placeholder="Place your overall feedback here"
                            rows="5" wire:model="remarks"></textarea>
                    </div>

                    <div class="alert alert-info d-flex p-3 rounded-3 bg-light-subtle border-info">
                        <i class="bi bi-info-circle text-info fs-5 me-3 mt-1"></i>
                        <div>
                            <strong>Note:</strong> This feedback will be sent directly to the submitter. Clear,
                            constructive feedback helps ensure revisions meet expectations the first time.
                        </div>
                    </div>
                </div>

                <!-- Footer with improved button styling and layout -->
                <div class="modal-footer border-top-0 pt-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger px-4 d-flex align-items-center"
                        wire:click="submitForRevisions()" wire:loading.attr="disabled" wire:target="submitForRevisions">
                        <span wire:loading wire:target="submitForRevisions">
                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                aria-hidden="true"></span>
                        </span>
                        Request Revisions
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
