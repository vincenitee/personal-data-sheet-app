@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'name' => $name,
        'id' => $name,
        'class' => 'form-control',
        'value' => old($name)
    ]
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }} autocomplete="off">
</x-forms.field>

