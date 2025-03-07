<div class="card card-body">
    {{-- Header --}}
    <div class="d-flex align-items-center border-bottom justify-content-between mb-3">
        <div class="d-flex justify-content-center flex-column">
            <h4 class="fw-bold mb-0">PDS Entry Review Form</h4>
            <p class="text-muted">
                <small>
                    Submitted by:
                    <strong>
                        {{ $entry->personalInformation?->first_name }}
                        {{ $entry->personalInformation?->middle_name }}
                        {{ $entry->personalInformation?->last_name }}
                    </strong>
                    on <strong>{{ $entry->created_at->format('F d, Y') }}</strong>
                </small>
            </p>
        </div>

        <div>
            @php
                $status = $entry->status;
                $statusColor = match ($status) {
                    'under_review' => 'warning',
                    'rejected' => 'danger',
                    'approved' => 'success',
                    default => 'secondary',
                };
            @endphp
            <span class="badge bg-{{ $statusColor }}">
                {{ ucwords(str_replace('_', ' ', $status)) }}
            </span>
        </div>
    </div>

    {{-- End of Header --}}

    {{-- Personal Information --}}
    @livewire('admin.steps.personal-information', [
        'submissionId' => $submission->id,
        'personalInfo' => $entry->personalInformation,
    ])

    {{-- @dump($entry->educationalBackgrounds) --}}

    {{-- Family Background --}}
    @livewire('admin.steps.family-background', [
        'submissionId' => $submission->id,
        'spouse' => $entry->spouse,
        'parents' => $entry->parents,
        'children' => $entry->children,
    ])

    @livewire('admin.steps.educational-background', [
        'submissionId' => $submission->id,
        'educationalBackgrounds' => $entry->educationalBackgrounds,
    ])

    @livewire('admin.steps.civil-service', [
        'submissionId' => $submission->id,
        'eligibilities' => $entry->eligibilities,
    ])

    @livewire('admin.steps.work-experience', [
        'submissionId' => $submission->id,
        'workExperiences' => $entry->workExperiences,
    ])

    @livewire('admin.steps.voluntary-work', [
        'submissionId' => $submission->id,
        'volWorkExperiences' => $entry->volWorkExperiences,
    ])

    @livewire('admin.steps.trainings', [
        'submissionId' => $submission->id,
        'trainings' => $entry->trainings,
    ])

    @livewire('admin.steps.other-information', [
        'submissionId' => $submission->id,
        'skills' => $entry->skills,
        'recognitions' => $entry->recognitions,
        'organizations' => $entry->organizations,
    ])

    @livewire('admin.steps.questionnaire', [
        'submissionId' => $submission->id,
        'questionResponses' => $entry->question,
    ])

    @livewire('admin.steps.attachments', [
        'submissionId' => $submission->id,
        'attachment' => $entry?->attachment,
    ])

    <div class="d-flex align-items-center justify-content-end gap-2 mt-4">
        <x-forms.button class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#remarksModal">
            <i class="bi bi-arrow-return-left"></i>
            Return for revisions
        </x-forms.button>
        <x-forms.button class="btn-sm btn-success">
            <i class="bi bi-check-circle"></i>
            Approve Entry
        </x-forms.button>
    </div>

    {{-- Revision Modal --}}
    <div class="modal fade" id="remarksModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h6 class="modal-title">
                        <i class="bi bi-arrow-return-left me-2"></i>
                        Return Submission for Revisions
                    </h6>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Please provide an overall feedback about the required revisions:</p>

                    <div class="mb-3">
                        <x-forms.textarea name="remarks" label="" :required="false"
                            model="remarks"></x-forms.textarea>
                    </div>

                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle me-2"></i>
                        <div>
                            <small>Your feedback will be sent to the submitter along with the notification that
                                revisions are required.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <x-forms.button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </x-forms.button>
                    <x-forms.button type="button" class="btn-sm btn-danger" wire:click="submitForRevisions()">
                        Submit Revision Request
                    </x-forms.button>
                </div>
            </div>
        </div>
    </div>

</div>
