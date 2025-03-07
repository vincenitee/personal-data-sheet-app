<div>
    <x-card title="Basic Information" icon="bi-person">
        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="First Name"
                model="form.first_name"
                name="form.first_name"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Middle Name"
                model="form.middle_name"
                name="form.middle_name"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Last Name"
                model="form.last_name"
                name="form.last_name"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Suffix"
                model="form.suffix"
                name="form.suffix"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Birthdate"
                model="form.birth_date"
                name="form.birth_date"
                icon="bi-calendar"
                type="date"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Birthplace"
                model="form.birth_place"
                name="form.birth_place"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
                label="Sex"
                model="form.sex"
                name="form.sex"
            >
                @foreach ($sexOptions as $key => $value)
                    <option value="{{ $key }}"> {{ $value }} </option>
                @endforeach
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
                label="Civil Status"
                model="form.civil_status"
                name="form.civil_status"
            >
                @foreach ($civilStatusOptions as $key => $value)
                    <option value="{{ $key }}"> {{ $value }} </option>
                @endforeach
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Height(m)"
                model="form.height"
                name="form.height"
            />
        </div>

        {{-- @dump($civilStatusOptions) --}}

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Weight(kg)"
                model="form.weight"
                name="form.weight"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select
                label="Blood Type"
                model="form.blood_type"
                name="form.blood_type"
                :required="false"
            >
                @foreach ($bloodTypeOptions as $key => $value)
                    <option value="{{ $key }}"> {{ $value }} </option>
                @endforeach
            </x-forms.select>
        </div>

    </x-card>

    <x-card title="Identifiers" icon="bi-card-list">
        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="GSIS"
                model="form.identifiers.gsis"
                name="form.identifiers.gsis"
                type="number"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Pag-Ibig"
                model="form.identifiers.pagibig"
                name="form.identifiers.pagibig"
                type="number"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Philhealth"
                model="form.identifiers.philhealth"
                name="form.identifiers.philhealth"
                type="number"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="SSS"
                model="form.identifiers.sss"
                name="form.identifiers.sss"
                type="number"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="TIN"
                model="form.identifiers.tin"
                name="form.identifiers.tin"
                type="number"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Agency Employee ID"
                model="form.identifiers.agency"
                name="form.identifiers.agency"
                type="number"
                :required="false"
            />
        </div>
    </x-card>

    {{-- Nationality --}}
    <livewire:forms.nationality-picker>

    {{-- Addresses --}}
    <livewire:forms.address-picker>

    <x-card title="Contact Information" icon="bi-telephone">
        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Telephone Number"
                model="form.telephone_no"
                name="form.telephone_no"
                type="number"
                :required="false"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Mobile Number"
                model="form.mobile_no"
                name="form.mobile_no"
                type="number"
            />
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                label="Email Address"
                model="form.email"
                name="form.email"
            />
        </div>

    </x-card>
    <x-card title="Contact Information" icon="bi-telephone">
        @include('partials.form-fields', [
            'modelPrefix' => '',
            'fields' => [
                [
                    'label' => 'Telephone No',
                    'required' => false,
                ],
                [
                    'label' => 'Mobile No',
                    'type' => 'number',
                ],
                [
                    'label' => 'Email',
                    'type' => 'email',
                ],
            ],
        ])
    </x-card>

    <div class="">
        <x-forms.button @click="$wire.save">Submit</x-forms.button>
    </div>
</div>
