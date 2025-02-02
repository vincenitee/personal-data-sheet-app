{{-- Form Navigation --}}
<div class="card shadow-sm sticky-top" style="top: 93px;">
    <div class="card-header">
        <h6 class="card-title mb-0">Form Sections</h6>
    </div>

    <div class="card-body p-3">
        {{-- Scrollable Nav for Small Screens --}}
        <nav class="nav nav-pills gap-2 flex-nowrap overflow-auto d-md-none" style="white-space: nowrap;">
            @foreach ($steps as $index => $step)
                <button
                    wire:click="jumpToStep({{ $index }})"
                    class="nav-link text-start {{ $currentStep === $index ? 'active' : '' }} d-flex align-items-center btn-sm"
                    @if ($currentStep < $index) disabled @endif
                    wire:loading.attr="disabled"
                >
                    <i class="{{ $stepsIcon[$index] }} me-2"></i>
                    <span class="text-truncate d-inline-block" style="max-width: 120px;">{{ $step }}</span>
                    <div wire:loading wire:target="jumpToStep({{ $index }})" class="ms-2 spinner-border spinner-border-sm"></div>
                </button>
            @endforeach
        </nav>

        {{-- Full Navigation for Larger Screens --}}
        <nav class="nav nav-pills gap-2 d-none d-md-flex">
            @foreach ($steps as $index => $step)
                <button
                    wire:click="jumpToStep({{ $index }})"
                    class="nav-link text-start {{ $currentStep === $index ? 'active' : '' }} d-flex align-items-center w-100"
                    @if ($currentStep < $index) disabled @endif
                    wire:loading.attr="disabled"
                >
                    <i class="{{ $stepsIcon[$index] }} me-2"></i>
                    <span class="">{{ $step }}</span>
                    <div wire:loading wire:target="jumpToStep({{ $index }})" class="ms-2 spinner-border spinner-border-sm"></div>
                </button>
            @endforeach
        </nav>
    </div>
</div>
