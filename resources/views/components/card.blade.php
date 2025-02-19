@props([
    'title' => '',
    'badgeLabel' => 'Required',
    'badgeColor' => 'light',
    'isRequired' => true,
    'collapsed' => false,
])

<div x-data="{ isOpen: {{ $collapsed ? 'false' : 'true' }} }" class="card border-0 shadow-sm mb-2">
    {{-- Card Header --}}
    <div class="card-header bg-{{ $badgeColor }} text-secondary py-3 cursor-pointer"
         @click="isOpen = !isOpen"
         role="button">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">
                <i class="bi {{ $attributes->get('icon') }} me-2"></i>
                {{ $title }}
            </h6>
            <i class="bi bi-chevron-down transition-transform duration-200"
               :class="{ 'rotate-180': isOpen }"></i>
        </div>
    </div>

    <div x-cloak
         x-show="isOpen"
         x-collapse
         x-transition:enter="transition-all ease-out duration-300"
         x-transition:leave="transition-all ease that-in duration-300">
        @if ($attributes->has('loadingTarget'))
            @include('partials.loading', [
                'target' => $attributes->get('loadingTarget'),
                'message' => 'Syncing entries...',
            ])
        @endif

        {{-- Card Body --}}
        <div class="card-body" {{ $attributes->has('loadingTarget') ? 'wire:loading.remove wire:target=' . $attributes->get('loadingTarget') : '' }}>
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


