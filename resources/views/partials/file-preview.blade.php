{{-- resources/views/partials/file-preview.blade.php --}}
@if (!empty($file))
    @php
        $filePath = is_string($file) ? Storage::url($file) : null;
        $fileExtension = is_string($file) ? pathinfo($filePath, PATHINFO_EXTENSION) : null;
        $isImage = $file && is_object($file) && $file->getMimeType() ? str_starts_with($file->getMimeType(), 'image') : in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
        $fileName = is_string($file) ? basename($file) : null;
    @endphp

    <div class="card shadow-sm mt-3">
        <div class="card-header bg-light">
            <h6 class="mb-0">
                <i class="bi bi-file-earmark me-2"></i>{{ $title ?? 'File Preview' }}
            </h6>
        </div>
        <div class="card-body">
            {{-- Loading Indicator --}}
            <div class="d-flex justify-content-center align-items-center">
                @include('partials.loading', [
                    'target' => $wireTarget,
                    'message' => 'Uploading document',
                ])
            </div>

            {{-- File Preview --}}
            <div wire:loading.remove wire:target="{{ $wireTarget }}">
                @if ($isImage)
                    <div class="text-center mb-3">
                        @if (is_object($file))
                            {{-- Show temporary URL if it's a Livewire file object --}}
                            <img src="{{ $file->temporaryUrl() }}" alt="{{ $title ?? 'File Preview' }}" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        @else
                            {{-- Show stored file from public disk --}}
                            <img src="{{ $filePath }}" alt="{{ $title ?? 'File Preview' }}" class="img-fluid rounded"
                                style="max-width: 300px; max-height: 300px; object-fit: contain;">
                        @endif
                    </div>
                @else
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-file-earmark-text fs-2 me-3 text-secondary"></i>
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

                    {{-- Download Button --}}
                    @if (is_string($file))
                        <a href="{{ $filePath }}" download="{{ $fileName }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download me-1"></i>Download
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
