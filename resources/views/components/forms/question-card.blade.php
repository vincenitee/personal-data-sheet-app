@props(['number', 'title' => null, 'subtitle'])

<div class="card" style="font-size: 14px;">
    <div class="card-header">
        <div class="card-title mb-0">
            <strong>{{ $number }}. </strong>
            {{ $title }}
            <p class="text-danger d-inline">{{ $subtitle ?? '' }}</p>
        </div>
    </div>
    <div {{ $attributes->merge(['class' => 'card-body']) }}>
        {{ $slot }}
    </div>
</div>
