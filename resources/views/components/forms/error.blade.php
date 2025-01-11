@props(['error' => false])

@if ($error)
    <p class="fw-bold text-danger" style="font-size: 0.9rem">{{ $error }}</p>
@endif
