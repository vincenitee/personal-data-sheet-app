<div class="form-check form-check-sm">
    <input
        type="checkbox"
        id="{{ $value }}"
        name="{{ $name ?? $value }}"
        wire:model="{{ $model }}"
        value="{{ $value }}"
        class="form-check-input"
        {{ $attributes->merge(['class' => 'form-check-input']) }}
    >
    <label for="{{ $value }}" class="form-check-label form-label-sm">
        {{ $label }}
    </label>
</div>
