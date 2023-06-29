<?php

use AgeekDev\DevLogin\Http\Controllers\DashboardController;
use AgeekDev\DevLogin\Http\Controllers\LoginController;
use AgeekDev\DevLogin\Http\Middleware\EnsurePhpInfoIsEnabled;
use Illuminate\Support\Facades\Route;

Route::middleware('dev-guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('dev-login.login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('dev-login.login');
});

Route::middleware('auth:'.config('dev-login.auth.guard_name', 'developer'))->group(function () {
    Route::get(config('dev-login.home', 'dashboard'), [DashboardController::class,'index'])->name('dev-login.dashboard');
    Route::view('info', 'dev-login::info')->name('dev-login.info')->middleware(EnsurePhpInfoIsEnabled::class);
    Route::post('logout', [LoginController::class, 'logout'])->name('dev-login.logout');
});
