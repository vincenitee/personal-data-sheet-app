<div class="card card-body">

    <div class="d-flex flex-column flex-md-row gap-3 justify-content-between align-items-center mb-3">
        <!-- Search input remains at the top right -->
        <div class="d-flex flex-wrap gap-2 align-items-center">
            <!-- Status Filter -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-flex align-items-center gap-1"
                    type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-filter"></i> Status
                    @if ($statusFilter)
                        <span class="badge bg-primary ms-1">1</span>
                    @endif
                </button>
                <ul class="dropdown-menu p-2" style="min-width: 200px;">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-all"
                                wire:model.live="statusFilter" value="" checked>
                            <label class="form-check-label" for="status-all">All</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-approved"
                                wire:model.live="statusFilter" value="approved">
                            <label class="form-check-label" for="status-approved">
                                <span class="badge bg-success">Approved</span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-under-review"
                                wire:model.live="statusFilter" value="under_review">
                            <label class="form-check-label" for="status-under-review">
                                <span class="badge bg-warning">Under Review</span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status-needs-revision"
                                wire:model.live="statusFilter" value="needs_revision">
                            <label class="form-check-label" for="status-needs-revision">
                                <span class="badge bg-danger">Needs Revision</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Date Range Filter -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-flex align-items-center gap-1"
                    type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-calendar-range"></i> Date Range
                    @if ($dateFrom || $dateTo)
                        <span class="badge bg-primary ms-1">1</span>
                    @endif
                </button>
                <div class="dropdown-menu p-3" style="min-width: 280px;">
                    <div class="mb-2">
                        <label for="date-from" class="form-label small">From</label>
                        <input type="date" class="form-control form-control-sm" id="date-from"
                            wire:model.live.debounce.500ms="dateFrom">
                    </div>
                    <div class="mb-2">
                        <label for="date-to" class="form-label small">To</label>
                        <input type="date" class="form-control form-control-sm" id="date-to"
                            wire:model.live.debounce.500ms="dateTo">
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <button class="btn btn-sm btn-outline-secondary" wire:click="resetDateFilter">Clear</button>
                        <button class="btn btn-sm btn-primary" wire:click="applyDateFilter">Apply</button>
                    </div>
                </div>
            </div>

            <!-- Department Filter (if applicable) -->
            {{-- <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-flex align-items-center gap-1" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-building"></i> Department
                    @if ($departmentFilter)
                        <span class="badge bg-primary ms-1">1</span>
                    @endif
                </button>
                <ul class="dropdown-menu p-2" style="min-width: 200px; max-height: 300px; overflow-y: auto;">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="dept-all" wire:model.live="departmentFilter" value="" checked>
                            <label class="form-check-label" for="dept-all">All Departments</label>
                        </div>
                    </li>
                    <!-- This should be populated dynamically from your departments table -->
                    @foreach ($departments ?? [] as $dept)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="dept-{{ $dept->id }}" wire:model.live="departmentFilter" value="{{ $dept->id }}">
                                <label class="form-check-label" for="dept-{{ $dept->id }}">{{ $dept->name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div> --}}

            <!-- Clear All Filters Button -->
            @if ($statusFilter || $dateFrom || $dateTo || $departmentFilter)
                <button class="btn btn-sm btn-danger d-flex align-items-center gap-1" wire:click="resetAllFilters">
                    <i class="bi bi-x-circle"></i> Clear Filters
                </button>
            @endif
        </div>

        <!-- Search input (moved to the right) -->
        <div class="d-flex justify-content-end">
            <div class="input-group">
                <x-forms.input name="search" placeholder="Search..." wire:model.live.debounce.250ms="search"
                    class="form-control-sm"></x-forms.input>
            </div>
        </div>
    </div>

    {{-- @dump($this->entries()) --}}

    <div class="table-responsive">
        <table class="table table-hover" style="font-size: 14px;">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer">
                        ID
                        {{-- @if ($sortField === 'id')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif --}}
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer">
                        Employee
                        @if ($sortField === 'first_name')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer">
                        Office
                        @if ($sortField === 'first_name')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('status')" style="cursor: pointer">
                        Status
                        @if ($sortField === 'status')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>

                    <th wire:click="sortBy('created_at')" style="cursor: pointer">
                        Date Created
                        @if ($sortField === 'created_at')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($this->pdsEntries as $index => $pdsEntry)
                    {{-- @dump($submissionEntry) --}}
                    <tr class="p-4">
                        {{-- @dump($submissionEntry) --}}
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    {{-- @dump($pdsEntry->attachment?->passport_photo) --}}
                                    @php
                                        $user = $pdsEntry?->user;
                                        $passportPhoto = $pdsEntry?->attachment?->passport_photo;

                                        $avatarPath = '';

                                        if (!empty($passportPhoto) && Storage::disk('public')->exists($passportPhoto)) {
                                            // File exists in storage
                                            $avatarPath = Storage::disk('public')->url($passportPhoto);
                                        } else {
                                            $avatarPath = asset('images/avatar-placeholder.gif');
                                        }
                                    @endphp

                                    <img src="{{ $avatarPath }}" loading="lazy" alt="Employee Photo"
                                        class="rounded border shadow-sm" width="45" height="45"
                                        style="object-fit: cover">

                                </div>
                                <div class="employee-details">
                                    <h6 class="fw-semibold mb-1"><a
                                            href="{{ url(route('submissions.review', $pdsEntry->id)) }}"
                                            class="nav-link text-primary"
                                            wire:navigate>{{ $this->getUserFullName($pdsEntry->user) }}</a></h6>
                                    <span class="text-muted fs-7">
                                        Employee ID: <span class="fw-medium">{{ $pdsEntry->user->id }}</span>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            {{ $this->getValue($pdsEntry->user->department) }}
                        </td>
                        <td class="align-middle">
                            @php
                                $status = $pdsEntry->status;
                                $statusColor = match ($status) {
                                    'approved' => 'success',
                                    'under_review' => 'warning',
                                    'needs_revision' => 'danger',
                                    default => 'secondary',
                                };
                            @endphp

                            <span
                                class="badge bg-{{ $statusColor }}">{{ ucwords(str_replace('_', ' ', $status)) }}</span>
                        </td>

                        <td class="align-middle">
                            {{ $pdsEntry->created_at->format('M d, Y') }}
                        </td>
                        <td class="align-middle">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown"
                                    data-bs-boundary="viewport">
                                    <i class="bi bi-three-dots text-secondary"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-start">
                                    @if ($pdsEntry->status === 'under_review')
                                        <li>
                                            <a wire:navigate href="{{ route('submissions.review', $pdsEntry->id) }}"
                                                class="dropdown-item">
                                                Review
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{ route('pds.print', $pdsEntry->id) }}" class="dropdown-item">
                                                Print
                                            </a>
                                        </li>
                                        <li>
                                            <a @click="confirmEntryApproval({{ $pdsEntry->id }})"
                                                class="dropdown-item text-success">
                                                Approve
                                            </a>
                                        </li>
                                    @elseif ($pdsEntry->status === 'approved')
                                        {{-- <li>
                                            <a class="dropdown-item">
                                                Download
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a target="_blank" href="{{ route('pds.print', $pdsEntry->id) }}" class="dropdown-item">
                                                Print
                                            </a>
                                        </li>
                                        <li>
                                            <a @click="confirmRevertEntry({{ $pdsEntry->id }})"
                                                class="dropdown-item text-warning">
                                                Revert to Under Review
                                            </a>
                                        </li>
                                    @elseif ($pdsEntry->status === 'needs_revision')
                                        <li>
                                            <a wire:navigate href="{{ route('submissions.review', $pdsEntry->id) }}"
                                                class="dropdown-item">
                                                View
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No Entries found. Try adjusting your search or filters.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        @if ($this->pdsEntries->hasPages())
            {{ $this->pdsEntries->links() }}
        @else
            <p class="text-muted mx-2">Showing all entries</p>
        @endif
    </div>

</div>
