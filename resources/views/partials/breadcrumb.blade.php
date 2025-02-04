@php
    $currentUri = request()->path();


    $pages = [
        'dashboard' => 'Dashboard',
        'profile' => 'Profile',
        'pds/create' => 'Add New Entry',
        'notification' => 'Notifications',
    ];

    $currentPage = collect($pages)->first(function ($pageName, $uri) use ($currentUri){
        return str_contains($currentUri, $uri);
    }) ?? 'Dashboard';

@endphp

<nav aria-label="breadcrumb">
    <h4 class="fw-medium" style="margin-bottom: 0;">{{ $currentPage }}</h4>
    <ol class="breadcrumb" style="font-size: 0.9rem">
        <li class="breadcrumb-item"><a href="{{ url(route('employee.dashboard')) }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ $currentPage }}
        </li>
    </ol>
</nav>
