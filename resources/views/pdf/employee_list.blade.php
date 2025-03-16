@extends('layouts.print')

@section('title')
    Employee Directory: {{ ucwords(str_replace('_', ' ', $employmentStatus)) }} Staff
@endsection

@section('content')
<div class="employee-directory">
    <div class="directory-header mb-4">
        <div class="directory-meta">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Status:</strong> {{ ucwords(str_replace('_', ' ', $employmentStatus)) }}</p>
                    <p><strong>Total Employees:</strong> {{ count($employees) }}</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p><strong>Generated on:</strong> {{ now()->format('F d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    @if(count($employees) > 0)
    <div class="table-responsive">
        <table class="table table-striped table-bordered" style="font-size: .875rem">
            <thead class="table-dark">
                <tr>
                    <th width="5%" class="text-center">#</th>
                    <th width="30%">Employee Name</th>
                    <th width="30%">Current Position</th>
                    <th width="15%">Contact</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $index => $employee)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <div class="fw-bold">
                                {{ $employee->personalInformation->last_name ?? 'N/A' }},
                                {{ $employee->personalInformation->first_name ?? '' }}
                                {{ $employee->personalInformation->middle_name ? substr($employee->personalInformation->middle_name, 0, 1).'.' : '' }}
                            </div>
                            <div class="text-muted small">{{ $employee->employee_id ?? 'ID Pending' }}</div>
                        </td>
                        <td>
                            @if($employee->workExperiences && $employee->workExperiences->last())
                                <div>{{ $employee->workExperiences->last()->position }}</div>
                                <div class="text-muted small">Since {{ $employee->workExperiences->last()->date_from ? date('M Y', strtotime($employee->workExperiences->last()->date_from)) : 'N/A' }}</div>
                            @else
                                <span class="text-muted">No Position Data</span>
                            @endif
                        </td>

                        <td>
                            @if($employee->personalInformation && $employee->personalInformation->email)
                                <div class="small">{{ $employee->personalInformation->email }}</div>
                            @endif
                            @if($employee->personalInformation && $employee->personalInformation->mobile_no)
                                <div class="small">{{ $employee->personalInformation->mobile_no }}</div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-info mt-3 text-end small">
        <span>Showing {{ count($employees) }} of {{ count($employees) }} employees</span>
    </div>
    @else
    <div class="alert alert-info">
        <i class="bi bi-info-circle me-2"></i>
        No employees found with {{ ucwords(str_replace('_', ' ', $employmentStatus)) }} status.
    </div>
    @endif

    <div class="directory-footer mt-5">
        <div class="row">
            <div class="col-md-6">
                <p class="small">
                    <strong>Note:</strong> This report contains confidential employee information and is intended for authorized personnel only.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="small">
                    <strong>Report ID:</strong> EMP-{{ $employmentStatus }}-{{ now()->format('Ymd') }}
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .employee-directory {
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .directory-header {
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 1rem;
    }
    .directory-meta {
        background-color: #f8f9fa;
        padding: 10px 15px;
        border-radius: 5px;
    }
    .table {
        box-shadow: 0 2px 3px rgba(0,0,0,0.03);
    }
    .table thead th {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table tbody tr:hover {
        background-color: #f5f5f5;
    }
    .directory-footer {
        border-top: 1px solid #dee2e6;
        padding-top: 1rem;
    }
    @media print {
        .directory-meta {
            background-color: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .table thead th {
            background-color: #212529 !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.05) !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>
@endsection