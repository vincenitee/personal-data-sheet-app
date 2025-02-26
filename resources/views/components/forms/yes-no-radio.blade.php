@props(['name', 'value' => false, 'model' => null])

<div class="form-check form-check-inline">
    <input
        class="form-check-input"
        type="radio"
        name="{{ $name }}"
        id="{{ $name }}_yes"
        value="1"
        {{ $value === true ? 'checked' : '' }}
        @if($model) wire:model.live="{{ $model }}" @endif
    >
    <label class="form-check-label" for="{{ $name }}_yes">Yes</label>
</div>
<div class="form-check form-check-inline">
    <input
        class="form-check-input"
        type="radio"
        name="{{ $name }}"
        id="{{ $name }}_no"
        value="0"
        {{ $value === false ? 'checked' : '' }}
        @if($model) wire:model.live="{{ $model }}" @endif
    >
    <label class="form-check-label" for="{{ $name }}_no">No</label>
</div>
