@props(['model' => false, 'icon' => false, 'label', 'name', 'required' => true])

@php
    $hasError = $errors->has($name);
    $defaults = [
        'wire:model' => $model,
        'type' => 'text',
        'class' => 'form-select',
        'name' => $name,
        'id' => $name,
    ];
@endphp

<x-forms.input-field :$model :$icon :$label :$name :$required>
    <select {{ $attributes($defaults) }} style="font-size: 0.9rem">
        {{ $slot }}
    </select>
</x-forms.input-field>
