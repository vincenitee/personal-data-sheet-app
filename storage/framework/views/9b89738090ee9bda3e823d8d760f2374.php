
<!--[if BLOCK]><![endif]--><?php if(!empty($file)): ?>
    <?php
        $filePath = is_string($file) ? Storage::url($file) : null;
        $fileExtension = is_string($file) ? pathinfo($filePath, PATHINFO_EXTENSION) : null;
        $isImage = $file && is_object($file) && $file->getMimeType() ? str_starts_with($file->getMimeType(), 'image') : in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
        $fileName = is_string($file) ? basename($file) : null;
    ?>

    <div class="card shadow-sm mt-3">
        <div class="card-header bg-light">
            <h6 class="mb-0">
                <i class="bi bi-file-earmark me-2"></i><?php echo e($title ?? 'File Preview'); ?>

            </h6>
        </div>
        <div class="card-body">
            
            <div class="d-flex justify-content-center align-items-center">
                <?php echo $__env->make('partials.loading', [
                    'target' => $wireTarget,
                    'message' => 'Uploading document',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <div wire:loading.remove wire:target="<?php echo e($wireTarget); ?>">
                <!--[if BLOCK]><![endif]--><?php if($isImage): ?>
                    <div class="text-center mb-3">
                        <!--[if BLOCK]><![endif]--><?php if(is_object($file)): ?>
                            
                            <img src="<?php echo e($file->temporaryUrl()); ?>" alt="<?php echo e($title ?? 'File Preview'); ?>" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        <?php else: ?>
                            
                            <img src="<?php echo e($filePath); ?>" alt="<?php echo e($title ?? 'File Preview'); ?>" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php else: ?>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-file-earmark-text fs-2 me-3 text-secondary"></i>
                        <div>
                            <h6 class="mb-1"><?php echo e($fileName); ?></h6>
                            <small class="text-muted text-uppercase"><?php echo e(strtoupper($fileExtension)); ?> File</small>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted small">
                        <i class="bi bi-paperclip me-1"></i><?php echo e($title ?? 'Uploaded File'); ?>

                    </span>

                    
                    <!--[if BLOCK]><![endif]--><?php if(is_string($file)): ?>
                        <a href="<?php echo e($filePath); ?>" download="<?php echo e($fileName); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i>Download
                        </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/file-preview.blade.php ENDPATH**/ ?>