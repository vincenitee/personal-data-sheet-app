<?php

namespace App\Livewire\Admin;


use Exception;
use Livewire\Component;
use App\Models\SubmissionComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $submissionId;
    public $pdsSection;
    public $comment;
    public $comments = [];

    public function mount(int $submissionId, string $pdsSection)
    {
        $this->submissionId = $submissionId;
        $this->pdsSection = $pdsSection;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = SubmissionComment::where('submission_id', $this->submissionId)
            ->where('section', $this->pdsSection)
            ->with(['admin.roles']) // Eager load admin and their roles
            ->latest()
            ->get();
    }

    public function submitComment()
    {
        // dd('s');
        $this->validate([
            'comment' => 'required|string|min:3'
        ]);

        SubmissionComment::create([
            'submission_id' => $this->submissionId,
            'admin_id' => Auth::id(),
            'section' => $this->pdsSection, // Change dynamically based on section
            'comment' => trim($this->comment)
        ]);

        $this->comment = '';
        $this->loadComments();
    }

    public function deleteComment(SubmissionComment $comment)
    {
        DB::beginTransaction();

        try {
            $comment->delete();

            DB::commit();

            $this->dispatch('show-toast', ['type' => 'success', 'title' => 'Comment deleted successfully']);

            $this->loadComments();
        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Failed to delete comment', ['error' => $e->getMessage()]);

            $this->dispatch('show-toast', ['type' => 'error', 'title' => 'Failed to delete comment']);
        }
    }

    public function render()
    {
        return view('livewire.admin.comments');
    }
}
