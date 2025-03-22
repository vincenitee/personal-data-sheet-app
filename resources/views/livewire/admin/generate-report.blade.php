<div class="card card-body">
    <div class="row">
        {{-- Filters --}}
        <div class="col-md-3 p-3 border-end">
            @livewire('admin.filter-options')
        </div>

        {{-- Output Table --}}
        <div class="col-md-9 p-3">
            <h6 class="mb-3">Report Configuration</h6>
            <div class="d-flex flex-column gap-2 mb-3">
                <x-forms.input name="reportName" label="Report Title" placeholder="Enter report title"></x-forms.input>

                <x-forms.select name="reportType" label="Output Format" placeholder="Choose a format">
                    <option value="pdf" selected>PDF Document</option>
                    <option disabled>More formats coming soon...</option>
                </x-forms.select>
            </div>

            <div class="d-flex justify-content-end align-items-center gap-2">
                <button type="button" class="btn btn-sm btn-success">
                    <i class="bi bi-download"></i>
                    Export Report
                </button>
                <button type="button" class="btn btn-sm btn-primary">
                    <i class="bi bi-printer"></i>
                    Print Report
                </button>
            </div>

            <h6 class="mb-3">Report Preview</h6>
            <div class="table-responsive">
                <table class="table table-hover table-striped" style="font-size: 0.875rem;">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Name</th>
                            <th class="text-nowrap">Job Position</th>
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">Highest Educational Attainment</th>
                            <th class="text-nowrap">Employment Type</th>
                            <th class="text-nowrap">Years in Service</th>
                            <th class="text-nowrap">Eligibility</th>
                            {{-- <th class="text-nowrap">Status</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee['name'] }}</td>
                                <td>{{ $employee['job_position'] }}</td>
                                <td>{{ $employee['department'] }}</td>
                                <td>{{ $employee['education'] }}</td>
                                <td>{{ $employee['employment_type'] }}</td>
                                <td>{{ $employee['years_in_service'] }}</td>
                                <td>{{ $employee['eligibility'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>


                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
