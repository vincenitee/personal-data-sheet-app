<div class="card" wire:ignore>
    <div class="card-header">
        <h6 class="card-title mb-0">
            <div style="font-size: 0.9rem;">
                <i class="bi bi-funnel me-1"></i>Report Filters
            </div>
        </h6>
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation" style="font-size: 0.9rem;">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#planning-tab-pane"
                    type="button" role="tab" aria-controls="planning-tab-pane" aria-selected="true"><i
                        class="bi bi-calendar-range me-1"></i>Planning</button>
            </li>
            <li class="nav-item" role="presentation" style="font-size: 0.9rem;">
                <button class="nav-link" id="compliance-tab" data-bs-toggle="tab" data-bs-target="#compliance-tab-pane"
                    type="button" role="tab" aria-controls="compliance-tab-pane" aria-selected="false"><i
                        class="bi bi-shield-check me-1"></i>Compliance</button>
            </li>
            <li class="nav-item" role="presentation" style="font-size: 0.9rem;">
                <button class="nav-link" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory-tab-pane"
                    type="button" role="tab" aria-controls="inventory-tab-pane" aria-selected="false"><i
                        class="bi bi-box-seam me-1"></i>Inventory</button>
            </li>
        </ul>

        <div class="row g-3 my-2">
            <div class="col-md-6 col-lg-3">
                <x-forms.input model="employeeName" name="employee_name" label="Employee Name" :required="false"
                    placeholder="Search by employee name..."></x-forms.input>
            </div>

            <div class="col-md-6 col-lg-3">
                <x-forms.select model="selectedDepartment" name="department" label="Department" :required="false">
                    @foreach ($offices as $office)
                        <option value="{{ $office['value'] }}">{{ $office['label'] }}</option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="col-md-6 col-lg-3">
                <x-forms.select model="selectedSex" name="sex" label="Sex" :required="false">
                    @foreach (['male' => 'Male', 'female' => 'Female'] as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="col-md-6 col-lg-3">
                <x-forms.select model="selectedEmploymentStatus" name="employment_status" label="Employment Status" :required="false">
                    @foreach ($employmentStatus as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </x-forms.select>
            </div>
        </div>

        <hr>

        <div class="tab-content" id="myTabContent">
            {{-- PLANNING SECTION --}}
            <div class="tab-pane fade show active" id="planning-tab-pane" role="tabpanel" aria-labelledby="planning-tab"
                tabindex="0">
                <div class="row g-3 my-2">
                    <div class="col-md-6 col-lg-3">
                        <x-forms.select model="selectedAgeRange" name="age_group" label="Age" :required="false">
                            @foreach (['under_20', '20_25', '25_30', '35_40', '45_50', '55_60', '60_above'] as $age_group)
                                @php
                                    switch ($age_group) {
                                        case 'under_20':
                                            $label = 'Under 20';
                                            break;
                                        case '60_above':
                                            $label = '60 and above';
                                            break;
                                        default:
                                            $parts = explode('_', $age_group);
                                            $label = $parts[0] . '-' . $parts[1];
                                            break;
                                    }
                                @endphp
                                <option value="{{ $age_group }}">{{ $label }}</option>
                            @endforeach

                        </x-forms.select>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <x-forms.select model="selectedCivilStatus" name="civil_status" label="Civil Status" :required="false">
                            @foreach ($civilStatus as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <x-forms.input model="selectedWorkPosition" name="work_position" label="Work Position" :required="false"
                            placeholder="e.g. Municipal Treasurer">
                        </x-forms.input>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <x-forms.input model="selectedYearsInService" type="number" name="years_in_service" label="Years in Service" :required="false"
                            placeholder="e.g. 20">
                        </x-forms.input>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <x-forms.input model="selectedDateOfAppointment" type="date" name="original_appointment_date"
                            label="Date of Original Appointment" :required="false">
                        </x-forms.input>
                    </div>
                </div>
            </div>

            {{-- COMPLIANCE SECTION --}}
            <div class="tab-pane fade" id="compliance-tab-pane" role="tabpanel" aria-labelledby="compliance-tab"
                tabindex="0">
                <div class="row g-3 my-2">
                    <div class="col-md-6 col-lg-3">
                        <x-forms.select model="selectedEligibility" name="eligibility" label="Civil Service Eligibility" :required="false">
                            @foreach (['eligible', 'not_eligibile'] as $eligibility)
                                <option value="{{ $eligibility }}">
                                    {{ ucwords(str_replace('_', ' ', $eligibility)) }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <x-forms.input model="selectedEligibilityExpirationDate" type="date" name="license_expiry_date"
                            label="License/Eligibility Expiry Date" :required="false"></x-forms.input>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <x-forms.select model="selectedEducationLevel" name="education_level" label="Education Level" :required="false">
                            @foreach ($educationalLevels as $level)
                                <option value="{{ $level['value'] }}">
                                    {{ ucwords(strtolower(str_replace('_', ' ', $level['label']))) }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <x-forms.input model="selectedTrainingHours" type="number" name="training_hours_completed"
                            label="Training Hours Completed" placeholder="e.g. 8" :required="false"></x-forms.input>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <x-forms.select model="selectedSubmissionStatus" name="submission_status" label="Submission Status" :required="false">
                            @foreach ($submissionStatus as $pdsStatus)
                                <option value="{{ $pdsStatus['value'] }}">
                                    {{ ucwords(strtolower(str_replace('_', ' ', $pdsStatus['label']))) }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <x-forms.input model="selectedDateUpdated" type="date" name="date_last_updated" label="Date Last Updated"
                            :required="false"></x-forms.input>
                    </div>
                </div>
            </div>

            {{-- INVENTORY SECTION --}}
            <div class="tab-pane fade" id="inventory-tab-pane" role="tabpanel" aria-labelledby="inventory-tab"
                tabindex="0">
                <div class="row g-3 my-2">
                    <div class="col-md-6 col-lg-3">
                        <x-forms.select model="selectedCitizenship" name="citizenship" label="Citizenship" :required="false">
                            @foreach (['filipino', 'dual'] as $citizenship)
                                <option value="{{ $citizenship }}">
                                    {{ ucwords(str_replace('_', ' ', $citizenship)) }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <x-forms.select model="selectedSalaryGrade" name="salary_grade" label="Salary Grade" :required="false">
                            @for ($i = 1; $i <= 33; $i++)
                                <option value="{{ $i }}">SG {{ $i }}</option>
                            @endfor
                        </x-forms.select>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <x-forms.select model="selectedSalaryStep" name="salary_step" label="Salary Step" :required="false">
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}">Step {{ $i }}</option>
                            @endfor
                        </x-forms.select>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <!-- Clear Filters Button -->
            <button
                class="btn btn-sm btn-outline-secondary"
                @click="$wire.resetFilters()"
                wire:loading.attr="disabled"
                wire:target="resetFilters"
                style="font-size: 0.8rem"
            >
                <span wire:loading wire:target="resetFilters" class="spinner-border spinner-border-sm me-1"></span>
                <i class="bi bi-x-circle me-1" wire:loading.remove wire:target="resetFilters"></i>
                Clear Filters
            </button>

            <!-- Apply Filters Button -->
            <button
                class="btn btn-sm btn-primary"
                @click="$wire.filterUpdate()"
                wire:loading.attr="disabled"
                wire:target="filterUpdate"
                style="font-size: 0.8rem"
            >
                <span wire:loading wire:target="filterUpdate" class="spinner-border spinner-border-sm me-1"></span>
                <i class="bi bi-search me-1" wire:loading.remove wire:target="filterUpdate"></i>
                Apply Filters
            </button>
        </div>

    </div>

</div>
