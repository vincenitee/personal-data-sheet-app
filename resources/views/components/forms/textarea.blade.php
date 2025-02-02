@props([
    'model' => null,
    'type' => 'text',
    'icon' => false,
    'label' => 'If YES, give details',
    'name',
    'required' => false,
    'placeholder' => '',
    'disabled' => true,
])

<x-forms.input-field
    :model="$model"
    :icon="$icon"
    :label="$label"
    :name="$name"
    :required="$required"
>
    <textarea
        class="form-control"
        name="{{ $name }}"
        id="{{ $name }}"
        rows="3"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        @if($model) wire:model="{{ $model }}" @endif
    ></textarea>
</x-forms.input-field>
