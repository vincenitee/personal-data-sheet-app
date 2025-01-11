@props(['label', 'name'])


<div class="form-group">
    @if ($label)
        <label class="form-label" for="{{ $name }}" class="text-secondary" style="font-size: 0.8rem;">
            {{ $label }}
        </label>
    @endif

    {{ $slot }}

    <x-forms.error :error="$errors->first()" />
</div>
