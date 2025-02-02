@props(['icon'])

@if ($icon)
    <span class="input-group-text text-secondary">
        <i class="{{ $icon }}"></i>
    </span>
@endif
