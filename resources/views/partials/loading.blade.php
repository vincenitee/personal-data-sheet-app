@props(['target' => null, 'message' => ''])

<div class="col-12 text-center"
    wire:loading
    @if(!is_null($target)) wire:target="{{ $target }}" @endif
>
    <div
        class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Syncing address...</span>
    </div>
    <small class="d-block mt-2">{{ $message }}</small>
</div>
