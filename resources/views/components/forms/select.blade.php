@props([
    'model' => null,
    'icon' => false,
    'label' => false,
    'name',
    'required' => true
])


<x-forms.input-field
    :model="$model"
    :icon="$icon"
    :label="$label"
    :name="$name"
    :required="$required"
>
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-select"
        value="{{ old($name) }}"
        @if($model) wire:model="{{ $model }}" @endif
        style="font-size: 0.9rem"
        {{ $attributes }}
    >
        {{ $slot }}
    </select>
</x-forms.input-field>
