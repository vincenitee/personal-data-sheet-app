{{-- Navigation Bar --}}
<nav class="navbar py-3 navbar-expand-lg bg-white shadow-sm border border-bottom position-sticky top-0"
    style="z-index: 1050;">
    <div class="container-fluid">
        {{-- Toggler Button --}}
        <button @click="open = !open" class="btn btn-sm" id="sidebar-toggler">
            <i class="bi bi-grid" style="font-size: 1.3rem;"></i>
        </button>

        <div class="d-flex gap-2 align-items-start">
            {{-- Notification --}}
            @php
                $user = Auth::user();
                $role = $user->getRoleNames()[0];
                $notificationCount = count($user->unreadNotifications);
            @endphp

            @if ($role === 'employee')
                <a wire:navigate href="{{ url(route('employee.notification')) }}" type="button"
                    class="my-auto btn btn-sm position-relative">
                    <i class="bi bi-bell" style="font-size: 1.1rem;"></i>

                    @if ($notificationCount > 0)
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    @endif
                </a>
            @endif

            {{-- Employee Profile --}}
            <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                    @if ($role === 'employee')
                        @php
                            $avatar = optional(
                                $user->entries()->latest()->where('status', 'approved')->first(),
                            )->attachment?->passport_photo;
                        @endphp

                        <img src="{{ $avatar ? Storage::url($avatar) : Vite::asset('resources/images/hris-logo-black.png') }}"
                            alt="User Avatar" class="rounded-circle border border-primary"
                            style="height: 35px; width: 35px; object-fit: cover;">
                    @elseif($role === 'admin')
                        <img src="{{ Vite::asset('resources/images/hris-logo-black.png') }}" alt="Admin Avatar"
                            class="rounded-circle border border-primary" style="height: 35px; width: 35px;">
                    @endif

                </button>

                {{-- Dropdown Menu --}}
                <ul class="dropdown-menu dropdown-menu-end" style="max-width: 150px;">
                    <li class="dropdown-item-text">
                        <div class="text-truncate" style="max-width: 100%;">
                            <span class="d-block">{{ $user->first_name }}
                                {{ $user->last_name }}</span>
                            <small class="d-block text-muted text-truncate">{{ $user->email }}</small>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" wire:navigate href="{{ url(route('profile')) }}">
                            <i class="bi bi-user"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <livewire:logout-button />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
