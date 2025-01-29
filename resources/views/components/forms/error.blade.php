@props(['error' => false])

@if($error)
    <p class="mt-1 mb-0 text-danger fw-bold" style="font-size: 0.8rem;">{{ $error }}</p>
@endif
