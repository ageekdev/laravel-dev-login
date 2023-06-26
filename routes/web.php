<?php

use AgeekDev\DevLogin\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('dev-guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('dev-login.login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('dev-login.login');
});

Route::middleware('auth:'.config('dev-login.auth.guard_name', 'developer'))->group(function () {
    Route::view(config('dev-login.home', 'dashboard'), 'dev-login::dashboard')->name('dev-login.dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('dev-login.logout');
});
