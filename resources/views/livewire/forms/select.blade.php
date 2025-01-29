<div wire:ignore>
    @if ($label)
        <label for="{{ $name }}" style="font-size: 0.8rem;"> {{ $label }} </label>
    @endif
    <select wire:model.live="selectedItem" name="{{ $name }}" id="{{ $name }}" class="form-select">
        @foreach ($options as $value => $label)
            <option value="{{ $value }}"> {{ $label }} </option>
        @endforeach
    </select>
</div>
