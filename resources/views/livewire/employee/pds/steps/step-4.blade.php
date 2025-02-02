{{-- Entry Container --}}
<div class="card card-body mb-2">
    {{-- Entries --}}
    <div class="d-flex flex-column gap-2">
        <div class="card card-body">
            <div class="row g-2">
                {{-- Career Service --}}
                <div class="col-lg-3">
                    <x-forms.input label="Career Service" name="career_service_1" :required="false"></x-forms.input>
                </div>

                {{-- Ratings --}}
                <div class="col-lg-3">
                    <x-forms.input label="Ratings" name="ratings_1" type="number" min="0" step="0.01"
                        placeholder="00.00" :required="false"></x-forms.input>
                </div>

                {{-- Examination Date --}}
                <div class="col-lg-3">
                    <x-forms.input icon="bi bi-calendar" label="Exam Date" name="exam_date_1" type="date"
                        :required="false"></x-forms.input>
                </div>

                {{-- Examination Place --}}
                <div class="col-lg-3">
                    <x-forms.input label="Exam Place" name="exam_place_1" :required="false"></x-forms.input>
                </div>

                {{-- License Number --}}
                <div class="col-lg-3">
                    <x-forms.input label="License Number" name="license_number_1" :required="false"></x-forms.input>
                </div>

                {{-- Date of Validity --}}
                <div class="col-lg-3">
                    <x-forms.input label="Date of Validity" name="date_of_validity_1" :required="false"></x-forms.input>
                </div>

                {{-- Delete Button --}}
                <div class="col-lg-6 d-flex align-items-end justify-content-end">
                    <button class="btn btn-sm btn-danger ">Delete</button>
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
