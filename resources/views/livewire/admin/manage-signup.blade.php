<div class="card card-body">
    {{-- @if (session('flash'))
        <x-flash-message />
    @endif --}}

    <div class="d-flex justify-content-end m-2">
        <x-forms.input name="search" placeholder="Search..." wire:model.live.debounce.250ms="search"></x-forms.input>
    </div>

    <div class="table-responsive">
        <table class="table table-hover" style="font-size: 14px">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer;">
                        ID
                        @if ($sortField === 'id')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer;">
                        Fullname
                        @if ($sortField === 'first_name')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('sex')" style="cursor: pointer;">
                        Gender
                        @if ($sortField === 'sex')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th>Status</th>
                    <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                        Date Registered
                        @if ($sortField === 'created_at')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($this->users as $row)
                    <tr>
                        <td class="align-middle">{{ $row->id }}</td>
                        <td class="align-middle">
                            {{ $row->first_name }}
                            {{ optional($row->middle_name)[0] ? optional($row->middle_name)[0] . '.' : '' }}
                            {{ $row->last_name }}
                        </td>
                        <td class="align-middle">{{ ucwords($row->sex) }}</td>
                        <td class="align-middle">
                            <span class="badge bg-warning">{{ ucwords($row->status) }}</span>
                        </td>
                        <td class="align-middle">{{ $row->created_at->format('M d, Y') }}</td>
                        <td class="align-middle text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button
                                    @click="showAlert()"
                                    wire:loading.attr="disabled" class="btn btn-sm btn-success">
                                    <i class="bi bi-check"></i>
                                    <span class="d-none d-md-inline-block">Accept</span>
                                </button>
                                <button
                                    wire:loading.attr="disabled" class="btn btn-sm btn-danger">
                                    <i class="bi bi-x"></i>
                                    <span class="d-none d-md-inline-block">Reject</span>
                                </button>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No new signups</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-3 d-flex justify-content-end">
        {{ $this->users->links() }}
    </div>

</div>

@script
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        $wire.on('signup-processed', (status) => {
            if(status === 'approved'){
                alert('approved');
                return;
            }

            Toast.fire({
                icon: status === 'approved' ? "success" : "error",
                title: `The signup request has been ${status}.`
            });
        })
    </script>
@endscript
