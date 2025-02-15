{{-- Spouse Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Spouse Information</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="spouse.first_name"
                name="spouse.first_name"
                label="First Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="spouse.middle_name"
                name="spouse.middle_name"
                label="Middle Name"
                :required="false"
            >
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input
                model="spouse.last_name"
                name="spouse.last_name"
                label="Last Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="spouse.suffix" name="spouse.suffix" label="Suffix" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="spouse.occupation" name="spouse.occupation" label="Occupation">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="spouse.employer" name="spouse.employer" label="Employer/Business Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="spouse.business_address" name="spouse.bussiness_address" label="Business Address">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="spouse.telephone_no" name="spouse.telephone_no" label="Telephone Number">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Father Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Father Information</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="father.first_name" name="father.first__name" label="First Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="father.middle_name" name="father.middle__name" label="Middle Name" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="father.last_name" name="father.last__name" label="Last Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="father.suffix" name="father.suffix" label="Suffix" :required="false">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Mother Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Mother Information</small>
            <p class="text-muted fst-italic" style="font-size: 0.875rem;">
                <strong>Note: </strong>
                Please enter your mother's maiden information (name before marriage).
            </p>
        </div>
        <div class="col-lg-3 col-md-4">
            <x-forms.input model="mother.first_name" name="mother.firstname" label="First Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="mother.middle_name" name="mother.middlename" label="Middle Name" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input model="mother.last_name" name="mother.lastname" label="Last Name">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Children Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Children Information</small>
            <p class="text-muted fst-italic mb-0" style="font-size: 0.875rem;">
                <strong>Note: </strong>
                Please enter your child's fullname (e.g. Juan Dela Cruz Jr.).
            </p>
        </div>

        @include('partials.loading', ['target' => 'addChild', 'message' => 'Adding child rows'])

        <div wire:loading.remove wire:target="addChild" class="row g-3">
            @foreach ($children as $index => $child)
                <div class="col-lg-5 col-md-6">
                    <x-forms.input
                        model="children.{{ $index }}.full_name"
                        label="Full name"
                        name="children.{{ $index }}.full_name"
                    ></x-forms.input>
                </div>

                <div class="col-lg-5 col-md-6">
                    <x-forms.input
                        icon="bi bi-calendar"
                        model="children.{{ $index }}.birth_date"
                        label="Birthdate"
                        name="children{{ $index }}-birth_date"
                        type="date"
                    ></x-forms.input>
                </div>

                <div class="col-lg-2 col-md-12 d-flex align-items-end">
                    <x-forms.button
                        type="button"
                        icon="bi bi-trash"
                        class="btn-danger"
                        wire:click="removeChild({{ $index }})"
                        wire:loading.attr="disabled"
                        :disabled="(count($children) == 1)"
                    />
                </div>
            @endforeach
        </div>

        <div class="d-flex align-items-center justify-content-end">
            <button wire:ignore wire:click="addChild()" type="button"
                class="btn btn-sm btn-outline-primary d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i>

                <span>Add Row</span>
            </button>
        </div>
    </div>
</div>
