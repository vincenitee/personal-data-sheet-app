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
                    <p class="fw-bold mb-1" style="font-size: 1.2rem;">
                        {{ $last_name }},
                        {{ $first_name }}
                        {{ isset($middle_name) && !empty($middle_name) ? $middle_name[0] : '' }}.
                    </p>
                    <p class="text-muted mb-1" style="font-size: 0.8rem;">
                        Assigned Role: <span class="badge bg-primary">{{ ucWords($role[0]) }}</span>
                    </p>
                    <p class="text-muted mb-3" style="font-size: 0.8rem;">
                        Last Updated: <span>{{ $updated_at }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>


    {{-- Profile Tab --}}
    <div class="col-lg-9 gap-2">
        {{-- Profile --}}
        <div class="card card-body mb-3">
            @if (session('flash'))
                <x-flash-message />
            @endif
            <form wire:submit="updatePersonalInformation" method="POST" class="row g-2">
                <div class="col-12">
                    <span class="text-secondary">Basic Information</span>
                </div>
                <div class="col-lg-4">
                    <x-forms.input model="first_name" name="first_name" label="First Name"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.input model="middle_name" name="middle_name" label="Midlde Name (Optional)"
                        :required="false"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.input model="last_name" name="last_name" label="Last Name"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.select model="sex" name="sex" label="Sex">
                        <option value="">Choose an option</option>
                        @foreach (['male' => 'Male', 'female' => 'Female'] as $index => $value)
                            <option value="{{ $index }}" {{ $index === $sex ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-lg-4">
                    <x-forms.input icon="bi bi-calendar" model="birth_date" type="date" name="birth_date"
                        label="Birthdate" :required="false"></x-forms.input>
                </div>

                <div class="col-lg-4">
                    <x-forms.input model="email" name="email" label="Email Address"></x-forms.input>
                </div>

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}


                @can('edit own user profile')
                    <div class="col-12">
                        <div class="d-flex">
                            <button class="ms-auto btn btn-sm btn-primary">
                                <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading
                                    wire:target="updatePersonalInformation">
                                    <span class="sr-only"></span>
                                </div>
                                Save Changes
                            </button>
                        </div>
                    </div>
                @endcan
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
                        <div class="col-md-6 d-flex flex-column gap-3">

                            <x-forms.input model="current_password" type="password" name="current_password"
                                label="Current Password" required />

                            <x-forms.input model="password" type="password" name="new_password" label="New Password"
                                required />

                            <x-forms.input model="password_confirmation" type="password" name="password_confirmation"
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

                @can('edit own user profile')
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="spinner-border spinner-border-sm ms-1" role="status" wire:loading
                                wire:target="updateSecurityInformation">
                                <span class="sr-only"></span>
                            </div>
                            <button class="ms-auto btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                @endcan
            </form>
        </div>
    </div>

</div>
