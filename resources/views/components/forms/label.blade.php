@props(['name', 'required' => false])

<label for="{{ $name }}" class="form-label" style="font-size: 0.8rem; margin-bottom: 0.2rem;">
    {{ $slot }}

    @if ($required)
        <span class="text-danger fw-bold">*</span>
    @endif
</label>
