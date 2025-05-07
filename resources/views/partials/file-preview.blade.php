@if (!empty($file))
    @php
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
            // dd($publicPath);
            $fileName = basename($file);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']);
            $filePath = $publicPath;
        }
    @endphp

    <div class="card shadow-sm mt-3">
        <div class="card-header bg-light">
            <h6 class="mb-0">
                <i class="bi bi-file-earmark me-2"></i>{{ $title ?? 'File Preview' }}
            </h6>
        </div>
        <div class="card-body">
            {{-- Loading Indicator --}}
            <div class="d-flex justify-content-center align-items-center" wire:loading wire:target="{{ $wireTarget }}">
                @include('partials.loading', [
                    'target' => $wireTarget,
                    'message' => 'Uploading document',
                ])
            </div>

            {{-- File Preview --}}
            <div wire:loading.remove wire:target="{{ $wireTarget }}">
                @if ($isImage)
                    <div class="text-center mb-3">
                        @if ($isUploadedFile)
                            {{-- Show temporary URL for Livewire upload --}}
                            <img src="{{ $file->temporaryUrl() }}" alt="{{ $fileName }}" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        @else
                            {{-- Show stored file from public storage --}}
                            <img src="{{ $filePath }}" alt="{{ $fileName }}" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        @endif
                    </div>
                @else
                    <div class="d-flex align-items-center mb-3">
                        {{-- File icon based on extension --}}
                        @php
                            $iconClass = match(strtolower($fileExtension)) {
                                'pdf' => 'bi-file-earmark-pdf',
                                'doc', 'docx' => 'bi-file-earmark-word',
                                'xls', 'xlsx' => 'bi-file-earmark-excel',
                                'ppt', 'pptx' => 'bi-file-earmark-ppt',
                                'zip', 'rar' => 'bi-file-earmark-zip',
                                'txt' => 'bi-file-earmark-text',
                                default => 'bi-file-earmark'
                            };
                        @endphp
                        <i class="{{ $iconClass }} fs-2 me-3 text-secondary"></i>
                        <div>
                            <h6 class="mb-1">{{ $fileName }}</h6>
                            <small class="text-muted text-uppercase">{{ strtoupper($fileExtension) }} File</small>
                        </div>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted small">
                        <i class="bi bi-paperclip me-1"></i>{{ $title ?? 'Uploaded File' }}
                    </span>

                    {{-- Download Button - only show for stored files --}}
                    @if (!$isUploadedFile && $filePath)
                        <a href="{{ $filePath }}" download="{{ $fileName }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i>Download
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif