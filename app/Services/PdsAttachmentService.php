<?php

namespace App\Services;

use Exception;
use App\Models\PdsAttachment;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class PdsAttachmentService
{

    public function store($data)
    {
        DB::beginTransaction();

        try {
            $attachments = PdsAttachment::updateOrCreate(
                ['pds_entry_id' => $data['pds_entry_id']],
                [
                    'passport_photo' => $data['passport_photo'],
                    'right_thumbmark_photo' => $data['right_thumbmark_photo'],
                    'government_id_type' => $data['government_id_type'],
                    'government_id_no' => $data['government_id_no'],
                    'government_id_photo' => $data['government_id_photo'],
                    'signature_photo' => $data['signature_photo'],
                    'otr_photo' => $data['otr_photo'],
                    'diploma_photo' => $data['diploma_photo'],
                    'employement_certificate' => $data['employement_certificate'],
                ]
            );

            DB::commit();
            return $attachments;
        } catch (Exception $e) {
            DB::rollBack();

            // dump($e);

            \Log::error('Failed to update pds attachement: ', $e->getMessage());

            return null;
        }
    }
}
