{{-- Entry Container --}}
<div class="card card-body mb-2">
    {{-- Entries --}}
    <div class="d-flex flex-column gap-3">
        <div class="card card-body shadow-sm">
            <div class="row g-3">
                {{-- Position and Department --}}
                <div class="col-lg-6">
                    <x-forms.input label="Position" name="work_position_1" :required="false"></x-forms.input>
                </div>
                <div class="col-lg-6">
                    <x-forms.input label="Department" name="work_department_1" :required="false"></x-forms.input>
                </div>

                {{-- Salary and Salary Grade --}}
                <div class="col-lg-3">
                    <x-forms.input label="Salary" name="work_salary_1" type="number" :required="false"></x-forms.input>
                </div>
                <div class="col-lg-3">
                    <x-forms.input label="SG & Step" name="work_sg_1" :required="false"
                        placeholder="00-0"></x-forms.input>
                </div>

                {{-- Status and Government Service --}}
                <div class="col-lg-3">
                    <x-forms.select label="Status" name="work_status_1" :required="false">
                        <option value="">Select Status</option>
                        <option>Permanent</option>
                        <option>Temporary</option>
                        <option>Contractual</option>
                        <option>Casual</option>
                        <option>Coterminous</option>
                    </x-forms.select>
                </div>
                <div class="col-lg-3">
                    <x-forms.select label="Gov't Service" name="work_govt_service_1" :required="false">
                        <option value="">Y/N</option>
                        <option value="y">Yes</option>
                        <option value="n">No</option>
                    </x-forms.select>
                </div>

                {{-- Inclusive Dates --}}
                <div class="col-lg-3">
                    <x-forms.input icon="bi bi-calendar" icon="bi bi-calendar" label="From" name="work_start_1" type="date" :required="false"></x-forms.input>
                </div>
                <div class="col-lg-3">
                    <x-forms.input icon="bi bi-calendar" icon="bi bi-calendar" label="To" name="work_end_1" type="date" :required="false"></x-forms.input>
                </div>

                {{-- Delete Button --}}
                <div class="col-lg-6 d-flex justify-content-end align-items-end">
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
