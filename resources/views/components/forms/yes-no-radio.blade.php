@props(['name', 'value' => 'no', 'model' => null])

<div class="form-check form-check-inline">
    <input
        class="form-check-input"
        type="radio"
        name="{{ $name }}"
        id="{{ $name }}_yes"
        value="yes"
        {{ $value === 'yes' ? 'checked' : '' }}
        @if($model) wire:model="{{ $model }}" @endif
    >
    <label class="form-check-label" for="{{ $name }}_yes">Yes</label>
</div>
<div class="form-check form-check-inline">
    <input
        class="form-check-input"
        type="radio"
        name="{{ $name }}"
        id="{{ $name }}_no"
        value="no"
        {{ $value === 'no' ? 'checked' : '' }}
        @if($model) wire:model="{{ $model }}" @endif
    >
    <label class="form-check-label" for="{{ $name }}_no">No</label>
</div>
