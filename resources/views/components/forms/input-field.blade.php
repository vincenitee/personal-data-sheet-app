@props(['model', 'icon', 'label', 'name', 'required'])

<div>
    @if ($label)
        <x-forms.label :$name :$required>
            {{ $label }}
        </x-forms.label>
    @endif

    <div class="input-group">
        @if ($icon)
            <x-forms.input-icon :$icon />
        @endif

        {{ $slot }}

    </div>
    @if ($model)
        @error($model)
            <x-forms.error :error="$message"></x-forms.error>
        @enderror
    @endif
</div>
