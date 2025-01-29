@props(['name', 'required'])

<label for="{{ $name }}" class="form-label text-secondary" style="font-size: 0.8rem; margin-bottom: 0.2rem;">
    {{ $slot }}

    @if ($required == true)
        <span class="text-danger fw-bold">*</span>
    @endif
</label>
