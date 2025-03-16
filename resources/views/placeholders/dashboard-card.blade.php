<!-- resources/views/components/dashboard-card-placeholder.blade.php -->
@props([
    'showProgressBar' => true,
])

<div class="card border-0 h-100">
    <div class="card-body p-3">
        <div class="row g-0">
            <!-- Icon placeholder -->
            <div class="col-auto me-3">
                <div class="placeholder-glow">
                    <div class="placeholder rounded-circle" style="height: 44px; width: 44px;"></div>
                </div>
            </div>

            <div class="col">
                <div class="d-flex justify-content-between align-items-start">
                    <!-- Title and count placeholders -->
                    <div class="placeholder-glow" style="width: 70%;">
                        <span class="placeholder col-7 mb-1" style="height: 14px;"></span>
                        <span class="placeholder col-10" style="height: 28px;"></span>
                    </div>

                    <!-- Change percentage badge placeholder -->
                    <div class="placeholder-glow">
                        <span class="placeholder col-12" style="height: 24px; width: 60px; border-radius: 6px;"></span>
                    </div>
                </div>

                @if ($showProgressBar)
                    <!-- Progress bar placeholder -->
                    <div class="mt-2">
                        <div class="placeholder-glow mt-3">
                            <span class="placeholder col-12" style="height: 6px; border-radius: 3px;"></span>
                        </div>

                        <!-- Capacity label placeholders -->
                        <div class="d-flex justify-content-between mt-1">
                            <div class="placeholder-glow" style="width: 40%;">
                                <span class="placeholder col-12" style="height: 14px;"></span>
                            </div>
                            <div class="placeholder-glow" style="width: 15%;">
                                <span class="placeholder col-12" style="height: 14px;"></span>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Change label placeholder -->
                    <div class="mt-1">
                        <div class="placeholder-glow" style="width: 60%;">
                            <span class="placeholder col-12" style="height: 16px;"></span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>