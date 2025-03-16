@props([
    'title' => '',
    'badgeLabel' => 'Required',
    'badgeColor' => 'primary',
    'isRequired' => true,
    'collapsed' => false,
    'openCard' => '',
])

@push('styles')
    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
@endpush

<div x-data="{ isOpen: false }" x-init="$watch('openCard', value => isOpen = (value === '{{ $openCard }}'))" x-bind:isOpen="openCard === '{{ $openCard }}'"
    class="card border-0 shadow-sm mb-2">

    {{-- @dump($openCard) --}}
    {{-- Card Header --}}
    <div class="card-header bg-{{ $badgeColor }} text-light py-3 cursor-pointer"
        @click="openCard = (openCard === '{{ $openCard }}' ? null : '{{ $openCard }}')" role="button">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">
                <i class="bi {{ $attributes->get('icon') }} me-2"></i>
                {{ $title }}
            </h6>
            <i class="bi bi-chevron-down transition-transform duration-200" :class="{ 'rotate-180': isOpen }"></i>
        </div>
    </div>

    {{-- Card Content --}}
    <div x-cloak x-show="isOpen" x-collapse x-transition:enter="transition-all ease-out duration-300"
        x-transition:leave="transition-all ease-in duration-300">
        @if ($attributes->has('loadingTarget'))
            @include('partials.loading', [
                'target' => $attributes->get('loadingTarget'),
                'message' => 'Syncing entries...',
            ])
        @endif

        {{-- Card Body --}}
        <div class="card-body"
            {{ $attributes->has('loadingTarget') ? 'wire:loading.remove wire:target=' . $attributes->get('loadingTarget') : '' }}>
            <div class="row g-3 position-relative">
                {{ $slot }}
            </div>
        </div>

        {{-- Card Footer --}}
        @if (isset($footer))
            <div class="card-footer bg-light py-3">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
