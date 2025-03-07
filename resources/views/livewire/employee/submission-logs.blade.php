<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <h5 class="card-title mb-4">Timeline</h5>

        <ul class="timeline-minimal">
            @forelse ($submissions as $submission)
                <li class="timeline-item mb-3">
                    <div class="d-flex gap-3">
                        <div class="timeline-indicator">
                            <span
                                class="indicator-dot bg-{{ $submission->status === 'approved' ? 'success' : ($submission->status === 'rejected' ? 'danger' : 'warning') }}"></span>
                        </div>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between mb-2">
                                <span
                                    class="status-text text-{{ $submission->status === 'approved' ? 'success' : ($submission->status === 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($submission->status) }}
                                </span>
                                <small class="text-muted">{{ $submission->created_at->format('M d, Y') }}</small>
                            </div>

                            <p class="text-muted small mb-2">{{ $submission->remarks ?: 'No remarks provided' }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    {{ $submission->reviewed_by ?? 'Pending review' }}
                                </small>

                                @if ($submission->status === 'rejected')
                                    <button wire:click="" class="btn btn-sm btn-link p-0 text-warning">
                                        Edit
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li
                    class="timeline-item text-center p-4 bg-light rounded d-flex justify-content-center align-items-center flex-column">
                    <i class="bi bi-inbox-fill text-secondary fs-1"></i>
                    <p class="mt-3">No submission history found.</p>
                    <a href="{{ url(route('employee.pds.create')) }}" wire:navigate.hover
                        class="btn btn-primary btn-sm">Create your first submission</a>
                </li>
            @endforelse
        </ul>
    </div>
</div>
