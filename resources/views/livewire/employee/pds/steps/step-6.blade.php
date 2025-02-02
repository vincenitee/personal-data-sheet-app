{{-- Entry Container --}}
<div class="card card-body mb-2">
    {{-- Entries --}}
    <div class="d-flex flex-column gap-2">
        <div class="card card-body">
            <div class="row g-2">
                {{-- Name and Address of the Organization --}}
                <div class="col-lg-3">
                    <x-forms.input label="Organization Work and Address" name="vol_organization_1" :required="false"></x-forms.input>
                </div>

                {{-- Position / Nature of Work --}}
                <div class="col-lg-3">
                    <x-forms.input label="Position" name="vol_position_1" :required="false"></x-forms.input>
                </div>

                {{-- Inclusive Dates --}}
                <div class="col-lg-2">
                    <x-forms.input icon="bi bi-calendar" label="From" name="vol_start_1" type="date" :required="false"></x-forms.input>
                </div>

                <div class="col-lg-2">
                    <x-forms.input icon="bi bi-calendar" label="To" name="vol_end_1" type="date" :required="false"></x-forms.input>
                </div>

                {{-- Number of Hours --}}
                <div class="col-lg-2">
                    <x-forms.input label="Total Hours" name="vol_hours_1" type="number" min="0" step="0.01" :required="false"></x-forms.input>
                </div>

                {{-- Delete Button --}}
                <div class="col-12 d-flex justify-content-end align-items-end">
                    <button type="button" class="btn btn-sm btn-danger">Delete</button>
                </div>

            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-end mt-2">
        <button type="button" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle pt-1"></i>
            <span>Add Row</span>
        </button>
    </div>
</div>
