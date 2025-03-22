<?php

use App\Http\Controllers\DownloadBackupController;
use App\Models\User;
use App\Livewire\Profile;
use App\Livewire\Welcome;
use App\Livewire\Admin\AddUser;
use App\Livewire\PrintPdsEntry;
use App\Livewire\Admin\Settings;
use App\Livewire\Auth\LoginUser;
use App\Mail\PdsEntryStatusMail;
use App\Livewire\Admin\ManageUsers;
use App\Livewire\Auth\RegisterUser;
use App\Livewire\Admin\EditUserPage;
use App\Livewire\Admin\ManageSignup;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Admin\BackupManager;
use App\Livewire\Admin\PdsReviewForm;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Employee\Pds\Create;
use Illuminate\Support\Facades\Route;
use App\Livewire\Employee\Notification;
use App\Livewire\Employee\PreviewEntry;
use Illuminate\Support\Facades\Artisan;
use App\Livewire\Admin\SubmissionEntries;
use App\Livewire\Employee\SubmissionLogs;
use App\Livewire\Admin\Profile as AdminProfile;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\GenerateReport;
use App\Livewire\Employee\Dashboard as EmployeeDashboard;

Route::get('/', Welcome::class);

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginUser::class)->name('login');
    Route::get('/register', RegisterUser::class)->name('register');

    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)
        ->name('admin.dashboard');

    Route::get('/admin/manage-signups', ManageSignup::class)
        ->name('admin.manage-signup');

    Route::get('/admin/users', ManageUsers::class)
        ->name('admin.users');

    Route::get('/admin/users/{user}/edit', EditUserPage::class)
        ->name('users.edit');

    Route::get('/admin/add-user', AddUser::class)
        ->name('admin.add-user');

    Route::get('/admin/submissions', SubmissionEntries::class)
        ->name('admin.submissions');

    Route::get('/admin/submissions/{pdsEntry}/review', PdsReviewForm::class)
        ->name('submissions.review');

    Route::get('/admin/backup', BackupManager::class)
        ->name('admin.backup');

    Route::get('/admin/profile', AdminProfile::class)
        ->name('admin.profile');

    Route::get('/admin/settings', Settings::class)
        ->name('admin.settings');

    Route::get('backup/download/{path}', DownloadBackupController::class)
        ->name('backup.download');

    Route::get('/admin/reports', GenerateReport::class)
        ->name('admin.generate-report');
});

// Common Routes
Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('/profile', Profile::class)
        ->name('profile');

    Route::get('/print/{pdsEntry}', PrintPdsEntry::class)
        ->name('pds.print');
});

// Employee Routes
Route::middleware(['auth', 'approved', 'role:employee', 'active'])->group(function () {
    Route::get('/employee/dashboard', EmployeeDashboard::class)
        ->name('employee.dashboard');

    Route::get('/employee/notification', Notification::class)
        ->name('employee.notification');

    Route::get('/employee/pds/create', Create::class)
        ->name('employee.pds.create');

    Route::get('/employee/submission-logs', SubmissionLogs::class)
        ->name('employee.submission.logs');

    Route::get('/employee/{pdsEntry}/preview-entry', PreviewEntry::class)
        ->name('employee.preview.entry');

    // Route::get('/employee/profile', Profile::class)
    //     ->name('employee.profile');
});
