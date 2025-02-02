
<div class="row g-3 mb-4">
    <div class="col-lg-3">
        <div class="card card-body position-sticky" style="top: 93px;">
            <div class="row g-3">
                <!-- Profile Picture Section -->
                <div class="col-lg-12 text-center">
                    <img src="{{ Vite::asset('resources/images/hris-logo-black.png') }}" alt="Profile Picture"
                        class="rounded-circle border shadow-sm mb-2"
                        style="height: 100px; width: 100px; object-fit: cover;">
                </div>

                <!-- User Details Section -->
                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center">
                    <p class="fw-bold mb-1" style="font-size: 1.2rem;">Bolinget, Vincent A.</p>
                    <p class="text-muted mb-1" style="font-size: 0.8rem;">
                        Assigned Role: <span class="badge bg-primary">Employee</span>
                    </p>
                    <p class="text-muted mb-3" style="font-size: 0.8rem;">
                        Last Updated: <span>12/12/2024 12:00:08</span>
                    </p>
                </div>
            </div>
        </div>
    </div>


    {{-- Profile Tab --}}
    <div class="col-lg-9 gap-2">
        {{-- Profile --}}
        <div class="card card-body mb-3">
            <form method="POST" class="row g-2">
                <div class="col-12">
                    <span class="text-secondary">Basic Information</span>
                </div>
                <div class="col-lg-4">
                    <x-forms.input name="firstname" label="First Name"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.input name="middlename" label="Midlde Name (Optional)" :required="false"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.input name="lastname" label="Last Name"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.select name="sex" label="Sex">
                        <option value="male">Male</option>
                    </x-forms.select>
                </div>

                <div class="col-lg-4">
                    <x-forms.input type="date" name="birthdate" label="Birthdate" :required="false"></x-forms.input>
                </div>

                <div class="col-lg-4">

                </div>

                <div class="col-lg-4">
                    <x-forms.input name="telephone_no" label="Telephone Number" :required="false"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.input name="mobile_no" label="Mobile Number"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.input name="email" label="Email Address"></x-forms.input>
                </div>

                <div class="col-12">
                    <div class="d-flex">
                        <button class="ms-auto btn btn-sm btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Security --}}
        <div class="card card-body">
            <form method="POST" class="row g-2">
                <div class="col-12">
                    <span class="text-secondary">Security Information</span>
                </div>

                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-md-6">

                            <x-forms.input class="mb-3" type="password" name="current_password"
                                label="Current Password" required />

                            <x-forms.input class="mb-3" type="password" name="new_password" label="New Password"
                                required />

                            <x-forms.input type="password" model="form.password_confirmation"
                                name="password_confirmation" label="Password Confirmation" required />
                        </div>

                        <div class="col-md-6 align-items-center">
                            <p class="mb-2" style="font-size: 0.8rem;"> Password Requirements: </p>

                            <p class="small-text text-secondary" style="font-size: 0.8rem;">
                                Your new password must satisfy all of these requirements:
                            </p>

                            <ul class="text-secondary mb-0" style="font-size: 0.9rem;">
                                <li>Minimum of 8 characters</li>
                                <li>Must contain least one special character</li>
                                <li>Must contain at least one number</li>
                                <li>Must contain at leat one uppercase letter</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex">
                        <button class="ms-auto btn btn-sm btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
