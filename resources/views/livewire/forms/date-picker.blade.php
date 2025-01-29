<div
    wire:ignore
>
    @if ($label)
        <label for="{{ $name }}" style="font-size: 0.8rem;"> {{ $label }} </label>
    @endif

    <div class="input-group">
        <input type="text" class="form-control" value="{{ old($name) }}" style="font-size: 0.8rem;">
        <span class="input-group-text">
            <i class="bi bi-calendar3"></i>
        </span>
    </div>
</div>

