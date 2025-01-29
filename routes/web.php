<?php

use App\Livewire\Auth\LoginUser;
use App\Livewire\Auth\RegisterUser;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Employee\Dashboard;
use App\Livewire\Employee\Pds\Create;
use App\Livewire\Employee\Profile;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/employee/dashboard', Dashboard::class)
    ->name('employee.dashboard');

Route::get('/employee/profile', Profile::class)
    ->name('employee.profile');

Route::get('/employee/pds/create', Create::class)
    ->name('employee.pds.create');

Route::middleware('guest')->group(function () {
    Route::get('/login', LoginUser::class)->name('login');
    Route::get('/register', RegisterUser::class)->name('register');

    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});
