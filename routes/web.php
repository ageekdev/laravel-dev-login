<?php

use Illuminate\Support\Facades\Route;
use GenieFintech\DevLogin\Http\Controllers\LoginController;

Route::middleware('web')
    ->group(function () {
        Route::middleware('guest')->group(function() {
            Route::get('/login', [LoginController::class, 'showLoginForm'])->name('dev-login.login.show');
            Route::post('/login', [LoginController::class, 'login'])->name('dev-login.login');
        });

        Route::middleware('auth:developer')->group(function() {
            Route::view('home', 'dev-login::dashboard')->name('dev-login.dashboard');
            Route::post('logout', [LoginController::class, 'logout'])->name('dev-login.logout');
        });
    });
