<div class="row gap-3 mb-4">
    {{-- Personal Information --}}
    <div class="col-12">
        <div class="card card-body">

            <h6 style="margin-bottom: 0;">Personal Information</h6>
            <p class="small text-muted">Update your personal information</p>

            <x-forms.form method="POST" class="row g-3" wire:submit="savePersonalInformation">
                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="First Name" model="first_name" name="first_name"></x-forms.input>
                </div>

                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="Middle Name" model="middle_name" name="middle_name"
                        :required="false"></x-forms.input>
                </div>

                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="Last Name" model="last_name" name="last_name"></x-forms.input>
                </div>

                <div class="col-md-6 col-lg-5">
                    <x-forms.select label="Sex" name="sex">
                        <option value="">Choose an option</option>
                        @foreach ($sexOptions as $key => $value)
                            <option
                                value="{{ $key }}"
                                @if($sex === $key) selected @endif
                            >
                                {{ $value }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="Birthdate" model="birth_date" name="birth_date" type="date"></x-forms.input>
                </div>

                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="Email" model="email" name="email" type="email"></x-forms.input>
                </div>

                <div class="col-12">
                    <x-forms.button class="btn-sm px-3">

                    Save</x-forms.button>
                </div>
            </x-forms.form>
        </div>
    </div>

    {{-- Password Information --}}

    <div class="col-12">
        <div class="card card-body">
            <h6 style="margin-bottom: 0;">Personal Information</h6>
            <p class="small text-muted">Update your personal information</p>

            <x-forms.form method="POST" class="row g-3" wire:submit="saveSecurityInformation">
                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="Current Password" model="current_password" name="current_password" type="password"></x-forms.input>
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                </div>

                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="New Password" model="password" name="password" type="password"></x-forms.input>
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                </div>

                <div class="col-md-6 col-lg-5">
                    <x-forms.input label="Password Confirmation" model="password_confirmation" name="password_confirmation"
                        type="password"></x-forms.input>
                </div>

                <div class="col-12">
                    <x-forms.button class="btn-sm px-3">Save</x-forms.button>
                </div>
            </x-forms.form>
        </div>
    </div>
</div>
