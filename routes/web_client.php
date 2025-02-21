<?php

use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\FavoriteController;
use App\Http\Controllers\Client\GiftController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\NotificationController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ReviewController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:customer_web')
    ->group(function () {
        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('verify', [AuthController::class, 'verify'])->name('verify');
        Route::post('confirm', [AuthController::class, 'confirm'])->name('confirm');
        Route::post('login', [AuthController::class, 'store']);
    });
Route::middleware('auth:customer_web')
    ->group(function () {
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    });

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('locale/{locale}', 'locale')->name('locale')->where(['locale', '[a-z]+']);
    });

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{slug}', 'show')->name('show')->where(['slug' => '[a-z0-9-]+']);
    });

Route::middleware('auth:customer_web')
    ->group(function () {
        Route::controller(OrderController::class)
            ->prefix('orders')
            ->name('orders.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);
            });

        Route::controller(ReviewController::class)
            ->prefix('reviews')
            ->name('reviews.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('', 'store')->name('store');
                Route::delete('{id}', 'destroy')->name('destroy')->where(['id' => '[0-9]+']);
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
            });

        Route::controller(FavoriteController::class)
            ->prefix('favorites')
            ->name('favorites.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('', 'store')->name('store');
            });
    });
