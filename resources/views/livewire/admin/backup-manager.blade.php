<div class="row">
    <div class="col-md-8">
        <div class="card card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="fw-bold">Database Backups</h5>
                    <p class="text-muted small">Recent database backups</p>
                </div>

                <i class="bi bi-database fs-3"></i>
            </div>

            <div class="d-flex">
                <button wire:click="createBackup()" class="btn btn-sm btn-outline-primary">
                    Backup now
                    <div wire:loading wire:target="createBackup()" class="spinner-border spinner-border-sm text-primary"
                        role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <i wire:loading.remove wire:target="createBackup" class="bi bi-floppy"></i>
                </button>
            </div>

            {{-- Table --}}
            <div class="table-responsive mt-3">
                <table class="table" style="font-size: 0.875rem;">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>Backed up since</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($backups as $backup)
                            <tr>
                                <td class="align-middle">
                                    <i class="bi bi-database me-2"></i>
                                    {{ $backup['name'] }}
                                </td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::createFromTimestamp($backup['created_at'])->diffForHumans() }}
                                </td>
                                <td class="text-end align-middle">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <button wire:click="downloadBackup('{{ $backup['path'] }}')"
                                            class="btn btn-sm btn-primary me-2">
                                            <div wire:loading wire:target="downloadBackup"
                                                class="spinner-border spinner-border-sm text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>

                                            <i class="bi bi-download"></i>
                                            <span class="d-none d-md-block">Download</span>
                                        </button>

                                        <button wire:click="deleteBackup('{{ $backup['path'] }}')"
                                            class="btn btn-sm btn-outline-danger">
                                            <div wire:loading wire:target="deleteBackup('{{ $backup['path'] }}')"
                                                class="spinner-border spinner-border-sm text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <i wire:loading.remove wire:target="deleteBackup" class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <i class="bi bi-info-circle me-2"></i>
                                    No backups were made
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
