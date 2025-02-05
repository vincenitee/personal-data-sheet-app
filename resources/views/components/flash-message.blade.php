@php
    $flash = session('flash', []);
    $type = ($flash['status'] ?? 'success') === 'error' ? 'alert-danger' : 'alert-success';
    $message = $flash['message'] ?? null;
@endphp

@if($message)
    <div class="alert {{ $type }}">
        <small>{{ $message }}</small>
    </div>
@endif
