<div class="container h-100">
    <div class="row h-100">
        <div class="col-lg-8 p-4 mx-auto">
            <div class="card p-4 card-body shadow">
                <x-forms.form wire:submit="save" method="POST">
                    {{-- Logo and Text --}}
                    <div class="d-flex flex-column gap-1 align-items-center mb-3">
                        <img src="{{ Vite::asset('resources/images/hris-logo-white.png') }}" alt="logo"
                            class="img-fluid" id="login-logo">
                        <div class="d-flex flex-column mb-3 align-items-center">
                            <h3 class="fw-bold">Create an account</h3>
                            <span class="text-secondary mx-auto" style="font-size: 0.9rem">Fill out the required fields
                                to create your account</span>
                        </div>
                    </div>

                    {{-- Inputs --}}
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-4">
                            <x-forms.input model="form.first_name" name="first_name" label="First Name" required />
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <x-forms.input model="form.middle_name" name="middle_name" label="Middle Name (Optional)"
                                :required=false />
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <x-forms.input model="form.last_name" name="last_name" label="Last Name" required />
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <livewire:forms.select
                                wire:model="form.sex"
                                label="Sex"
                                name="sex"
                                :options="['male' => 'Male', 'female' => 'Female', 'other' => 'Other']"
                            />
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <livewire:forms.date-picker
                                label="Birthdate"
                                name="birthdate"
                                wire:model="form.birthdate"
                            />
                        </div>

                        <div class="col-md-6 col-lg-4">

                        </div>

                        <div class="col-md-6 col-lg-4">
                            <x-forms.input type="number" model="form.telephone_no" name="telephone_no"
                                label="Telephone Number" :required="false" />
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <x-forms.input type="number" model="form.mobile_no" name="mobile_no"
                                label="Mobile Number" />
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <x-forms.input model="form.email" name="email" label="Email Address" />
                        </div>

                        <div class="col-12">
                            <hr class="text-secondary">
                        </div>

                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <x-forms.input class="mb-3" type="password" model="form.password" name="password" label="Password"
                                        required />

                                    <x-forms.input type="password" model="form.password_confirmation" name="password_confirmation"
                                        label="Password Confirmation" required />
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
                            <x-forms.button>
                                <span>Register</span>
                                <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading>
                                    <span class="sr-only"></span>
                                </div>
                            </x-forms.button>
                        </div>

                        <div class="col-12">
                            <div class="mt-3">
                                <p class="text-muted" style="font-size: 0.9rem; margin-bottom: 0;">
                                    <span>Already have an account?</span>
                                    <a href="{{ route('login') }}">Signin here</a>
                                </p>
                                <p class="text-muted" style="font-size: 0.9rem">
                                    <span>Forgot your password?</span>
                                    <a href="{{ route('password.request') }}">Reset here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </x-forms.form>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('user-registered', () => {
            Swal.fire({
                title: 'Success!',
                text: 'Registered successfully, please wait for the admin to approve your account.',
                icon: 'success',
                confirmButtonText: 'Close'
            })
        })
    </script>
@endscript
