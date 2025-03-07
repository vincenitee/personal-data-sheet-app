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
    public ?PdsAttachment $attachment;

    public $passport_photo = null;
    public $right_thumbmark_photo = null;
    public $government_id_photo = null;
    public $government_id_type = null;
    public $government_id_no = null;
    public $signature_photo = null;
    public $otr_photo = null;
    public $diploma_photo = null;
    public $employement_certificate = null; // Fixed typo in variable name

    public function mount(
        int $submissionId,
        ?PdsAttachment $attachment
    ) {
        $this->submissionId = $submissionId;
        $this->attachment = $attachment;
        // dd($attachment);
        if ($attachment) {
            $this->loadAttachments($attachment);
        } else {
            Log::warning("PdsAttachment is null for submission ID: {$submissionId}");
        }

        // Ensure $government_id_type is always a string before using strtoupper()
        $this->government_id_type = is_string($this->government_id_type)
            ? strtoupper($this->government_id_type)
            : null;
    }

    public function render()
    {
        return view('livewire.admin.steps.attachments');
    }
}
