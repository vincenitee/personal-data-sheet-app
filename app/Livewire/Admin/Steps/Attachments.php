<?php

namespace App\Livewire\Admin\Steps;

use App\Models\PdsAttachment;
use App\Traits\LoadsEmployeeData;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Attachments extends Component
{
    use LoadsEmployeeData;

    public int $submissionId;
    public ?int $attachmentId;

    public $passport_photo = null;
    public $right_thumbmark_photo = null;
    public $government_id_photo = null;
    public $government_id_type = null;
    public $date_of_issuance = null;
    public $government_id_no = null;
    public $signature_photo = null;
    public $otr_photo = null;
    public $diploma_photo = null;
    public $employement_certificate = null;

    public $openCard;
    public $entryStatus;

    public function mount(int $submissionId, ?int $attachmentId = null, string $entryStatus)
    {
        $this->entryStatus = $entryStatus;
        // dd($attachmentId);
        $this->submissionId = $submissionId;
        $this->attachmentId = $attachmentId;

        $this->resetAttachmentProperties();

        if ($this->attachmentId) {
            $attachment = PdsAttachment::find($this->attachmentId);

            if ($attachment) {
                $this->loadAttachments($attachment);
            } else {
                Log::warning("PdsAttachment not found for ID: {$this->attachmentId}");
            }
        } else {
            Log::warning("PdsAttachment ID is null for submission ID: {$this->submissionId}");
        }

        $this->government_id_type = is_string($this->government_id_type)
            ? strtoupper($this->government_id_type)
            : null;
    }

    protected function resetAttachmentProperties()
    {
        // Reset all attachment-related properties to null
        $this->passport_photo = null;
        $this->right_thumbmark_photo = null;
        $this->government_id_photo = null;
        $this->government_id_type = null;
        $this->date_of_issuance = null;
        $this->government_id_no = null;
        $this->signature_photo = null;
        $this->otr_photo = null;
        $this->diploma_photo = null;
        $this->employement_certificate = null; // Fixed typo in variable name
    }

    protected function loadAttachments(PdsAttachment $attachment)
    {
        // Load attachment properties if they exist
        $this->passport_photo = $attachment->passport_photo ?? null;
        $this->right_thumbmark_photo = $attachment->right_thumbmark_photo ?? null;
        $this->government_id_photo = $attachment->government_id_photo ?? null;
        $this->government_id_type = $attachment->government_id_type ?? null;
        $this->date_of_issuance = $attachment->date_of_issuance ?? null;
        $this->government_id_no = $attachment->government_id_no ?? null;
        $this->signature_photo = $attachment->signature_photo ?? null;
        $this->otr_photo = $attachment->otr_photo ?? null;
        $this->diploma_photo = $attachment->diploma_photo ?? null;
        $this->employement_certificate = $attachment->employement_certificate ?? null; // Fixed typo in variable name
    }

    public function render()
    {
        return view('livewire.admin.steps.attachments');
    }
}