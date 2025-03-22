<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
        <!-- Form Header -->
        <h5 class="mb-4 text-primary">User Information</h5>

        <x-forms.form method="POST" class="row g-4" wire:submit="save">
            <!-- Section: Personal Information -->
            <div class="col-12 mb-2">
                <h6 class="fw-medium text-primary mb-3 border-bottom pb-2">Personal Information</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <x-forms.input label="First Name" model="first_name" name="first_name"
                            placeholder="Enter first name"></x-forms.input>
                    </div>
                    <div class="col-md-4">
                        <x-forms.input label="Middle Name" model="middle_name" name="middle_name"
                            placeholder="Enter middle name" :required="false"></x-forms.input>
                    </div>
                    <div class="col-md-4">
                        <x-forms.input label="Last Name" model="last_name" name="last_name"
                            placeholder="Enter last name"></x-forms.input>
                    </div>
                    <div class="col-md-4">
                        <x-forms.select label="Sex" name="sex">
                            @foreach ($sexOptions as $key => $value)
                                <option value="{{ $key }}" @if ($sex === $key) selected @endif>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    <div class="col-md-4">
                        <x-forms.input label="Birthdate" model="birth_date" name="birth_date"
                            type="date"></x-forms.input>
                    </div>
                    <div class="col-md-4">
                        <x-forms.select label="Office" model="department" name="department" model="department">
                            @foreach ($departments as $department)
                                <option value="{{ $department['value'] }}">{{ $department['label'] }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                </div>
            </div>

            <!-- Section: Account Information -->
            <div class="col-12 mb-2">
                <h6 class="fw-medium text-primary mb-3 border-bottom pb-2">Account Information</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <x-forms.input label="Email" model="email" name="email" type="email"
                            placeholder="user@example.com" autocomplete="email"></x-forms.input>
                    </div>
                    <div class="col-md-6">
                        <x-forms.input
                            label="Password"
                            model="password"
                            name="password"
                            type="password"
                            placeholder="••••••••"
                            autocomplete="new-password"
                        ></x-forms.input>
                        <small class="text-muted">
                            Leave blank to use the default password: <strong>Dpds#2024!</strong>
                        </small>
                    </div>

                </div>
            </div>

            <!-- Section: Status -->
            <div class="col-12 mb-2">
                <h6 class="fw-medium text-primary mb-3 border-bottom pb-2">Status and Access Control</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <x-forms.select label="Status" model="status" name="status">
                            <option value="0">Active</option>
                            <option value="1">Deactivated</option>
                        </x-forms.select>
                    </div>
                    <div class="col-md-6">
                        <x-forms.select label="Assign Role" model="role" name="role">
                            @foreach ($userRoleOptions as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                </div>
            </div>

            <!-- Form Controls -->
            <div class="col-12 mt-4 d-flex justify-content-end">
                <x-forms.button class="btn-sm btn-primary px-4">Save Changes</x-forms.button>
            </div>
        </x-forms.form>
    </div>
</div>
