<div class="card card-body">
    @if (session('flash'))
        <x-flash-alerts type="{{ session('flash.status') }}" message="{{ session('flash.message') }}" />
    @endif

    {{-- Search Bar --}}
    <div class="d-flex justify-content-end m-2">
        <x-forms.input wire:model.live.debounce="search" name="search" placeholder="Search..."></x-forms.input>
    </div>

    <div class="table-responsive">
        <div class="container-fluid p-0 mb-4">

        </div>
        <table class="table table-hover" style="font-size: 14px; min-height: 150px;">
            <thead>
                <tr>
                    <th wire:click="sortBy('id')" style="cursor: pointer;">
                        ID
                        @if ($sortField === 'id')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('first_name')" style="cursor: pointer;">
                        First Name
                        @if ($sortField === 'first_name')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('middle_name')" style="cursor: pointer;">
                        Middle Name
                        @if ($sortField === 'middle_name')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('last_name')" style="cursor: pointer;">
                        Last Name
                        @if ($sortField === 'last_name')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('sex')" style="cursor: pointer;">
                        Sex
                        @if ($sortField === 'sex')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>

                    <th wire:click="sortBy('email')" style="cursor: pointer;">
                        Email
                        @if ($sortField === 'email')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th wire:click="sortBy('deactivated')" style="cursor: pointer;">
                        Status
                        @if ($sortField === 'deactivated')
                            <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </th>
                    <th style="cursor: pointer;">
                        Role
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse ($this->users as $user)
                    <tr>
                        <td class="align-middle"> {{ $user->id }} </td>
                        <td class="align-middle"> {{ $user->first_name }} </td>
                        <td class="align-middle"> {{ $user->middle_name }} </td>
                        <td class="align-middle"> {{ $user->last_name }} </td>
                        <td class="align-middle"> {{ ucwords($user->sex) }} </td>
                        <td class="align-middle"> {{ $user->email }} </td>
                        <td class="align-middle">
                            <span class="badge bg-{{ $user->deactivated ? 'secondary' : 'success' }}">
                                {{ $user->deactivated ? 'Deactivated' : 'Active' }}
                            </span>
                        </td>
                        <td class="align-middle">
                            @php
                                $role = $user->getRoleNames()->first();
                                $roleColor = match ($role) {
                                    'admin' => 'danger',
                                    'employee' => 'primary',
                                    default => 'secondary',
                                };
                            @endphp

                            @if ($role)
                                <span class="badge bg-{{ $roleColor }}">{{ ucwords($role) }}</span>
                            @else
                                <span class="badge bg-secondary">No Role</span>
                            @endif
                        </td>

                        <td class="align-middle">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots text-secondary"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-start">
                                    <li>
                                        <a href="{{ url(route('users.edit', $user->id)) }}" class="dropdown-item"
                                            wire:navigate.hover>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <button
                                            @click="toggleUserStatus({{ $user->id }}, {{ $user->deactivated }})"
                                            class="dropdown-item">
                                            {{ $user->deactivated ? 'Activate' : 'Deactivate' }}
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            <i class="bi bi-person-x"></i> No users found. Try adjusting your search or filters.
                        </td>
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
