@props(['icon' => null])

<button {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    @if ($icon) <i class="{{ $icon }}"></i> @endif
    {{ $slot }}
</button>
