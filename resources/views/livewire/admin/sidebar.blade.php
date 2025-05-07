<aside {{-- @dd($logoSetting) --}}
    class="bg-{{ $sidebarColor }} bg-gradient text-white vh-100 position-sticky top-0 overflow-hidden position-relative"
    :class="{ 'w-0': !open, 'w-250': open }"
    id="sidebar">

    {{-- Logo and Brand --}}
    <div class="d-flex align-items-center px-3 gap-2 border-bottom border-light" style="height: 80px;">

        <a href="{{ route('admin.dashboard') }}">
            @if (!empty($logoPath) && Str::startsWith($logoPath, 'http'))\
                <img src="{{ $logoPath }}" alt="Logo" id="logo"
                    class="img-fluid mb-2 shadow-sm rounded-circle border"
                    style="height: 45px; width: 45px; object-fit: cover;">
            @elseif (!empty($logoPath))
                <img src="{{ Storage::disk('public')->url('system_logo/' . $logoPath) }}" alt="Logo" id="logo"
                    class="img-fluid mb-2 shadow-sm rounded-circle border"
                    style="height: 45px; width: 45px; object-fit: cover;">
            @else
                <img src="{{ asset('images/hris-logo-white.png') }}" alt="Default Logo" id="logo"
                    class="img-fluid mb-2 shadow-sm rounded-circle border"
                    style="height: 45px; width: 45px; object-fit: cover;">
            @endif
        </a>


        <span>Digital PDS</span>
        <button @click="open = false" class="ms-auto btn btn-sm text-white">
            <span class="fs-5">&times;</span>
        </button>
    </div>

    {{-- Menu Items --}}
    <ul class="nav flex-column gap-1 mt-3">
        <li class="nav-item {{ request()->is('admin/dashboard') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                <i class="bi bi-speedometer2 me-1" style="font-size: 1.1rem;"></i>
                <span>Dashboard</span><br>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/add-user') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ route('admin.add-user') }}" class="nav-link text-white">
                <i class="bi bi-person-plus me-1" style="font-size: 1.1rem;"></i>
                <span>Add User</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/users') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ route('admin.users') }}" class="nav-link text-white">
                <i class="bi bi-people me-1" style="font-size: 1.1rem;"></i>
                <span>Manage Users</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/manage-signups') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ route('admin.manage-signup') }}" class="nav-link text-white">
                <i class="bi bi-person-check me-1" style="font-size: 1.1rem;"></i>
                <span>Signups</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/submissions') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ url(route('admin.submissions')) }}" class="nav-link text-white">
                <i class="bi bi-file-earmark-text me-1" style="font-size: 1.1rem;"></i>
                <span>Submission Entries</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/reports') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ url(route('admin.generate-report')) }}" class="nav-link text-white">
                <i class="bi bi-clipboard-data me-1" style="font-size: 1.1rem;"></i>
                <span>Generate Reports</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/backup') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ url(route('admin.backup')) }}" class="nav-link text-white">
                <i class="bi bi-cloud-upload me-1" style="font-size: 1.1rem;"></i>
                <span>Backups</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/settings') ? 'bg-white bg-opacity-10' : '' }}">
            <a wire:navigate href="{{ url(route('admin.settings')) }}" class="nav-link text-white">
                <i class="bi bi-gear me-1" style="font-size: 1.1rem;"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</aside>
