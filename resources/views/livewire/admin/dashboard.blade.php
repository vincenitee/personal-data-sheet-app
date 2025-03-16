<div class="row g-2 mb-3">
    <!-- Employee Stats Card -->
    <div class="col-md-4 col-lg-3">
        @livewire('admin.dashboard.total-employee', ['lazy' => true])
    </div>

    <div class="col-md-4 col-lg-3">
        @livewire('admin.dashboard.pending-pds-entries', ['lazy' => true])
    </div>

    <div class="col-md-4 col-lg-3">
        @livewire('admin.dashboard.approved-pds-entries', ['lazy' => true])
    </div>

    <div class="col-md-4 col-lg-3">
        @livewire('admin.dashboard.revised-pds-entries', ['lazy' => true])
    </div>

    {{-- Charts and Graphs --}}
    <div class="col-md-6">
        @livewire('admin.charts.employee-chart')
    </div>

    <div class="col-md-6">
        @livewire('admin.charts.job-position-distribution')
    </div>

    <div class="col-md-6">
        @livewire('admin.charts.employee-tenure-chart')
    </div>

    <div class="col-md-6">
        @livewire('admin.charts.sex-groups')
    </div>
</div>