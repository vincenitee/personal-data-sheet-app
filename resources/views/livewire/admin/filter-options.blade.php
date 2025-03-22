<div wire:ignore>
    <h6 class="mb-3">Filter Settings</h6>
    <div class="accordion accordion-sm accordion-flush mb-3" id="accordionFilter">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-personal" aria-expanded="false" aria-controls="flush-personal">
                    Personal Information
                </button>
            </h2>
            <div id="flush-personal" class="accordion-collapse collapse" >
                <div class="accordion-body">
                    <div class="row g-3">
                        <!-- Name Search -->
                        <div class="col-12">
                            <x-forms.input name="nameSearch" label="Name Search" placeholder="Search by name..."
                                model="nameSearch" :required="false"></x-forms.input>
                        </div>

                        <!-- Age Range -->
                        <div class="col-12">
                            <label class="form-label" style="margin-bottom: 0.2rem;">Age Range</label>
                            <div class="d-flex gap-2">
                                <x-forms.input name="minAge" label="" placeholder="Min" model="minAge"
                                    :required="false" type="number"></x-forms.input>
                                <x-forms.input name="maxAge" label="" placeholder="Max" model="maxAge"
                                    :required="false" type="number"></x-forms.input>
                            </div>
                        </div>

                        <!-- Birth Date Range -->
                        <div class="col-12">
                            <label class="form-label" style="margin-bottom: 0.2rem;">Birth Date Range</label>
                            <div class="row g-2">
                                <div class="col-12 col-sm-6">
                                    <x-forms.input name="birthDateFrom" label="From" placeholder="Min"
                                        model="birthDateFrom" :required="false" type="date"></x-forms.input>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <x-forms.input name="birthDateTo" label="To" placeholder="Max"
                                        model="birthDateTo" :required="false" type="date"></x-forms.input>
                                </div>
                            </div>
                        </div>

                        <!-- Sex -->
                        <div class="col-6">
                            <x-forms.select name="sexFilter" label="Sex" model="sexFilter" :required="false"
                                placeholder="All">
                                @foreach (['male' => 'Male', 'female' => 'Female'] as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>

                        <!-- Civil Status -->
                        <div class="col-6">
                            <x-forms.select name="civilStatusFilter" label="Civil Status" model="civilStatusFilter"
                                :required="false" placeholder="All">
                                @foreach ($civilStatus as $cstatus)
                                    <option value="{{ $cstatus->value }}">{{ Str::title(strtolower($cstatus->name)) }}
                                    </option>
                                @endforeach
                            </x-forms.select>
                        </div>

                        <!-- Blood Type -->
                        <div class="col-6">
                            <x-forms.select name="bloodTypeFilter" label="Blood Type" model="bloodTypeFilter"
                                :required="false" placeholder="All">
                                @foreach ($bloodType as $btype)
                                    <option value="{{ $btype->value }}">{{ $btype->value }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-educational" aria-expanded="false" aria-controls="flush-educational">
                    Educational Background
                </button>
            </h2>
            <div id="flush-educational" class="accordion-collapse collapse" >
                <div class="accordion-body">
                    <div class="row g-3">
                        <!-- Education Level -->
                        <div class="col-12">
                            <x-forms.select name="educationLevelFilter" label="Education Level"
                                model="educationLevelFilter" :required="false" placeholder="All">
                                @foreach (['elementary' => 'Elementary', 'secondary' => 'Secondary', 'vocational' => 'Vocational', 'college' => 'College', 'graduate_studies' => 'Graduate Studies'] as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </x-forms.select>
                        </div>

                        <!-- School Name -->
                        <div class="col-12">
                            <x-forms.input name="schoolNameSearch" label="School Name" placeholder="Search by school..."
                                model="schoolNameSearch" :required="false"></x-forms.input>
                        </div>

                        <!-- Degree Earned -->
                        <div class="col-12">
                            <x-forms.input name="degreeEarnedSearch" label="Degree Earned"
                                placeholder="Search by degree..." model="degreeEarnedSearch"
                                :required="false"></x-forms.input>
                        </div>

                        <!-- Attendance Date Range -->
                        <div class="col-12">
                            <label class="form-label" style="margin-bottom: 0.2rem;">Attendance Period</label>
                            <div class="row g-2">
                                <div class="col-12 col-sm-6">
                                    <x-forms.input name="attendanceFrom" label="From" placeholder="Start Date"
                                        model="attendanceFrom" :required="false" type="date"></x-forms.input>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <x-forms.input name="attendanceTo" label="To" placeholder="End Date"
                                        model="attendanceTo" :required="false" type="date"></x-forms.input>
                                </div>
                            </div>
                        </div>

                        <!-- Units Earned -->
                        <div class="col-12">
                            <label class="form-label" style="margin-bottom: 0.2rem;">Units Earned</label>
                            <div class="d-flex gap-2">
                                <x-forms.input name="minUnits" label="" placeholder="Min Units"
                                    model="minUnits" :required="false" type="number"></x-forms.input>
                                <x-forms.input name="maxUnits" label="" placeholder="Max Units"
                                    model="maxUnits" :required="false" type="number"></x-forms.input>
                            </div>
                        </div>

                        <!-- Year Graduated -->
                        <div class="col-12">
                            <label class="form-label" style="margin-bottom: 0.2rem;">Year Graduated</label>
                            <div class="d-flex gap-2">
                                <x-forms.input name="minYearGraduated" label="" placeholder="Min Year"
                                    model="minYearGraduated" :required="false" type="number"></x-forms.input>
                                <x-forms.input name="maxYearGraduated" label="" placeholder="Max Year"
                                    model="maxYearGraduated" :required="false" type="number"></x-forms.input>
                            </div>
                        </div>

                        <!-- Academic Honors -->
                        <div class="col-12">
                            <x-forms.input name="academicHonorsSearch" label="Academic Honors"
                                placeholder="Search honors..." model="academicHonorsSearch"
                                :required="false"></x-forms.input>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-workExperience" aria-expanded="false" aria-controls="flush-workExperience">
                    Work Experience
                </button>
            </h2>
            <div id="flush-workExperience" class="accordion-collapse collapse" >
                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                    demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                    body. Nothing more exciting happening here in terms of content, but just filling up the
                    space to make it look, at least at first glance, a bit more representative of how this would
                    look in a real-world application.</div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 align-items-center justify-content-end">
        <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="resetFilters()">Reset</button>
        <button type="button" class="btn btn-sm btn-primary" wire:click="applyFilters()">Apply</button>
    </div>
</div>
