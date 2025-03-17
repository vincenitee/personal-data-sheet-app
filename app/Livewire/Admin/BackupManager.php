<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
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
        $backupDir = 'private/backups';

        // Check if directory exists
        if (!Storage::exists($backupDir)) {
            $this->backups = [];
            return;
        }

        $this->backups = collect(Storage::files($backupDir))->map(function ($file) {
            return [
                'name' => basename($file),
                'path' => $file,
                'created_at' => Storage::lastModified($file),
                'size' => $this->formatSize(Storage::size($file))
            ];
        })->sortByDesc('created_at')->values()->toArray();
    }

    // Helper function to format file size
    private function formatSize($size)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2) . ' ' . $units[$power];
    }

    public function createBackup()
    {
        $filename = 'backup_' . now()->format('Y-m-d_H-i-s') . '.sql';
        $backupPath = "private/backups/{$filename}";

        // Ensure the backup directory exists
        if (!Storage::exists('private/backups')) {
            Storage::makeDirectory('private/backups', 0755, true);
        }

        // Retrieve database credentials
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');
        $dbHost = env('DB_HOST');
        $dbName = env('DB_DATABASE');

        if (!$dbUser || !$dbHost || !$dbName) {
            $this->addError('backup', 'Database configuration is missing.');
            return;
        }

        // Generate backup SQL using Laravel's DB connection
        try {
            $backupSql = "";
            $tables = DB::select("SHOW TABLES");

            foreach ($tables as $table) {
                $tableName = array_values((array)$table)[0];
                $createTable = DB::select("SHOW CREATE TABLE `$tableName`")[0]->{'Create Table'};
                $backupSql .= "\n\n$createTable;\n\n";

                $rows = DB::select("SELECT * FROM `$tableName`");

                foreach ($rows as $row) {
                    $values = array_map(fn($value) => DB::getPdo()->quote($value), (array)$row);
                    $backupSql .= "INSERT INTO `$tableName` VALUES (" . implode(',', $values) . ");\n";
                }
            }

            // Save the backup file
            Storage::put($backupPath, $backupSql);

            // Success message
            session()->flash('success', 'Backup created successfully.');

            // Refresh backup list
            $this->loadBackups();
        } catch (\Exception $e) {
            $this->addError('backup', 'Backup failed: ' . $e->getMessage());
        }
    }

    public function downloadBackup($path)
    {
        dd(storage_path("app/$path"));
        return response()->download(storage_path("app/$path"));
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
