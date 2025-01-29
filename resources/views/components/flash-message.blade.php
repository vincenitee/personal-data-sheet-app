@php
    $status = session('type') ?? 'alert-success';
@endphp

<div class="alert {{ $status }} alert-dismissible fade show">
    <div class="d-flex align-items-center justify-content-between">
        <span style="font-size: 0.9rem">
            {{ session('status') }}
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
