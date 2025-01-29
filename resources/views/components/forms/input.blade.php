@props(['model' => '', 'icon' => false, 'label' => false, 'name', 'required' => true])

@php
    $hasError = $errors->has($name);
    $defaults = [
        'wire:model.defer' => $model,
        'type' => 'text',
        'class' => 'form-control',
        'name' => $name,
        'id' => $name,
        'value' => old($name)
    ];
@endphp

<x-forms.input-field :$model :$icon :$label :$name :$required>
    <input {{ $attributes($defaults) }} autocomplete="off" style="font-size: 0.9rem">
</x-forms.input-field>
