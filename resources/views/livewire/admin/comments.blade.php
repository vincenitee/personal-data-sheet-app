<div class="comment-section bg-white shadow-sm border-0 rounded-4 overflow-hidden" style="font-size: 0.875rem">
    <div class="comment-header d-flex flex-wrap justify-content-between align-items-center p-3 border-bottom bg-light">
        <h6 class="mb-0 text-primary d-flex align-items-center gap-2">
            <i class="bi bi-chat-left-text"></i>
            Comments
        </h6>
        <span class="badge bg-secondary mt-2 mt-sm-0">
            {{ count($comments) }} {{ Str::plural('comment', count($comments)) }}
        </span>
    </div>

    <!-- Existing Comments -->
    <div class="comments-list px-2 px-sm-3 py-2 overflow-auto" style="max-height: 400px">
        @forelse ($comments as $comment)
            <div class="comment-item border-bottom py-3">
                <!-- Comment Header Section -->
                <div class="d-flex flex-column flex-sm-row justify-content-between gap-2 mb-2">
                    <!-- User Info -->
                    <div class="d-flex align-items-center gap-2">
                        <div class="user-avatar rounded-circle bg-primary-soft text-primary d-flex align-items-center justify-content-center"
                            style="min-width: 32px; height: 32px">
                            {{ Str::substr($comment->admin->first_name, 0, 1) }}
                        </div>
                        <div class="text-break">
                            <h6 class="mb-0 text-dark d-flex flex-wrap align-items-center gap-2">
                                <span class="text-truncate">{{ $comment->admin->first_name }}</span>
                                @php
                                    $role = $comment->admin->getRoleNames()->first();

                                    $roleColor = match ($role) {
                                        'admin' => 'danger',
                                        'employee' => 'primary',
                                        default => 'secondary',
                                    };
                                @endphp
                                <span
                                    class="badge bg-{{ $roleColor }}-soft text-{{ $roleColor }} rounded-pill px-2 py-1"
                                    style="font-size: 0.675rem">
                                    {{ ucwords($role) }}
                                </span>
                            </h6>
                        </div>
                    </div>

                    <!-- Timestamp and Delete Button -->
                    <div class="d-flex align-items-center gap-2">
                        <small class="text-muted text-nowrap">{{ $comment->created_at->diffForHumans() }}</small>
                        @if ($comment->admin_id === auth()->id())
                            <button wire:click="deleteComment({{ $comment->id }})"
                                wire:confirm="Are you sure you want to delete this comment?"
                                class="btn btn-sm btn-outline-danger border-0" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Delete comment">
                                <i class="bi bi-trash"></i>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Comment Content -->
                <p class="text-dark-emphasis mb-0 ps-2 ps-sm-5 text-break">
                    {{ $comment->comment }}
                </p>
            </div>
        @empty
            <div class="text-center text-muted py-4">
                <i class="bi bi-chat-dots opacity-50 mb-2 d-block" style="font-size: 2rem"></i>
                <p class="mb-0">No comments yet.</p>
            </div>
        @endforelse
    </div>

    <!-- New Comment Section -->
    <div class="new-comment-section bg-light p-2 p-sm-3 border-top">
        <h6 class="mb-2 mb-sm-3 text-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-circle"></i>
            Add a Comment
        </h6>
        <div class="mb-2 mb-sm-3">
            <x-forms.textarea label="" name="comment" model="comment" placeholder="Write your comment here..."
                class="form-control rounded-3" rows="3" />
        </div>
        <div class="d-flex justify-content-end align-items-center gap-2">
            <x-forms.button
                wire:click="submitComment()"
                class="btn btn-sm btn-primary d-flex align-items-center gap-2"
            >
                <i wire:loading.remove wire:target="submitComment()" class="bi bi-send"></i>
                <div wire:loading wire:target="submitComment()" class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <span class="d-none d-sm-inline">Submit Comment</span>
                <span class="d-inline d-sm-none">Submit</span>
            </x-forms.button>
        </div>
    </div>
</div>
