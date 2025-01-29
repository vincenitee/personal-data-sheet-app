{{-- Spouse Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Spouse Information</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_firstname" label="First Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_middlename" label="Middle Name" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_lastname" label="Last Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_suffix" label="Suffix">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_occupation" label="Occupation">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_employer" label="Employer/Business Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_bussiness_address" label="Business Address">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="spouse_telephone_no" label="Telephone Number">
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
            <x-forms.input name="father_firstname" label="First Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="father_middlename" label="Middle Name" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="father_lastname" label="Last Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="father_suffix" label="Suffix">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Mother Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Mother Information</small>
        </div>
        <div class="col-lg-3 col-md-4">
            <x-forms.input name="mother_firstname" label="First Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="mother_middlename" label="Middle Name" :required="false">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="mother_lastname" label="Last Name">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Children Information --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between">
                <small class="fw-bold">Children Information</small>
                <button
                    wire:ignore
                    wire:click="addChild()"
                    type="button"
                    class="float-end btn btn-sm btn-outline-primary d-flex align-items-center gap-2"
                >
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Row</span>

                    <div wire:loading wire:dirty wire:target="addChild()" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-12">
            <table class="table table-sm table-bordered table-hover align-middle" style="font-size: 14px;">
                <thead>
                    <tr>
                        <th style="width: 45%">Full Name</th>
                        <th style="width: 45%">Birthdate</th>
                        <th style="width: 10%">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($children as $index => $child)
                        <tr>
                            <td>
                                <x-forms.input name=""></x-forms.inp>
                            </td>
                            <td>
                                <x-forms.input name="" type="date"></x-forms.inp>
                            </td>
                            <td>
                                <button
                                    wire:click="removeChild({{ $index }})"
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    @if(count($children) === 1) disabled @endif
                                >
                                    Delete
                                    <div wire:loading wire:dirty wire:target="removeChild({{ $index }})" class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
