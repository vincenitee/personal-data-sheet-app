<?php if (isset($component)) { $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.review-card','data' => ['title' => 'Attachments','icon' => 'bi-paperclip','openCard' => ''.e($openCard).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('review-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Attachments','icon' => 'bi-paperclip','openCard' => ''.e($openCard).'']); ?>
    <div class="attachments-container">
        <!-- Government ID Information Card -->
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="attachment-item mb-4">
                    <div class="attachment-header">
                        <h6 class="mb-0 attachment-title">Government Issued ID</h6>
                    </div>
                    <div class="attachment-details mt-3">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="info-item">
                                    <span class="info-label">Government ID Type</span>
                                    <span class="info-value">
                                        <!--[if BLOCK]><![endif]--><?php if(!empty($government_id_type)): ?>
                                            <?php echo e($government_id_type); ?>

                                        <?php else: ?>
                                            <span class="text-muted">Not specified</span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <span class="info-label">Date/Place of Issuance</span>
                                    <span class="info-value">
                                        <!--[if BLOCK]><![endif]--><?php if(!empty($date_of_issuance)): ?>
                                            <?php echo e(\Carbon\Carbon::parse($date_of_issuance)->format('m/d/Y')); ?>

                                        <?php else: ?>
                                            <span class="text-muted">Not specified</span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <span class="info-label">ID/License/Passport Number</span>
                                    <span class="info-value">
                                        <!--[if BLOCK]><![endif]--><?php if(!empty($government_id_no)): ?>
                                            <?php echo e($government_id_no); ?>

                                        <?php else: ?>
                                            <span class="text-muted">Not specified</span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Government ID Photo Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">Government ID Photo</h6>

                            <!--[if BLOCK]><![endif]--><?php if(empty($government_id_photo)): ?>
                                <span class="badge bg-danger">Not Provided</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <?php
                            $govt_id_extension = pathinfo(asset($government_id_photo), PATHINFO_EXTENSION);
                            $is_govt_id_pdf = strtolower($govt_id_extension) === 'pdf';
                        ?>

                        <!--[if BLOCK]><![endif]--><?php if($is_govt_id_pdf): ?>
                            <div class="document-preview">
                                <div class="pdf-icon mb-3">
                                    <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="document-actions">
                                    <a href="<?php echo e(asset($government_id_photo)); ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i> View PDF
                                    </a>
                                    <a href="<?php echo e(asset($government_id_photo)); ?>"
                                        class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="document-preview">
                                <img src="<?php echo e(asset($government_id_photo)); ?>" alt="Government ID Photo"
                                    class="img-fluid border rounded">
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </div>

        <hr class="attachment-divider my-4">

        <!-- ID Photos Row -->
        <div class="row g-3">
            <!-- Passport Photo Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="mb-0 attachment-title">Passport Photo</h6>

                        <!--[if BLOCK]><![endif]--><?php if(empty($passport_photo)): ?>
                            <span class="badge bg-danger">Not Provided</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <?php
                            $passport_extension = pathinfo(asset($passport_photo), PATHINFO_EXTENSION);
                            $is_passport_pdf = strtolower($passport_extension) === 'pdf';
                        ?>

                        <!--[if BLOCK]><![endif]--><?php if($is_passport_pdf): ?>
                            <div class="document-preview">
                                <div class="pdf-icon mb-3">
                                    <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="document-actions">
                                    <a href="<?php echo e(asset($passport_photo)); ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i> View PDF
                                    </a>
                                    <a href="<?php echo e(asset($passport_photo)); ?>" download
                                        class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="document-preview">
                                <img src="<?php echo e(asset($passport_photo)); ?>" alt="Passport Photo"
                                    class="img-fluid border rounded">
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <!-- Right Thumbmark Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">Right Thumbmark</h6>

                            <!--[if BLOCK]><![endif]--><?php if(empty($right_thumbmark_photo)): ?>
                                <span class="badge bg-danger">Not Provided</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <?php
                            $thumbmark_extension = pathinfo(asset($right_thumbmark_photo), PATHINFO_EXTENSION);
                            $is_thumbmark_pdf = strtolower($thumbmark_extension) === 'pdf';
                        ?>

                        <!--[if BLOCK]><![endif]--><?php if($is_thumbmark_pdf): ?>
                            <div class="document-preview">
                                <div class="pdf-icon mb-3">
                                    <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="document-actions">
                                    <a href="<?php echo e(asset($right_thumbmark_photo)); ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i> View PDF
                                    </a>
                                    <a href="<?php echo e(asset($right_thumbmark_photo)); ?>" download
                                        class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="document-preview">
                                <img src="<?php echo e(asset($right_thumbmark_photo)); ?>" alt="Right Thumbmark"
                                    class="img-fluid border rounded">
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <!-- Signature Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">Signature</h6>

                            <!--[if BLOCK]><![endif]--><?php if(empty($signature_photo)): ?>
                                <span class="badge bg-danger">Not Provided</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <?php
                            $signature_extension = pathinfo(asset($signature_photo), PATHINFO_EXTENSION);
                            $is_signature_pdf = strtolower($signature_extension) === 'pdf';
                        ?>

                        <!--[if BLOCK]><![endif]--><?php if($is_signature_pdf): ?>
                            <div class="document-preview">
                                <div class="pdf-icon mb-3">
                                    <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="document-actions">
                                    <a href="<?php echo e(asset($signature_photo)); ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i> View PDF
                                    </a>
                                    <a href="<?php echo e(asset($signature_photo)); ?>" download
                                        class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="document-preview">
                                <img src="<?php echo e(asset($signature_photo)); ?>" alt="Signature"
                                    class="img-fluid border rounded">
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </div>

        <hr class="attachment-divider my-4">

        <!-- Document Row -->
        <div class="row g-3">
            <!-- OTR Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4">
                    <div class="attachment-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 attachment-title">OTR</h6>

                            <!--[if BLOCK]><![endif]--><?php if(empty($otr_photo)): ?>
                                <span class="badge bg-danger">Not Provided</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <?php
                            $otr_extension = pathinfo(asset($otr_photo), PATHINFO_EXTENSION);
                            $is_otr_pdf = strtolower($otr_extension) === 'pdf';
                        ?>

                        <!--[if BLOCK]><![endif]--><?php if($is_otr_pdf): ?>
                            <div class="document-preview">
                                <div class="pdf-icon mb-3">
                                    <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                </div>
                                <div class="document-actions">
                                    <a href="<?php echo e(asset($otr_photo)); ?>" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i> View PDF
                                    </a>
                                    <a href="<?php echo e(asset($otr_photo)); ?>" download
                                        class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="bi bi-download me-1"></i> Download
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="document-preview">
                                <img src="<?php echo e(asset($otr_photo)); ?>" alt="OTR"
                                    class="img-fluid border rounded">
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <!-- Diploma Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4">
                    <div class="attachment-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 attachment-title">Diploma</h6>
                            <!--[if BLOCK]><![endif]--><?php if(empty($diploma_photo)): ?>
                                <span class="badge bg-danger">Not Provided</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($diploma_photo)): ?>
                            <?php
                                $diploma_extension = pathinfo(asset($diploma_photo), PATHINFO_EXTENSION);
                                $is_diploma_pdf = strtolower($diploma_extension) === 'pdf';
                            ?>

                            <!--[if BLOCK]><![endif]--><?php if($is_diploma_pdf): ?>
                                <div class="document-preview">
                                    <div class="pdf-icon mb-3">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="document-actions">
                                        <a href="<?php echo e(asset($diploma_photo)); ?>" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View PDF
                                        </a>
                                        <a href="<?php echo e(asset($diploma_photo)); ?>" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="document-preview">
                                    <img src="<?php echo e(asset($diploma_photo)); ?>" alt="Diploma"
                                        class="img-fluid border rounded">
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <div class="empty-document text-center py-3">
                                <i class="bi bi-file-earmark-x text-muted mb-2" style="font-size: 2rem"></i>
                                <p class="mb-0 text-muted">No diploma uploaded</p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

            <!-- Employment Certificate Card -->
            <div class="col-lg-4">
                <div class="attachment-item mb-4">
                    <div class="attachment-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 attachment-title">Employment Certificate</h6>
                            <!--[if BLOCK]><![endif]--><?php if(empty($employement_certificate)): ?>
                                <span class="badge bg-danger">Not Provided</span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <div class="attachment-details mt-3 text-center">
                        <!--[if BLOCK]><![endif]--><?php if(!empty($employement_certificate)): ?>
                            <?php
                                $cert_extension = pathinfo(asset($employement_certificate), PATHINFO_EXTENSION);
                                $is_cert_pdf = strtolower($cert_extension) === 'pdf';
                            ?>

                            <!--[if BLOCK]><![endif]--><?php if($is_cert_pdf): ?>
                                <div class="document-preview">
                                    <div class="pdf-icon mb-3">
                                        <i class="bi bi-file-earmark-pdf text-danger" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="document-actions">
                                        <a href="<?php echo e(asset($employement_certificate)); ?>" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye me-1"></i> View PDF
                                        </a>
                                        <a href="<?php echo e(asset($diploma_photo)); ?>" download
                                            class="btn btn-sm btn-outline-secondary ms-2">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="document-preview">
                                    <img src="<?php echo e(asset($diploma_photo)); ?>" alt="Diploma"
                                        class="img-fluid border rounded">
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php else: ?>
                            <div class="empty-document text-center py-3">
                                <i class="bi bi-file-earmark-x text-muted mb-2" style="font-size: 2rem"></i>
                                <p class="mb-0 text-muted">No diploma uploaded</p>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                </div>
            </div>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(!in_array($entryStatus, ['approved', 'needs_revision'])): ?>
        <div class="comments-section mt-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.comments', [
                'submissionId' => $submissionId,
                'pdsSection' => 'attachments',
            ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1709984910-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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

        .document-preview {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
        }

        .attachment-divider {
            border-top: 1px solid #e9ecef;
            margin: 1.5rem 0;
        }

        .empty-document {
            background-color: #e9ecef;
            border-radius: 0.25rem;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319)): ?>
<?php $attributes = $__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319; ?>
<?php unset($__attributesOriginal9c755b64b7bb8b6a080bedeeb703c319); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c755b64b7bb8b6a080bedeeb703c319)): ?>
<?php $component = $__componentOriginal9c755b64b7bb8b6a080bedeeb703c319; ?>
<?php unset($__componentOriginal9c755b64b7bb8b6a080bedeeb703c319); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/steps/attachments.blade.php ENDPATH**/ ?>