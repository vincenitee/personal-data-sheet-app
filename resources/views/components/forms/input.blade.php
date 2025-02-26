@props([
    'model' => null,
    'type' => 'text',
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
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control"
        value="{{ old($name) }}"
        @if($model) wire:model.blur="{{ $model }}" @endif
        @if($type === 'file') accept="application/pdf,image/*"  @endif
        autocomplete="off"
        style="font-size: 0.9rem"
        {{ $attributes }}
    >
</x-forms.input-field>
