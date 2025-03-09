<?php

namespace App\Mail;

use App\Models\PdsEntry;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PdsEntryStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $status;
    public ?string $revision_comments; // ✅ Made optional
    public ?PdsEntry $entry; // ✅ Made optional (null for returned entries)
    public array $revision_items; // ✅ Default to empty array if no comments exist

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $status, ?string $revision_comments = null, ?PdsEntry $entry = null, array $revision_items = [])
    {
        $this->user = $user;
        $this->status = $status;
        $this->revision_comments = $revision_comments;
        $this->entry = $entry;

        // ✅ Ensure revision items exist, or return an empty array
        $this->revision_items = $revision_items;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'PDS Entry Status Update',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.entry-status',
            with: [
                'user' => $this->user,
                'status' => $this->status,
                'revision_comments' => $this->revision_comments ?? 'No specific comments provided.', // ✅ Default message
                'entry' => $this->entry,
                'revision_items' => $this->revision_items,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
