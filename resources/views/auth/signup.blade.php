@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="container p-4 d-flex align-items-center justify-content-center">

        <div class="row w-100 d-flex justify-content-center">
            <div class="col-lg-8">
                <x-forms.form method="POST" action="/login">
                    {{-- Logo --}}
                    <div class="d-flex gap-2 flex-column mb-3">
                        <img src="{{ Vite::asset('resources/images/lgu-rosario-logo.png') }}"
                            class="img-fluid rounded-circle mx-auto" style="height: auto; width: 90px;" alt="">
                        <h3 class="fw-bold text-center"> Register </h3>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <x-forms.input label="First Name" name="firstname" />
                        </div>
                        <div class="col-md-4">
                            <x-forms.input label="Middle Name (Optional)" name="middlename" />
                        </div>
                        <div class="col-md-4">
                            <x-forms.input label="Last Name" name="lastname" />
                        </div>
                        <div class="col-md-4">
                            <x-forms.select label="Gender" name="sex" class="choices">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="pansexual">Pansexual</option>
                                <option value="bisexual">Bisexual</option>
                                <option value="lesbian">Lesbian</option>
                                <option value="lesbian">Lesbian</option>
                                <option value="other">Other</option>
                            </x-forms.select>
                        </div>
                        <div class="col-md-4">
                            <x-forms.input label="Date of Birth" name="birthdate" class="datepicker"  />
                        </div>
                        <div class="col-md-4 d-none d-">
                        </div>

                        <div class="col-md-4">
                            <x-forms.input label="Telephone Number" name="telephone_no" type="number" />
                        </div>
                        <div class="col-md-4">
                            <x-forms.input label="Mobile Number" name="mobile_no" type="number" />
                        </div>
                        <div class="col-md-4">
                            <x-forms.input label="Email Address" name="email" />
                        </div>

                        <div class="col-md-6">
                            <x-forms.select label="Region" name="region_id" class="choices">

                            </x-forms.select>
                        </div>
                        <div class="col-md-6">
                            <x-forms.select label="Province" name="province_id" class="choices">

                            </x-forms.select>
                        </div>
                        <div class="col-md-6">
                            <x-forms.select label="Municipality" name="municipality_id" class="choices">

                            </x-forms.select>
                        </div>
                        <div class="col-md-6">
                            <x-forms.select label="Barangay" name="barangay_id" class="choices">

                            </x-forms.select>
                        </div>

                        <div class="col-md-8">
                            <x-forms.input label="Street Name, Building, House No." name="specific_address" />
                        </div>

                        <div class="col-md-4">
                            <x-forms.input label="Zip Code" name="zip_code" />
                        </div>

                        <hr class="text-secondary">

                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <x-forms.input class="mb-3" label="Password" name="password" type="password" />
                                    <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />
                                </div>

                                <div class="col-md-6">
                                    <p class="mb-2" style="font-size: 0.9rem;"> Password Requirements: </p>

                                    <p class="small-text text-muted" style="font-size: 0.8rem;">
                                        Your new password must satisfy all of these requirements:
                                    </p>

                                    <ul class="text-muted mb-0" style="font-size: 0.9rem;">
                                        <li>Minimum of 8 characters</li>
                                        <li>Must contain least one special character</li>
                                        <li>Must contain at least one number</li>
                                        <li>Must contain at leat one uppercase letter</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <x-forms.button>Register</x-forms.button>
                        </div>

                        <div class="col-12">
                            {{-- More Actions --}}
                            <div class="checkbox">
                                <span class="text-secondary" style="font-size: 0.9rem">Already have an account? <a
                                        href="/">Sign in here</a></span><br>
                                <span class="text-secondary" style="font-size: 0.9rem">Forgot your password? <a
                                        href="/reset">Reset
                                        here</a></span>
                            </div>
                        </div>
                    </div>

                </x-forms.form>
            </div>
        </div>
    </div>
@endsection
