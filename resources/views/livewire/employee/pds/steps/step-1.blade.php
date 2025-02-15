{{-- Basic Information --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Basic Information</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="first_name"
                name="firstname"
                label="First Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="middle_name"
                name="middlename"
                label="Middle Name (Optional)"
                :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="last_name"
                name="lastame"
                label="Last Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
            model="suffix"
                name="suffix"
                label="Suffix"
                :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                icon="bi bi-calendar"
                model="birth_date"
                name="birth_date"
                label="Birthdate"
                type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="birth_place"
                name="birthplace"
                label="Birthplace">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
                model="sex"
                name="sex"
                label="Sex"
            >
                <option value="">Choose an option</option>
                @foreach ($sexOptions as $key => $label)
                    <option value="{{ $key }}"> {{ $label }} </option>
                @endforeach
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
                model="civil_status"
                name="civil_status"
                label="Civil Status"
            >
                <option value="">Choose an option</option>
                @foreach ($civilStatusOptions as $key => $label)
                    <option value="{{ $key }}"> {{ $label }} </option>
                @endforeach
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="height"
                name="height"
                label="Height(m)"
                type="number">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="weight"
                name="weight"
                label="Weight(kg)"
                type="number">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
                model="blood_type"
                name="blood_type"
                label="Blood Type"
                :required="false">
                <option value="">Choose an option</option>
                @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bt)
                    <option value="{{ $bt }}">{{ $bt }}</option>
                @endforeach
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
            <x-forms.input model="gsis_id" name="gsis_id" label="GSIS ID No" type="number" :required="false"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="pagibig_id" name="pagibig_id" label="PAG-IBIG ID No" type="number" :required="false"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="philhealth_id" name="philhealth_id" label="PHILHEALTH ID No" type="number" :required="false"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="sss_id" name="sss_id" label="SSS ID No" type="number" :required="false"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="tin_id" name="tin_id" label="TIN ID No" type="number" :required="false"></x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="agency_id" name="agency_emp_id" label="AGENCY ID No" type="number" :required="false"></x-forms.input>
        </div>
    </div>
</div>

{{-- Nationality --}}
<livewire:forms.nationality-picker>

{{-- Addresses --}}
<livewire:forms.address-picker>

{{-- Contact Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Contact Information</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="telephone_no" name="telephone_no" label="Telephone Number" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="mobile_no" name="mobile_no" label="Mobile Number" type="number">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="email" name="email" label="Email Address" type="email">
            </x-forms.input>
        </div>
    </div>
</div>

