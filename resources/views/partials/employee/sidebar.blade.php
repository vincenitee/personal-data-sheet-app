{{-- Sidebar --}}
<aside class="bg-dark text-white vh-100 position-sticky top-0 overflow-hidden position-relative"
    :class="{ 'w-0': !open, 'w-250': open }" @click.outside="if (!event.target.closest('#sidebar-toggler')) open = false"
    id="sidebar">
    {{-- Logo and Brand --}}
    <div class="d-flex align-items-center px-3 gap-2 border-bottom border-secondary" style="height: 80px;">
        <img src="{{ Vite::asset('resources/images/hris-logo-white.png') }}" alt="" id="logo">
        <span>Digital PDS</span>
        <button @click="open = false" class="ms-auto btn btn-sm text-white">
            <span class="fs-5">&times;</span>
        </button>
    </div>

    {{-- Menu Items --}}
    <ul class="nav flex-column gap-1 mt-3">
        <li class="nav-item {{ request()->is('employee/dashboard') ? 'active' : '' }}">
            <a wire:navigate.hover href="{{ url(route('employee.dashboard')) }}" class="nav-link text-white">
                <i class="bi bi-grid me-1" style="font-size: 1.1rem;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('employee/pds/create') ? 'active' : '' }}">
            <a wire:navigate.hover href="{{ url(route('employee.pds.create')) }}" class="nav-link text-white">
                <i class="bi bi-file-plus me-1" style="font-size: 1.1rem;"></i>
                Manage My PDS</a>
        </li>
        <li class="nav-item {{ request()->is('print') ? 'active' : '' }}">
            <a wire:navigate.hover href="{{ url(route('print')) }}" class="nav-link text-white">
                <i class="bi bi-file-plus me-1" style="font-size: 1.1rem;"></i>
                Print My Entry</a>
        </li>
        <li class="nav-item {{ request()->is('employee/submission-logs') ? 'active' : '' }}">
            <a wire:navigate.hover href="{{ url(route('employee.submission.logs')) }}" class="nav-link text-white">
                <i class="bi bi-clock me-1" style="font-size: 1.1rem;"></i>
                Submission Logs</a>
        </li>
        <li class="nav-item {{ request()->is('employee/notification') ? 'active' : '' }}">
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
