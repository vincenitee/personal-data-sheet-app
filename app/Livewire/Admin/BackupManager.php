<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class BackupManager extends Component
{
    public $backups = [];

    public function mount()
    {
        $this->loadBackups();
    }

    public function loadBackups()
    {
        $this->backups = collect(Storage::files('backups'))->map(function ($file) {
            return [
                'name' => basename($file),
                'path' => $file,
                'created_at' => Storage::lastModified($file),
            ];
        })->sortByDesc('created_at')->toArray();
    }

    public function createBackup()
    {
        $filename = 'backup_' . now()->format('Y-m-d_H-i-s') . '.sql';
        $backupPath = storage_path("app/private/backups/{$filename}");

        // Ensure the backup directory exists
        if (!file_exists(storage_path('app/private/backups'))) {
            mkdir(storage_path('app/private/backups'), 0755, true);
        }

        // Retrieve sanitized environment variables
        $dbUser = escapeshellarg(env('DB_USERNAME'));
        $dbPass = escapeshellarg(env('DB_PASSWORD'));
        $dbHost = escapeshellarg(env('DB_HOST'));
        $dbName = escapeshellarg(env('DB_DATABASE'));

        // Construct the MySQL dump command
        $command = "mysqldump --user={$dbUser} --password={$dbPass} --host={$dbHost} {$dbName} > {$backupPath} 2>&1";

        // Execute the command and capture errors
        $output = [];
        $returnVar = null;
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->addError('backup', 'Backup failed: ' . implode("\n", $output));
            return;
        }

        // Refresh list after successful backup
        $this->loadBackups();
    }


    public function downloadBackup($path)
    {
        // dd($path);
        return response()->download(storage_path("app/private/$path"));
    }

    public function deleteBackup($path)
    {
        Storage::delete($path);
        $this->loadBackups();
    }

    public function render()
    {
        return view('livewire.admin.backup-manager')
            ->extends('layouts.app')
            ->section('content')
            ->title('Manage Backup');
    }
}
