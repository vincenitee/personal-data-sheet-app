<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white p-4 border-0">
                    <h5 class="mb-0 d-flex align-items-center justify-content-between">
                        System Appearance
                        <i class="bi bi-palette-fill me-2"></i>
                    </h5>
                </div>
                <div class="card-body p-4">
                    <!-- Logo Upload Section -->
                    <!-- Logo Upload Section -->
                    <div class="row mb-5">
                        <div class="col-lg-4">
                            <h6 class="fw-bold mb-3">System Logo</h6>
                            <p class="text-secondary mb-0">Upload your organization logo for the application header and
                                login page.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <!-- Current Logo Preview -->
                                        <div
                                            class="col-md-4 d-flex flex-column align-items-center justify-content-center border-end">
                                            <div
                                                class="logo-preview-container mb-2 d-flex align-items-center justify-content-center">
                                                <!--[if BLOCK]><![endif]--><?php if($temporaryLogo): ?>
                                                    <img src="<?php echo e($temporaryLogo); ?>" alt="New Logo"
                                                        class="img-fluid shadow-sm rounded-circle border"
                                                        style="height: 100px; width: 100px; object-fit: cover;">
                                                <?php elseif($logo): ?>
                                                    <img src="<?php echo e(Storage::url($logo)); ?>" alt="Current Logo"
                                                        class="img-fluid shadow-sm rounded-circle border"
                                                        style="height: 100px; width: 100px; object-fit: cover;">
                                                <?php else: ?>
                                                    <img src="<?php echo e(Vite::asset('resources/images/hris-logo-white.png')); ?>"
                                                        alt="Default Logo"
                                                        class="img-fluid shadow-sm rounded-circle border"
                                                        style="height: 100px; width: 100px; object-fit: cover;">
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                            <div class="badge bg-light text-dark">
                                                <!--[if BLOCK]><![endif]--><?php if($temporaryLogo): ?>
                                                    New Logo
                                                <?php elseif($logo): ?>
                                                    Current Logo
                                                <?php else: ?>
                                                    Default Logo
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </div>
                                        </div>

                                        <!-- Upload Area -->
                                        <div class="col-md-8">
                                            <div class="dropzone-container" id="logoDropzone" x-data="{ isHovering: false }"
                                                x-on:dragover.prevent="isHovering = true"
                                                x-on:dragleave.prevent="isHovering = false"
                                                x-on:drop.prevent="isHovering = false"
                                                x-bind:class="{ 'dropzone-active': isHovering }">

                                                <div class="dropzone-content text-center p-4">
                                                    <i class="bi bi-cloud-arrow-up text-primary fs-1 mb-3"></i>

                                                    <h5 class="mb-3">Upload your logo</h5>
                                                    <p class="text-secondary mb-3">Drag and drop your file here or</p>

                                                    <div class="mb-3">
                                                        <label for="logoUpload" class="btn btn-primary text-white px-4">
                                                            <i class="bi bi-folder me-2"></i> Browse Files
                                                        </label>
                                                        <input type="file" wire:model="newLogo" id="logoUpload"
                                                            class="d-none"
                                                            accept="image/png, image/jpeg, image/svg+xml">
                                                    </div>

                                                    <div class="upload-info mt-3">
                                                        <div
                                                            class="d-flex align-items-center justify-content-center text-secondary">
                                                            <i class="bi bi-info-circle me-2"></i>
                                                            <small>Recommended size: 200×200px. Max: 2MB</small>
                                                        </div>
                                                        <small class="d-block text-secondary">Formats: PNG, JPG,
                                                            SVG</small>
                                                    </div>

                                                    <!--[if BLOCK]><![endif]--><?php if($newLogo): ?>
                                                        <div class="mt-3 alert alert-success py-2">
                                                            <i class="bi bi-check-circle me-2"></i>
                                                            File selected: <?php echo e($newLogo->getClientOriginalName()); ?>

                                                        </div>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </div>
                                            </div>

                                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newLogo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger mt-3 py-2">
                                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                                    <?php echo e($message); ?>

                                                </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Color Palette Section -->
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="fw-bold mb-3">Sidebar Theme</h6>
                            <p class="text-secondary mb-0">Choose a color scheme for the application sidebar.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="card border p-4">
                                <!-- Color Palette Options -->
                                <div class="d-flex flex-wrap gap-3">
                                    <!-- Dark -->
                                    <div class="color-option">
                                        <input type="radio" name="sidebarColor" id="colorDark" value="dark"
                                            class="btn-check" wire:model.live="sidebarColor">
                                        <label for="colorDark" class="color-option-label mb-2">
                                            <div class="sidebar-preview border-dark"
                                                style="background: linear-gradient(135deg, #343a40, #212529);"></div>
                                            <span class="d-block text-center mt-1 small">Default</span>
                                        </label>
                                    </div>

                                    <!-- Primary -->
                                    <div class="color-option">
                                        <input type="radio" name="sidebarColor" id="colorPrimary" value="primary"
                                            class="btn-check" wire:model.live="sidebarColor">
                                        <label for="colorPrimary" class="color-option-label mb-2">
                                            <div class="sidebar-preview border-primary bg-opacity-75"
                                                style="background: linear-gradient(135deg, #007bff, #0056b3);"></div>
                                            <span class="d-block text-center mt-1 small">Primary</span>
                                        </label>
                                    </div>

                                    <!-- Secondary -->
                                    <div class="color-option">
                                        <input type="radio" name="sidebarColor" id="colorSecondary" value="secondary"
                                            class="btn-check" wire:model.live="sidebarColor">
                                        <label for="colorSecondary" class="color-option-label mb-2">
                                            <div class="sidebar-preview border-secondary"
                                                style="background: linear-gradient(135deg, #6c757d, #495057);"></div>
                                            <span class="d-block text-center mt-1 small">Gray</span>
                                        </label>
                                    </div>

                                    <!-- Success -->
                                    <div class="color-option">
                                        <input type="radio" name="sidebarColor" id="colorSuccess" value="success"
                                            class="btn-check" wire:model.live="sidebarColor">
                                        <label for="colorSuccess" class="color-option-label mb-2">
                                            <div class="sidebar-preview border-success"
                                                style="background: linear-gradient(135deg, #28a745, #1e7e34);"></div>
                                            <span class="d-block text-center mt-1 small">Green</span>
                                        </label>
                                    </div>

                                    <!-- Danger -->
                                    <div class="color-option">
                                        <input type="radio" name="sidebarColor" id="colorDanger" value="danger"
                                            class="btn-check" wire:model.live="sidebarColor">
                                        <label for="colorDanger" class="color-option-label mb-2">
                                            <div class="sidebar-preview border-danger"
                                                style="background: linear-gradient(135deg, #dc3545, #a71d2a);"></div>
                                            <span class="d-block text-center mt-1 small">Red</span>
                                        </label>
                                    </div>

                                    <!-- Info -->
                                    <div class="color-option">
                                        <input type="radio" name="sidebarColor" id="colorInfo" value="info"
                                            class="btn-check" wire:model.live="sidebarColor">
                                        <label for="colorInfo" class="color-option-label mb-2">
                                            <div class="sidebar-preview border-info"
                                                style="background: linear-gradient(135deg, #17a2b8, #117a8b);"></div>
                                            <span class="d-block text-center mt-1 small">Blue</span>
                                        </label>
                                    </div>

                                    <!-- Warning -->
                                    <div class="color-option">
                                        <input type="radio" name="sidebarColor" id="colorWarning" value="warning"
                                            class="btn-check" wire:model.live="sidebarColor">
                                        <label for="colorWarning" class="color-option-label mb-2">
                                            <div class="sidebar-preview border-warning"
                                                style="background: linear-gradient(135deg, #ffc107, #d39e00);"></div>
                                            <span class="d-block text-center mt-1 small">Amber</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Preview Section -->
                                <div class="mt-4 pt-3 border-top">
                                    <h6 class="fw-bold mb-3">Preview</h6>
                                    <div class="d-flex border rounded overflow-hidden" style="height: 200px;">
                                        <!-- Sidebar Preview -->
                                        <div class="sidebar-preview-large text-white p-3 bg-<?php echo e($sidebarColor); ?> bg-gradient"
                                            wire:model.live="sidebarColor" style="width: 220px;" id="sidebarPreview">
                                            <div
                                                class="d-flex align-items-center mb-4 pb-2 border-bottom border-white border-opacity-25">
                                                <div class="bg-<?php echo e($sidebarColor); ?> bg-opacity-25 rounded p-2">
                                                    <i class="bi bi-grid-fill"></i>
                                                </div>
                                                <span class="ms-2 fw-semibold">Admin Panel</span>
                                            </div>
                                            <div class="nav flex-column">
                                                <div class="nav-item mb-2 px-3 py-2 rounded bg-white bg-opacity-10">
                                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                                </div>
                                                <div class="nav-item mb-2 px-3 py-2">
                                                    <i class="bi bi-people me-2"></i> Users
                                                </div>
                                                <div class="nav-item px-3 py-2">
                                                    <i class="bi bi-gear me-2"></i> Settings
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Content Area Preview -->
                                        <div class="flex-grow-1 p-3 bg-light">
                                            <div class="bg-white border rounded p-3 mb-3" style="height: 30px;"></div>
                                            <div class="bg-white border rounded p-3" style="height: 110px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white py-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2" wire:click="resetToDefaults">Reset to
                        Default</button>
                    <button type="button" class="btn btn-primary" wire:click="saveSettings"
                        wire:loading.attr="disabled">
                        <span wire:loading wire:target="saveSettings" class="spinner-border spinner-border-sm me-2"
                            role="status"></span>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
    <style>
        /* Color option styling */
        .color-option-label {
            cursor: pointer;
        }

        .sidebar-preview {
            width: 48px;
            height: 48px;
            border-radius: 6px;
            border: 2px solid transparent;
            transition: all 0.2s;
        }

        .btn-check:checked+.color-option-label .sidebar-preview {
            transform: scale(1.1);
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px var(--bs-primary);
        }

        .sidebar-preview-large {
            transition: background-color 0.3s ease;
        }

        /* Logo section styling */
        .logo-preview-container {
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f8f9fa;
            padding: 5px;
        }

        .dropzone-container {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dropzone-active {
            border-color: var(--bs-primary);
            background-color: rgba(var(--bs-primary-rgb), 0.05);
            transform: scale(1.01);
        }

        .dropzone-content {
            width: 100%;
        }

        .upload-info {
            padding: 10px;
            border-radius: 6px;
            background-color: rgba(0, 0, 0, 0.03);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('livewire:initialized', () => {
            const logoDropzone = document.getElementById('logoDropzone');
            const logoUpload = document.getElementById('logoUpload');
            const sidebarPreview = document.getElementById('sidebarPreview');

            // Initialize sidebar preview
            updateSidebarPreview('window.Livewire.find('<?php echo e($_instance->getId()); ?>').sidebarColor');

            // Listen for changes in the sidebarColor
            window.Livewire.find('<?php echo e($_instance->getId()); ?>').on('updated', (event) => {
                if (event.name === 'sidebarColor') {
                    updateSidebarPreview(event.value);
                }
            });

            // Function to update sidebar preview
            function updateSidebarPreview(color) {
                // Remove all classes starting with bg-
                sidebarPreview.className = sidebarPreview.className
                    .split(' ')
                    .filter(c => !c.startsWith('bg-'))
                    .join(' ');

                // Add the new background class
                if (color === 'indigo') {
                    sidebarPreview.classList.add('sidebar-preview-large', 'text-white', 'p-3');
                    sidebarPreview.style.backgroundColor = '#6610f2';
                } else {
                    sidebarPreview.classList.add('sidebar-preview-large', 'text-white', 'p-3', `bg-${color}`);
                    sidebarPreview.style.backgroundColor = '';
                }
            }

            // Drag and drop functionality for logo
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                logoDropzone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                logoDropzone.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                logoDropzone.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                logoDropzone.classList.add('bg-light-hover');
            }

            function unhighlight() {
                logoDropzone.classList.remove('bg-light-hover');
            }

            logoDropzone.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;

                if (files.length) {
                    logoUpload.files = files;
                    const event = new Event('change', {
                        bubbles: true
                    });
                    logoUpload.dispatchEvent(event);
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\personal-data-sheet-app\resources\views/livewire/admin/settings.blade.php ENDPATH**/ ?>