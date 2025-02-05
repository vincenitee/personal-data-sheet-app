<?php

use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\ManageSignup;
use App\Livewire\Auth\LoginUser;
use App\Livewire\Auth\RegisterUser;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Employee\Dashboard as EmployeeDashboard;
use App\Livewire\Employee\Pds\Create;
use App\Livewire\Profile;
use App\Livewire\Employee\Notification;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

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
});

// Common Routes
Route::middleware(['auth', 'approved', 'can:edit own user profile'])->group(function (){
    Route::get('/profile', Profile::class)
        ->name('profile');
});

// Employee Routes
Route::middleware(['auth', 'approved', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', EmployeeDashboard::class)
        ->name('employee.dashboard');

    Route::get('/employee/notification', Notification::class)
        ->name('employee.notification');

    Route::get('/employee/pds/create', Create::class)
        ->name('employee.pds.create');
});

