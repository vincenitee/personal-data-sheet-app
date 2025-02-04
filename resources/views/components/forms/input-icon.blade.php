@props(['icon'])

@if ($icon)
    <span class="input-group-text text-secondary" style="font-size: 0.8rem">
        <i class="{{ $icon }}"></i>
    </span>
@endif
