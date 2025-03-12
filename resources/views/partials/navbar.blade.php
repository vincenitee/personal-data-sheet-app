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
                $isEmployee = Auth::user()->hasRole('employee');
                $notificationCount = count(Auth::user()->unreadNotifications);
            @endphp

            @if ($isEmployee)
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
                    <img src="{{ Vite::asset('resources/images/hris-logo-black.png') }}" alt=""
                        class="rounded-circle border border-primary" style="height: 35px; width: 35px;">
                </button>

                {{-- Dropdown Menu --}}
                <ul class="dropdown-menu dropdown-menu-end" style="max-width: 150px;">
                    <li class="dropdown-item-text">
                        <div class="text-truncate" style="max-width: 100%;">
                            <span class="d-block">{{ auth()->user()->first_name }}
                                {{ auth()->user()->last_name }}</span>
                            <small class="d-block text-muted text-truncate">{{ auth()->user()->email }}</small>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" wire:navigate href="{{ url(route('employee.profile')) }}">
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
