<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VerificationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('login', [AuthController::class, 'store']);
    });
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    });

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(OrderController::class)
            ->prefix('orders')
            ->name('orders.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);
                Route::post('{id}/restore', 'restore')->name('restore')->where(['id' => '[0-9]+']);
                Route::delete('{id}/force', 'forceDelete')->name('forceDelete')->where(['id' => '[0-9]+']);
            });

        Route::controller(ReviewController::class)
            ->prefix('reviews')
            ->name('reviews.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);
                Route::post('{id}/restore', 'restore')->name('restore')->where(['id' => '[0-9]+']);
                Route::delete('{id}/force', 'forceDelete')->name('forceDelete')->where(['id' => '[0-9]+']);
            });

        Route::controller(CustomerController::class)
            ->prefix('customers')
            ->name('customers.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
            });

        Route::controller(VerificationController::class)
            ->prefix('verifications')
            ->name('verifications.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });

        Route::controller(NotificationController::class)
            ->prefix('notifications')
            ->name('notifications.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });

        Route::controller(GiftController::class)
            ->prefix('gifts')
            ->name('gifts.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('', 'store')->name('store');
            });

        Route::controller(ProductController::class)
            ->prefix('products')
            ->name('products.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}', 'show')->name('show')->where(['id' => '[0-9]+']);
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where(['id' => '[0-9]+']);
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);
            });

        Route::controller(CategoryController::class)
            ->prefix('categories')
            ->name('categories.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });

        Route::controller(UserController::class)
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });
    });
