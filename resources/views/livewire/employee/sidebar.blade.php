{{-- Sidebar --}}
<aside class="bg-{{ $sidebarColor }} bg-gradient text-white vh-100 position-sticky top-0 overflow-hidden position-relative"
    :class="{ 'w-0': !open, 'w-250': open }" @click.outside="if (!event.target.closest('#sidebar-toggler')) open = false"
    id="sidebar">
    {{-- Logo and Brand --}}
    <div class="d-flex align-items-center px-3 gap-2 border-bottom border-light" style="height: 80px;">
        @if (!empty($logoPath) && Str::startsWith($logoPath, 'http'))
            <img src="{{ $logoPath }}" alt="Logo" id="logo"
                class="img-fluid mb-2 shadow-sm rounded-circle border"
                style="height: 45px; width: 45px; object-fit: cover;">
        @elseif (!empty($logoPath) && Storage::disk('public')->exists($logoPath))
            <img src="{{ Storage::url($logoPath) }}" alt="Logo" id="logo"
                class="img-fluid mb-2 shadow-sm rounded-circle border"
                style="height: 45px; width: 45px; object-fit: cover;">
        @else
            <img src="{{ Vite::asset('resources/images/hris-logo-white.png') }}" alt="Default Logo" id="logo"
            style="height: 45px; width: 45px; object-fit: cover;"
            >
        @endif

        <span>Digital PDS</span>
        <button @click="open = false" class="ms-auto btn btn-sm text-white">
            <span class="fs-5">&times;</span>
        </button>
    </div>

    {{-- Menu Items --}}
    <ul class="nav flex-column gap-1 mt-3">
        <li class="nav-item {{ request()->is('employee/dashboard') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate.hover href="{{ url(route('employee.dashboard')) }}" class="nav-link text-white">
                <i class="bi bi-grid me-1" style="font-size: 1.1rem;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('employee/pds/create') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate.hover href="{{ url(route('employee.pds.create')) }}" class="nav-link text-white">
                <i class="bi bi-file-plus me-1" style="font-size: 1.1rem;"></i>
                Manage My PDS</a>
        </li>
        {{-- <li class="nav-item {{ request()->is('print') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate.hover href="{{ url(route('print')) }}" class="nav-link text-white">
                <i class="bi bi-printer me-1" style="font-size: 1.1rem;"></i>
                Print My Entry</a> --}}
        </li>
        <li class="nav-item {{ request()->is('employee/submission-logs') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate.hover href="{{ url(route('employee.submission.logs')) }}" class="nav-link text-white">
                <i class="bi bi-clock me-1" style="font-size: 1.1rem;"></i>
                Submission Logs</a>
        </li>
        <li class="nav-item {{ request()->is('employee/notification') ? 'bg-white bg-opacity-10' : '' }}">
            <div class="d-flex justify-content-between align-items-center">
                <a wire:navigate href="{{ url(route('employee.notification')) }}" class="nav-link text-white">
                    <i class="bi bi-bell me-1" style="font-size: 1.1rem;"></i>
                    Notification</a>
                @php
                    $notificationCount = count(Auth::user()->unreadNotifications);
                @endphp

                @if ($notificationCount > 0)
                    <span class="badge bg-danger me-2" style="font-size: 0.8rem;">{{ $notificationCount }}</span>
                @endif
            </div>
        </li>
    </ul>
</aside>
