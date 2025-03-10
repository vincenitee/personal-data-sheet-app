<?php

use App\Models\User;
use App\Livewire\Profile;
use App\Livewire\Welcome;
use App\Mail\SignupStatus;
use App\Livewire\PrintEntry;
use App\Livewire\Admin\AddUser;
use App\Livewire\Auth\LoginUser;
use App\Mail\PdsEntryStatusMail;
use App\Livewire\Admin\ManageUsers;
use App\Livewire\Auth\RegisterUser;
use App\Livewire\Admin\EditUserPage;
use App\Livewire\Admin\ManageSignup;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Admin\PdsReviewForm;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Employee\Pds\Create;
use Illuminate\Support\Facades\Route;
use App\Livewire\Employee\Notification;
use App\Livewire\Admin\SubmissionEntries;
use App\Livewire\Employee\SubmissionLogs;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Employee\Dashboard as EmployeeDashboard;

Route::get('test', function (){
    $user = User::find(8);
    return new PdsEntryStatusMail($user, 'rejected', '', $user->entries()->first());
});


Route::get('/', Welcome::class);

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginUser::class)->name('login');
    Route::get('/register', RegisterUser::class)->name('register');

    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function (){
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

    Route::get('/admin/submissions/{entry}/review', PdsReviewForm::class)
        ->name('submissions.review');
});

// Common Routes
Route::middleware(['auth', 'approved'])->group(function (){
    Route::get('/profile', Profile::class)
        ->name('profile');

    Route::get('/print', PrintEntry::class)
        ->name('print');
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

});

