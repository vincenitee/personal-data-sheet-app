@php
    $currentUri = request()->path();


    $pages = [
        'dashboard' => 'Dashboard',
        'profile' => 'Profile',
        'pds/create' => 'Add New Entry'
    ];

    $currentPage = collect($pages)->first(function ($pageName, $uri) use ($currentUri){
        return str_contains($currentUri, $uri);
    }) ?? 'Dashboard';

@endphp

<nav aria-label="breadcrumb">
    <h5 class="fw-medium" style="margin-bottom: 0; font-weight: 700 !important;">{{ $currentPage }}</h5>
    <ol class="breadcrumb" style="font-size: 0.9rem">
        <li class="breadcrumb-item"><a href="{{ url(route('employee.dashboard')) }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ $currentPage }}
        </li>
    </ol>
</nav>
