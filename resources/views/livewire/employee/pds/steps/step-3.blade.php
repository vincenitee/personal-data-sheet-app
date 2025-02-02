{{-- Elementary Level --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Elementary Level</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="elementary_school" label="School Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="elementary_degree" label="Degree Earned">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="elementary_attendance_start" label="Attendance Start" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="elementary_attendance_end" label="Attendance End" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="elementary_highest_level" label="Highest Level/Unit Earned" value="N/A">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="elementary_year_graduated" label="Year Graduated">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="elementary_honors_received" label="Honors Received" value="N/A">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Secondary Level --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Secondary Level</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="secondary_school" label="School Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="secondary_degree" label="Degree Earned">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="secondary_attendance_start" label="Attendance Start" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="secondary_attendance_end" label="Attendance End" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="secondary_highest_level" label="Highest Level/Unit Earned" value="N/A">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="secondary_year_graduated" label="Year Graduated">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="secondary_honors_received" label="Honors Received" value="N/A">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Vocational Level --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Vocational/Trade Course</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="vocational_school" label="School Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="vocational_degree" label="Degree Earned">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="vocational_attendance_start" label="Attendance Start" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="vocational_attendance_end" label="Attendance End" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="vocational_highest_level" label="Highest Level/Unit Earned" value="N/A">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="vocational_year_graduated" label="Year Graduated">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="vocational_honors_received" label="Honors Received" value="N/A">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- College Level--}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">College Level</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="college_school" label="School Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="college_degree" label="Degree Earned">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="college_attendance_start" label="Attendance Start" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="college_attendance_end" label="Attendance End" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="college_highest_level" label="Highest Level/Unit Earned" value="N/A">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="college_year_graduated" label="Year Graduated">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="college_honors_received" label="Honors Received" value="N/A">
            </x-forms.input>
        </div>
    </div>
</div>

{{-- Graduate Studies --}}
<div class="card card-body mb-2">
    <div class="row g-3">
        <div class="col-12">
            <small class="fw-bold">Graduate Studies</small>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="graduate_school" label="School Name">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="graduate_degree" label="Degree Earned">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="graduate_attendance_start" label="Attendance Start" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input icon="bi bi-calendar" name="graduate_attendance_end" label="Attendance End" type="date">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="graduate_highest_level" label="Highest Level/Unit Earned" value="N/A">
            </x-forms.input>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.select name="graduate_year_graduated" label="Year Graduated">
                <option value="">Choose an option</option>
            </x-forms.select>
        </div>

        <div class="col-lg-3 col-md-4">
            <x-forms.input name="graduate_honors_received" label="Honors Received" value="N/A">
            </x-forms.input>
        </div>
    </div>
</div>
