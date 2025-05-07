@props([
    'count' => 0,
    'title' => 'Title',
    'changePercentage' => 0,
    'changeLabel' => 'from last month',
    'iconClass' => 'bi-question-circle',
    'colorClass' => 'primary',
    'capacity' => null,
    'capacityPercentage' => null,
    'capacityLabel' => 'Capacity',
    'showProgressBar' => true,
    'href' => '#', // Default: No redirect
])

<a href="{{ $href }}" class="text-decoration-none">
    <div class="card border-0 h-100 shadow-sm">
        <div class="card-body p-3">
            <div class="row g-0">
                <div class="col-auto me-3">
                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-{{ $colorClass }}-subtle"
                        style="height: 44px; width: 44px;">
                        <i class="bi {{ $iconClass }} text-{{ $colorClass }}"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-1 fw-normal">{{ $title }}</h6>
                            <h4 class="mb-0 fw-bold text-muted">{{ $count }}</h4>
                        </div>

                        @if (isset($changePercentage))
                            <span class="badge {{ $changePercentage >= 0 ? 'bg-success bg-opacity-10 text-success' : 'bg-danger bg-opacity-10 text-danger' }} px-2 py-1 fs-xs">
                                <i class="bi {{ $changePercentage >= 0 ? 'bi-arrow-up' : 'bi-arrow-down' }} me-1"></i>
                                {{ abs($changePercentage) }}%
                            </span>
                        @endif
                    </div>

                    @if ($showProgressBar)
                        <div class="mt-2">
                            <div class="progress bg-light" style="height: 6px; border-radius: 3px;">
                                <div class="progress-bar bg-{{ $colorClass }}" role="progressbar"
                                    style="width: {{ $capacityPercentage ?? ($capacity ?? abs($changePercentage)) }}%"
                                    aria-valuenow="{{ $capacityPercentage ?? ($capacity ?? abs($changePercentage)) }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <small class="text-muted">{{ $capacityLabel }}</small>
                                <small class="text-{{ $colorClass }} fw-medium">{{ $capacityPercentage ?? ($capacity ?? abs($changePercentage)) }}%</small>
                            </div>
                        </div>
                    @else
                        <p class="text-muted small mb-0 mt-1">{{ $changeLabel }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</a>
