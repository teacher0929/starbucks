<?php

use App\Http\Controllers\Client\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:customer_web')
    ->group(function () {
        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('login', [AuthController::class, 'store']);
    });

Route::middleware('auth:customer_web')
    ->group(function () {
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    });
