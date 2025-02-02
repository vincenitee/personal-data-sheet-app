{{-- Entry Container --}}
<div class="card card-body mb-2">
    {{-- Entries --}}
    <div class="d-flex flex-column gap-2">
        <div class="card card-body">
            <div class="row g-3 row-cols-1 row-cols-md-2 row-cols-lg-3">
                {{-- Title --}}
                <div class="col">
                    <x-forms.input label="Title" name="learning_title_1" :required="false" />
                </div>

                {{-- Type --}}
                <div class="col">
                    <x-forms.select label="Type" name="learning_type_1" :required="false">
                        <option value="">Select Type</option>
                    </x-forms.select>
                </div>

                {{-- Sponsored By --}}
                <div class="col">
                    <x-forms.input label="Sponsored By" name="learning_sponsor_1" :required="false" />
                </div>

                {{-- Inclusive Dates --}}
                <div class="col-md-6">
                    <x-forms.input icon="bi bi-calendar" label="From" name="learning_started_1" type="date" :required="false" />
                </div>

                <div class="col-md-6">
                    <x-forms.input icon="bi bi-calendar" label="To" name="learning_ended_1" type="date" :required="false" />
                </div>

                {{-- Total Hours --}}
                <div class="col">
                    <x-forms.input label="Total Hours" name="learning_hours_1" type="number" min="0"
                        step="0.01" :required="false" />
                </div>

                {{-- Certificates --}}
                <div class="col-lg-12">
                    <x-forms.input label="Certificates (if applicable)" name="learning_certificate_1" type="file"
                        :required="false" />
                </div>

                {{-- Delete Button (Spanning Full Width on Small Screens) --}}
                <div class="col-lg-12 d-flex justify-content-end align-items-end">
                    <button type="button" class="btn btn-sm btn-danger">
                        <i class="bi bi-trash me-1"></i> Delete
                    </button>
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
