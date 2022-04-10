<?php

use Illuminate\Support\Facades\Route;
use GenieFintech\DevLogin\Http\Controllers\LoginController;

Route::middleware('web')
    ->group(function () {
        Route::middleware('guest')->group(function() {
            Route::get('/login', [LoginController::class, 'showLoginForm']);
            Route::post('/login', [LoginController::class, 'login'])->name('login');
        });

        Route::middleware('auth:developer')->group(function() {
            Route::view('home', 'dev-login::dashboard');
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        });
    });
