<div class="card card-body">

    <div class="d-flex justify-content-end m-2">
        <x-forms.input name="search" placeholder="Search..." wire:model.live.debounce.250ms="search"></x-forms.input>
    </div>

    {{-- @dump($this->entries()) --}}

    <div class="table-responsive">
        <table class="table table-hover" style="font-size: 14px">
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
                    <th wire:click="sortBy('status')" style="cursor: pointer">
                        Status
                        @if ($sortField === 'status')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('version')" style="cursor: pointer">
                        Version
                        @if ($sortField === 'version')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                </th>
                    <th wire:click="sortBy('created_at')" style="cursor: pointer">
                        Date Submitted
                        @if ($sortField === 'created_at')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th>Actions</th>
                </tr>

            </thead>

            {{--
                Work on this tomorrow
                - determine where should the source of the data will be, at the pds_entries or submissions_table

            --}}
            <tbody>
                @forelse ($this->submissionEntries as $entry)
                    <tr>
                        {{-- @dump($entry) --}}
                        <td class="align-middle">{{ $entry->id }}</td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    {{-- @dump($entry->attachment?->passport_photo) --}}
                                    <img src="{{ asset('storage/' . ($entry->entry->attachment?->passport_photo ?? 'passport_photos/default.png') )}}"
                                        alt="Employee Photo" class="rounded border shadow-sm" width="45"
                                        height="45" style="object-fit: cover">
                                </div>
                                <div class="employee-details">
                                    <h6 class="fw-semibold mb-1"><a href="{{ url(route('submissions.review', $entry->id)) }}" class="nav-link text-primary" wire:navigate>{{ $this->getUserFullName($entry->user) }}</a></h6>
                                    <span class="text-muted fs-7">
                                        Employee ID: <span class="fw-medium">{{ $entry->user->id }}</span>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <span class="badge bg-warning">Under Review</span>
                        </td>
                        <td class="align-middle">
                            {{ $entry->version }}

                            {{-- @dump($entry) --}}
                        </td>
                        <td class="align-middle">
                            {{ $entry->created_at->format('M d, Y') }}
                        </td>
                        <td class="align-middle">
                            {{-- <div class="d-flex align-items-center justify-content-center gap-2">
                            <x-forms.button class="btn-sm btn-primary">View</x-forms.button>
                            <x-forms.button class="btn-sm btn-primary">Download</x-forms.button>
                            <x-forms.button class="btn-sm btn-primary">Print</x-forms.button>
                        </div> --}}

                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots text-secondary"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-start">
                                    <li>
                                        <a href="{{ url(route('submissions.review', $entry->id)) }}" class="dropdown-item">View</a>
                                        <a href="" class="dropdown-item">Download</a>
                                        <a href="" class="dropdown-item">Print</a>
                                    </li>
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
        @if ($this->submissionEntries->hasPages())
            {{ $this->submissionEntries->links() }}
        @else
            <p class="text-muted mx-2">Showing all entries</p>
        @endif
    </div>

</div>
