{{-- Navigation Bar --}}
<nav class="navbar py-3 navbar-expand-lg bg-white shadow-sm border border-bottom position-sticky top-0"
    style="z-index: 1050;">
    <div class="container-fluid">
        {{-- Toggler Button --}}
        <button @click="open = !open" class="btn btn-sm">
            <i class="bi bi-grid" style="font-size: 1.3rem;"></i>
        </button>

        <div class="d-flex gap-2 align-items-start">
            {{-- Notification --}}
            <a wire:navigate href="{{ url(route('employee.notification')) }}" type="button" class="my-auto btn btn-sm position-relative">
                <i class="bi bi-bell" style="font-size: 1.1rem;"></i>
                <span
                    class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </a>

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
                            <span class="d-block">Admin Test</span>
                            <small
                                class="d-block text-muted text-truncate">admintest123withaverylongemail@example.com</small>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-user"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-arrow-box-left"></i>
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
