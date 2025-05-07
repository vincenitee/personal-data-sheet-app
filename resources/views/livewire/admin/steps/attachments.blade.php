<x-review-card title="Attachments" icon="bi-paperclip" openCard="{{ $openCard }}">
    <div class="attachments-container">
        <!-- Government ID Information Card -->
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="attachment-item mb-4 h-100">
                    <div class="attachment-header">
                        <h6 class="mb-0 attachment-title">Government Issued ID</h6>
                    </div>
                    <div class="attachment-details mt-3">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="info-item">
                                    <span class="info-label">Government ID Type</span>
                                    <span class="info-value">
                                        @if (!empty($government_id_type))
                                            {{ $government_id_type }}
                                        @else
                                            <span class="text-muted">Not specified</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <span class="info-label">Date/Place of Issuance</span>
                                    <span class="info-value">
                                        @if (!empty($date_of_issuance))
                                            {{ \Carbon\Carbon::parse($date_of_issuance)->format('m/d/Y') }}
                                        @else
                                            <span class="text-muted">Not specified</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <span class="info-label">ID/License/Passport Number</span>
                                    <span class="info-value">
                                        @if (!empty($government_id_no))
                                            {{ $government_id_no }}
                                        @else
                                            <span class="text-muted">Not specified</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Government ID Photo Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4 h-100">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">Government ID Photo</h6>

                            @if (empty($government_id_photo))
                                <span class="badge bg-danger">Not Provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <div class="document-container">
                            @php
                                $govt_id_extension = pathinfo(asset($government_id_photo), PATHINFO_EXTENSION);
                                $is_govt_id_pdf = strtolower($govt_id_extension) === 'pdf';
                            @endphp

                            @if ($is_govt_id_pdf)
                                <div class="document-preview d-flex flex-column justify-content-center">
                                    <div class="pdf-icon mb-3">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="document-actions">
                                        <a href="{{ Storage::disk('public')->url($government_id_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View PDF
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($government_id_photo) }}"
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="document-preview">
                                    <div class="image-container">
                                        <img src="{{ Storage::disk('public')->url($government_id_photo) }}" alt="Government ID Photo"
                                            class="document-image">
                                    </div>
                                    <div class="document-actions mt-2">
                                        <a href="{{ Storage::disk('public')->url($government_id_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($government_id_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="attachment-divider my-4">

        <!-- ID Photos Row -->
        <div class="row g-3">
            <!-- Passport Photo Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4 h-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mb-0 attachment-title">Passport Photo</h6>

                        @if (empty($passport_photo))
                            <span class="badge bg-danger">Not Provided</span>
                        @endif
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <div class="document-container">
                            @php
                                $passport_extension = pathinfo(Storage::disk('public')->url($passport_photo), PATHINFO_EXTENSION);
                                $is_passport_pdf = strtolower($passport_extension) === 'pdf';
                            @endphp

                            @if ($is_passport_pdf)
                                <div class="document-preview d-flex flex-column justify-content-center">
                                    <div class="pdf-icon mb-3">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="document-actions">
                                        <a href="{{ Storage::disk('public')->url($passport_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View PDF
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($passport_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="document-preview">
                                    <div class="image-container">
                                        <img src="{{ Storage::disk('public')->url($passport_photo) }}" alt="Passport Photo"
                                            class="document-image">
                                    </div>
                                    <div class="document-actions mt-2">
                                        <a href="{{ Storage::disk('public')->url($passport_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($passport_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Thumbmark Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4 h-100">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">Right Thumbmark</h6>

                            @if (empty($right_thumbmark_photo))
                                <span class="badge bg-danger">Not Provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <div class="document-container">
                            @php
                                $thumbmark_extension = pathinfo(Storage::disk('public')->url($right_thumbmark_photo), PATHINFO_EXTENSION);
                                $is_thumbmark_pdf = strtolower($thumbmark_extension) === 'pdf';
                            @endphp

                            @if ($is_thumbmark_pdf)
                                <div class="document-preview d-flex flex-column justify-content-center">
                                    <div class="pdf-icon mb-3">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="document-actions">
                                        <a href="{{ Storage::disk('public')->url($right_thumbmark_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View PDF
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($right_thumbmark_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="document-preview">
                                    <div class="image-container">
                                        <img src="{{ Storage::disk('public')->url($right_thumbmark_photo) }}" alt="Right Thumbmark"
                                            class="document-image">
                                    </div>
                                    <div class="document-actions mt-2">
                                        <a href="{{ Storage::disk('public')->url($right_thumbmark_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($right_thumbmark_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Signature Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4 h-100">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">Signature</h6>

                            @if (empty($signature_photo))
                                <span class="badge bg-danger">Not Provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <div class="document-container">
                            @php
                                $signature_extension = pathinfo(Storage::disk('public')->url($signature_photo), PATHINFO_EXTENSION);
                                $is_signature_pdf = strtolower($signature_extension) === 'pdf';
                            @endphp

                            @if ($is_signature_pdf)
                                <div class="document-preview d-flex flex-column justify-content-center">
                                    <div class="pdf-icon mb-3">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="document-actions">
                                        <a href="{{ Storage::disk('public')->url($signature_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View PDF
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($signature_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="document-preview">
                                    <div class="image-container">
                                        <img src="{{ Storage::disk('public')->url($signature_photo) }}" alt="Signature"
                                            class="document-image">
                                    </div>
                                    <div class="document-actions mt-2">
                                        <a href="{{ Storage::disk('public')->url($signature_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($signature_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="attachment-divider my-4">

        <!-- Document Row -->
        <div class="row g-3">
            <!-- OTR Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4 h-100">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">OTR</h6>

                            @if (empty($otr_photo))
                                <span class="badge bg-danger">Not Provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <div class="document-container">
                            @php
                                $otr_extension = pathinfo(Storage::disk('public')->url($otr_photo), PATHINFO_EXTENSION);
                                $is_otr_pdf = strtolower($otr_extension) === 'pdf';
                            @endphp

                            @if ($is_otr_pdf)
                                <div class="document-preview d-flex flex-column justify-content-center">
                                    <div class="pdf-icon mb-3">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="document-actions">
                                        <a href="{{ Storage::disk('public')->url($otr_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View PDF
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($otr_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="document-preview">
                                    <div class="image-container">
                                        <img src="{{ Storage::disk('public')->url($otr_photo) }}" alt="OTR"
                                            class="document-image">
                                    </div>
                                    <div class="document-actions mt-2">
                                        <a href="{{ Storage::disk('public')->url($otr_photo) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View
                                        </a>
                                        <a href="{{ Storage::disk('public')->url($otr_photo) }}" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diploma Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4 h-100">
                    <div class="attachment-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 attachment-title">Diploma</h6>
                            @if (empty($diploma_photo))
                                <span class="badge bg-danger">Not Provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <div class="document-container">
                            @if (!empty($diploma_photo))
                                @php
                                    $diploma_extension = pathinfo(asset($diploma_photo), PATHINFO_EXTENSION);
                                    $is_diploma_pdf = strtolower($diploma_extension) === 'pdf';
                                @endphp

                                @if ($is_diploma_pdf)
                                    <div class="document-preview d-flex flex-column justify-content-center">
                                        <div class="pdf-icon mb-3">
                                            <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <div class="document-actions">
                                            <a href="{{ asset($diploma_photo) }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i> View PDF
                                            </a>
                                            <a href="{{ asset($diploma_photo) }}" download
                                                class="btn btn-sm btn-outline-secondary ms-2">
                                                <i class="bi bi-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="document-preview">
                                        <div class="image-container">
                                            <img src="{{ asset($diploma_photo) }}" alt="Diploma" class="document-image">
                                        </div>
                                        <div class="document-actions mt-2">
                                            <a href="{{ asset($diploma_photo) }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i> View
                                            </a>
                                            <a href="{{ asset($diploma_photo) }}" download
                                                class="btn btn-sm btn-outline-secondary ms-2">
                                                <i class="bi bi-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="empty-document d-flex flex-column justify-content-center">
                                    <i class="bi bi-file-earmark-x text-muted mb-2" style="font-size: 2rem"></i>
                                    <p class="mb-0 text-muted">No diploma uploaded</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employment Certificate Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4 h-100">
                    <div class="attachment-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 attachment-title">Employment Certificate</h6>
                            @if (empty($employement_certificate))
                                <span class="badge bg-danger">Not Provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <div class="document-container">
                            @if (!empty($employement_certificate))
                                @php
                                    $cert_extension = pathinfo(asset($employement_certificate), PATHINFO_EXTENSION);
                                    $is_cert_pdf = strtolower($cert_extension) === 'pdf';
                                @endphp

                                @if ($is_cert_pdf)
                                    <div class="document-preview d-flex flex-column justify-content-center">
                                        <div class="pdf-icon mb-3">
                                            <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <div class="document-actions">
                                            <a href="{{ asset($employement_certificate) }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i> View PDF
                                            </a>
                                            <a href="{{ asset($employement_certificate) }}" download
                                                class="btn btn-sm btn-outline-secondary ms-2">
                                                <i class="bi bi-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="document-preview">
                                        <div class="image-container">
                                            <img src="{{ asset($employement_certificate) }}" alt="Employment Certificate"
                                                class="document-image">
                                        </div>
                                        <div class="document-actions mt-2">
                                            <a href="{{ asset($employement_certificate) }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i> View
                                            </a>
                                            <a href="{{ asset($employement_certificate) }}" download
                                                class="btn btn-sm btn-outline-secondary ms-2">
                                                <i class="bi bi-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="empty-document d-flex flex-column justify-content-center">
                                    <i class="bi bi-file-earmark-x text-muted mb-2" style="font-size: 2rem"></i>
                                    <p class="mb-0 text-muted">No employment certificate uploaded</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!in_array($entryStatus, ['approved', 'needs_revision']))
        <div class="comments-section mt-4">
            @livewire('admin.comments', [
                'submissionId' => $submissionId,
                'pdsSection' => 'attachments',
            ])
        </div>
    @endif

    <style>
        .attachments-container {
            font-size: 0.9rem;
        }

        .attachment-item {
            background-color: #fff;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .attachment-header {
            margin-bottom: 0.75rem;
        }

        .attachment-title {
            font-weight: 600;
            color: #212529;
            font-size: 1.05rem;
        }

        .attachment-details {
            padding-top: 0.5rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 0.5rem;
        }

        .info-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 500;
            color: #212529;
        }

        .document-container {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .document-preview {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
            height: 100%;
            min-height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .image-container {
            position: relative;
            height: 140px;
            overflow: hidden;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .document-image {
            max-height: 140px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
        }

        .attachment-divider {
            border-top: 1px solid #e9ecef;
            margin: 1.5rem 0;
        }

        .empty-document {
            background-color: #f8f9fa;
            border-radius: 0.25rem;
            min-height: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .pdf-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100px;
        }
    </style>
</x-review-card>