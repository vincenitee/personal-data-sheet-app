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
                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        Email
                        @if ($sortField === 'email')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('sex')" style="cursor: pointer;">
                        Gender
                        @if ($sortField === 'sex')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('department')" style="cursor: pointer;">
                        Office
                        @if ($sortField === 'department')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('status')" style="cursor: pointer;">
                        Status
                        @if ($sortField === 'status')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
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
                @forelse ($this->users as $user)
                    <tr>
                        <td class="align-middle">{{ $user->id }}</td>
                        <td class="align-middle">
                            {{ $user->first_name }}
                            {{ optional($user->middle_name)[0] ? optional($user->middle_name)[0] . '.' : '' }}
                            {{ $user->last_name }}
                        </td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ ucwords($user->sex) }}</td>

                        <td class="align-middle">{{ $this->getValue($user->department) }}</td>
                        <td class="align-middle">
                            <span
                                class="badge
                                {{ $user->status === 'approved' ? 'bg-success' : ($user->status === 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                {{ ucwords($user->status) }}
                            </span>

                        </td>
                        <td class="align-middle">{{ $user->created_at->format('M d, Y') }}</td>
                        {{-- <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots text-secondary"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-start">
                                    <li>
                                        <button @click="acceptSignup({{ $user->id }})" wire:loading.attr="disabled"
                                            class="dropdown-item" @if ($user->status === 'approved') disabled @endif>
                                            <span>Accept</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button @click="rejectSignup({{ $user->id }})" wire:loading.attr="disabled"
                                            class="dropdown-item"
                                            @if ($user->status === 'rejected') disabled @endif>
                                            <span>Reject</span>
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </td> --}}
                        <td class="align-middle text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button @click="acceptSignup({{ $user->id }})" wire:loading.attr="disabled"
                                    class="btn btn-sm btn-success" @if ($user->status === 'approved') disabled @endif>
                                    <i class="bi bi-check"></i>
                                    <span class="d-none d-md-inline-block">Accept</span>
                                </button>
                                <button @click="rejectSignup({{ $user->id }})" wire:loading.attr="disabled"
                                    class="btn btn-sm btn-outline-danger" @if ($user->status === 'rejected') disabled @endif>
                                    <i class="bi bi-x"></i>
                                    <span class="d-none d-md-inline-block">Reject</span>
                                </button>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center"><i class="bi bi-person-x"></i> No new signups</td>
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
