@props(['type' => 'info', 'message' => ''])

@php
    // Get flash message from session if not directly provided
    $alertType = $type ?? session('flash.status') ?? 'info';
    $alertMessage = $message ?? session('flash.message') ?? '';

    // Map alert types to corresponding Bootstrap icons
    $icons = [
        'success' => 'bi-check-circle-fill',
        'danger' => 'bi-exclamation-triangle-fill',
        'warning' => 'bi-exclamation-circle-fill',
        'info' => 'bi-info-circle-fill',
        'primary' => 'bi-bell-fill',
        'secondary' => 'bi-bell-fill',
        'light' => 'bi-bell-fill',
        'dark' => 'bi-bell-fill',
    ];

    $icon = $icons[$alertType] ?? 'bi-bell-fill';
@endphp

@if($alertMessage)
    <div class="alert alert-{{ $alertType }} alert-dismissible fade show my-3 shadow-sm border-start">
        <div class="d-flex align-items-center">
            <i class="bi {{ $icon }} me-2"></i>

            <div class="flex-grow-1">
                <span>{{ $alertMessage }}</span>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
