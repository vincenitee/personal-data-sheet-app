
<!--[if BLOCK]><![endif]--><?php if(!empty($file)): ?>
    <?php
        // Check if file is a string (path) or an uploaded file object
        $isUploadedFile = is_object($file) && method_exists($file, 'getClientOriginalName');

        // Get file details based on type
        if ($isUploadedFile) {
            // For temporary uploads
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $isImage = str_starts_with($file->getMimeType(), 'image');
            $filePath = null;
        } else {
            // For stored files
            // Handle both full paths and relative paths correctly
            $storagePrefix = 'public/';
            $storagePath = str_starts_with($file, $storagePrefix) ? $file : $storagePrefix . $file;
            $publicPath = Storage::url(str_replace($storagePrefix, '', $file));

            $fileName = basename($file);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
            $filePath = $publicPath;
        }
    ?>

    <div class="card shadow-sm mt-3">
        <div class="card-header bg-light">
            <h6 class="mb-0">
                <i class="bi bi-file-earmark me-2"></i><?php echo e($title ?? 'File Preview'); ?>

            </h6>
        </div>
        <div class="card-body">
            
            <div class="d-flex justify-content-center align-items-center" wire:loading wire:target="<?php echo e($wireTarget); ?>">
                <?php echo $__env->make('partials.loading', [
                    'target' => $wireTarget,
                    'message' => 'Uploading document',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            
            <div wire:loading.remove wire:target="<?php echo e($wireTarget); ?>">
                <!--[if BLOCK]><![endif]--><?php if($isImage): ?>
                    <div class="text-center mb-3">
                        <!--[if BLOCK]><![endif]--><?php if($isUploadedFile): ?>
                            
                            <img src="<?php echo e($file->temporaryUrl()); ?>" alt="<?php echo e($fileName); ?>" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        <?php else: ?>
                            
                            <img src="<?php echo e($filePath); ?>" alt="<?php echo e($fileName); ?>" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                <?php else: ?>
                    <div class="d-flex align-items-center mb-3">
                        
                        <?php
                            $iconClass = match(strtolower($fileExtension)) {
                                'pdf' => 'bi-file-earmark-pdf',
                                'doc', 'docx' => 'bi-file-earmark-word',
                                'xls', 'xlsx' => 'bi-file-earmark-excel',
                                'ppt', 'pptx' => 'bi-file-earmark-ppt',
                                'zip', 'rar' => 'bi-file-earmark-zip',
                                'txt' => 'bi-file-earmark-text',
                                default => 'bi-file-earmark'
                            };
                        ?>
                        <i class="<?php echo e($iconClass); ?> fs-2 me-3 text-secondary"></i>
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

                    
                    <!--[if BLOCK]><![endif]--><?php if(!$isUploadedFile && $filePath): ?>
                        <a href="<?php echo e($filePath); ?>" download="<?php echo e($fileName); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i>Download
                        </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/partials/file-preview.blade.php ENDPATH**/ ?>