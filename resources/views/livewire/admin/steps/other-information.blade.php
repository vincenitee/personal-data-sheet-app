<x-review-card title="Other Information" icon="bi-info-circle" openCard="{{ $openCard }}">
    <div class="other-info-container">
        <div class="row g-4">
            <!-- Skills and Hobbies Column -->
            <div class="col-md-4">
                <div class="info-category">
                    <div class="category-header mb-3">
                        <h6 class="mb-0"><i class="bi bi-tools me-2"></i>Skills and Hobbies</h6>
                    </div>

                    <div class="category-items">
                        @forelse ($skills as $skill)
                            <div class="info-item mb-2">
                                <span class="item-text">{{ $skill->skill }}</span>
                            </div>
                        @empty
                            <div class="empty-state text-center py-3">
                                <i class="bi bi-tools text-light mb-2" style="font-size: 1.2rem"></i>
                                <p class="text-secondary mb-0">No skills or hobbies listed</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Recognitions Column -->
            <div class="col-md-4">
                <div class="info-category">
                    <div class="category-header mb-3">
                        <h6 class="mb-0"><i class="bi bi-trophy me-2"></i>Non-Academic Distinctions</h6>
                    </div>

                    <div class="category-items">
                        @forelse ($recognitions as $recognition)
                            <div class="info-item mb-2">
                                <span class="item-text">{{ $recognition->recognition }}</span>
                            </div>
                        @empty
                            <div class="empty-state text-center py-3">
                                <i class="bi bi-trophy text-light mb-2" style="font-size: 1.2rem"></i>
                                <p class="text-secondary mb-0">No recognitions listed</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Organizations Column -->
            <div class="col-md-4">
                <div class="info-category">
                    <div class="category-header mb-3">
                        <h6 class="mb-0"><i class="bi bi-people me-2"></i>Membership in Organizations</h6>
                    </div>

                    <div class="category-items">
                        @forelse ($organizations as $organization)
                            <div class="info-item mb-2">
                                <span class="item-text">{{ $organization->organization }}</span>
                            </div>
                        @empty
                            <div class="empty-state text-center py-3">
                                <i class="bi bi-people text-light mb-2" style="font-size: 1.2rem"></i>
                                <p class="text-secondary mb-0">No organizations listed</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [
                'submissionId' => $submissionId,
                'pdsSection' => 'other_information',
            ])
        </div>
    @endif

    <style>
        .other-info-container {
            font-size: 0.9rem;
        }

        .info-category {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .category-header h6 {
            font-weight: 600;
            color: #212529;
            font-size: 1rem;
        }

        .info-item {
            background-color: #f8f9fa;
            border-radius: 0.4rem;
            padding: 0.75rem 1rem;
        }

        .item-text {
            color: #495057;
            font-weight: 500;
        }

        .empty-state {
            background-color: #f8f9fa;
            border-radius: 0.4rem;
        }

        .comments-section {
            margin-top: 1.5rem;
        }
    </style>
</x-review-card>
