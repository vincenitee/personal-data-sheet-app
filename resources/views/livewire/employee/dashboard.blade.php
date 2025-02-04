<div class="mt-4">
    <!-- Quick Stats Row -->
    <div class="row mb-4">
        <!-- PDS Status -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted">PDS Status</h6>
                            <h4 class="mb-0">Active</h4>
                        </div>
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Updates -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted">Pending Updates</h6>
                            <h4 class="mb-0">2</h4>
                        </div>
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="fas fa-clock text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Documents -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted">Documents</h6>
                            <h4 class="mb-0">5/7</h4>
                        </div>
                        <div class="rounded-circle bg-info bg-opacity-10 p-3">
                            <i class="fas fa-file text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Last Updated -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="text-muted">Last Updated</h6>
                            <h4 class="mb-0">2d ago</h4>
                        </div>
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                            <i class="fas fa-calendar text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-8">
            <!-- Recent Activity -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Recent Activity</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <!-- Activity Item -->
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-primary bg-opacity-10 p-2">
                                    <i class="fas fa-edit text-primary"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">PDS Updated</h6>
                                <p class="text-muted mb-0">You updated your work experience section</p>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                        <!-- Activity Item -->
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-success bg-opacity-10 p-2">
                                    <i class="fas fa-upload text-success"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Document Uploaded</h6>
                                <p class="text-muted mb-0">New training certificate added</p>
                                <small class="text-muted">3 days ago</small>
                            </div>
                        </div>
                        <!-- Activity Item -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle bg-info bg-opacity-10 p-2">
                                    <i class="fas fa-comment text-info"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Review Comment</h6>
                                <p class="text-muted mb-0">HR requested updates to personal information</p>
                                <small class="text-muted">5 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Document Status -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Document Status</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Document</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Passport Photo</td>
                                    <td><span class="badge bg-success">Verified</span></td>
                                    <td>Jan 15, 2025</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Government ID</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>Jan 20, 2025</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Update</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Training Certificates</td>
                                    <td><span class="badge bg-danger">Missing</span></td>
                                    <td>-</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Upload</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-4">
            <!-- Quick Actions -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-edit me-2"></i>Update PDS
                        </button>
                        <button class="btn btn-outline-success">
                            <i class="fas fa-upload me-2"></i>Upload Document
                        </button>
                        <button class="btn btn-outline-info">
                            <i class="fas fa-download me-2"></i>Download PDS
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-history me-2"></i>View History
                        </button>
                    </div>
                </div>
            </div>

            <!-- Upcoming Deadlines -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Upcoming Deadlines</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-exclamation-circle text-danger me-2"></i>
                            <h6 class="mb-0">Document Update Required</h6>
                        </div>
                        <p class="text-muted small mb-0">Training certificates need updating</p>
                        <small class="text-danger">Due in 5 days</small>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-info-circle text-warning me-2"></i>
                            <h6 class="mb-0">Annual PDS Review</h6>
                        </div>
                        <p class="text-muted small mb-0">Yearly review of your PDS</p>
                        <small class="text-warning">Due in 2 weeks</small>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Notifications</h5>
                    <a href="#" class="text-muted small">View All</a>
                </div>
                <div class="card-body">
                    <div class="notification-item mb-3">
                        <h6 class="mb-1">Document Verification Complete</h6>
                        <p class="text-muted small mb-0">Your passport photo has been verified</p>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                    <div class="notification-item">
                        <h6 class="mb-1">Review Request</h6>
                        <p class="text-muted small mb-0">HR requested updates to your work history</p>
                        <small class="text-muted">1 day ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

