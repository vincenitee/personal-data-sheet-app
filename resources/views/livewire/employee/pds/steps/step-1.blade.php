<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Basic Information</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="firstname" label="First Name"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="middlename" label="Middle Name (Optional)" :required="false"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="lastame" label="Last Name"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="suffix" label="Suffix" :required="false"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="birthdate" label="Birthdate" type="date"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="birthplace" label="Birthplace"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="sex" label="Sex">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="civil_status" label="Civil Status">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="height" label="Height(m)" type="number"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="weight" label="Weight(kg)" type="number"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="blood_type" label="Blood Type">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>
    </div>
</div>

{{-- Identifiers --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Identifiers</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="gsis_id" label="GSIS ID No" type="number"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="pagibig_id" label="PAG-IBIG ID No" type="number"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="philhealth_id" label="PHILHEALTH ID No" type="number"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="sss_id" label="SSS ID No" type="number"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="tin_id" label="TIN ID No" type="number"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="agency_emp_id" label="AGENCY ID No" type="number"></x-forms.input>
        </div>
    </div>
</div>

{{-- Nationality --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Nationality</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="citizenship" label="Citizenship">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="citizenship_by" label="Citizenship By">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="country" label="Country" disabled>
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>
    </div>
</div>

{{-- Residential Address --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Residential Address</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="residential_region" label="Region">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="residential_province" label="Province">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="residential_municipality" label="Municipality">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="residential_barangay" label="Barangay">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="residential_subdivision" label="Subdivision/Village">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="residential_street" label="Street">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="residential_house" label="House/Block/Lot No">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Permanent Address --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between">
                <small class="fw-bold">Permanent Address</small>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label" for="flexSwitchCheckDefault">
                        <small>Same as Residential Address</small>
                    </label>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="permanent_region" label="Region">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="permanent_province" label="Province">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="permanent_municipality" label="Municipality">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="permanent_barangay" label="Barangay">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="permanent_subdivision" label="Subdivision/Village">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="permanent_street" label="Street">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="permanent_house" label="House/Block/Lot No">
            </x-forms.input>
        </div>

    </div>
</div>

{{-- Contact Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Contact Information</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="telephone_no" label="Telephone Number" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="mobile_no" label="Mobile Number" type="number">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="email" label="Email Address" type="email">
            </x-forms.input>
        </div>
    </div>
</div>
