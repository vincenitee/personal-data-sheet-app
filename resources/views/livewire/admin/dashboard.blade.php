<div class="row g-2 mb-3">
    <!-- Key Metrics Row - 4 equal cards at the top -->
    <div class="col-6 col-md-3">
        @livewire('admin.dashboard.total-employee')
    </div>
    <div class="col-6 col-md-3">
        @livewire('admin.dashboard.approved-pds-entries')
    </div>
    <div class="col-6 col-md-3">
        @livewire('admin.dashboard.pending-pds-entries')
    </div>
    <div class="col-6 col-md-3">
        @livewire('admin.dashboard.revised-pds-entries')
    </div>

    <!-- Primary Charts Row - 2 larger charts -->
    <div class="col-md-6">
        @livewire('admin.charts.employee-chart')
    </div>
    <div class="col-md-6">
        @livewire('admin.charts.job-position-distribution')
    </div>

    <!-- Full-width Chart - Salary Groups -->
    <div class="col-12">
        @livewire('admin.charts.departments')
    </div>

    <!-- Secondary Charts Row - 2 medium charts -->
    <div class="col-md-6">
        @livewire('admin.charts.salary-groups')
    </div>
    <div class="col-md-6">
        @livewire('admin.charts.employee-tenure-chart')
    </div>

    <!-- Demographic Charts Row - 2 medium charts -->
    <div class="col-md-6">
        @livewire('admin.charts.sex-groups')
    </div>
    <div class="col-md-6">
        @livewire('admin.charts.age-groups')
    </div>

    <div class="col-md-6">
        @livewire('admin.charts.employee-increase')
    </div>
    <div class="col-md-6">
        @livewire('admin.charts.training-categories')
    </div>
</div>