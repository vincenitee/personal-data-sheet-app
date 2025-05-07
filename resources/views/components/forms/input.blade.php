@props([
    'model' => null,
    'type' => 'text',
    'icon' => false,
    'label' => false,
    'name',
    'required' => true
])

<x-forms.input-field
    :model="$model"
    {{-- :icon="$icon" --}}
    :label="$label"
    :name="$name"
    :required="$required"
>
    @if($type === 'password')
        <div class="input-group" x-data="{ showPassword: false }">
            @if($icon)
                <span class="input-group-text">
                    <i class="bi {{ $icon }}"></i>
                </span>
            @endif
            <input
                :type="showPassword ? 'text' : 'password'"
                name="{{ $name }}"
                id="{{ $name }}"
                class="form-control pe-5"
                value="{{ old($name) }}"
                @if($model) wire:model.blur="{{ $model }}" @endif
                autocomplete="off"
                style="font-size: 0.9rem"
                {{ $attributes }}
            >
            <button
                class="btn position-absolute end-0 top-50 translate-middle-y px-2 py-0"
                type="button"
                @click="showPassword = !showPassword"
                aria-label="Toggle password visibility"
                style="border: none; background: none; outline: none; box-shadow: none; margin-right: 5px; z-index: 5;"
            >
                <i class="bi" :class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
            </button>
        </div>

    @elseif ($type === 'date')
        <div class="input-group">
            {{-- @if($icon) --}}
                <span class="input-group-text">
                    <i class="bi bi-calendar" style="font-size: 0.8rem"></i>
                </span>
            {{-- @endif --}}
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                class="form-control"
                value="{{ old($name) }}"
                @if($model) wire:model.blur="{{ $model }}" @endif
                @if($type === 'file') accept="application/pdf,image/*"  @endif
                autocomplete="off"
                style="font-size: 0.9rem"
                {{ $attributes }}
            >
        </div>
    @else
        <div class="input-group">
            @if($icon)
                <span class="input-group-text">
                    <i class="bi {{ $icon }}" style="font-size: 0.8rem;"></i>
                </span>
            @endif
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                class="form-control"
                value="{{ old($name) }}"
                @if($model) wire:model.blur="{{ $model }}" @endif
                @if($type === 'file') accept="application/pdf,image/*"  @endif
                autocomplete="off"
                style="font-size: 0.9rem"
                {{ $attributes }}
            >
        </div>
    @endif
</x-forms.input-field>