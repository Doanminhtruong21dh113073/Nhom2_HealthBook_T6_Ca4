<?php

use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->name('client.')->group(function () {
    Route::prefix('/')->controller(HomeController::class)->name('home.')->group(function () {
        Route::get('/home', 'index')->name('index');
        Route::post('store', 'store')->name('store');
    });
    Route::prefix('/booking')->controller(BookingController::class)->name('booking.')->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('getCategories', 'getCategories')->name('getCategories');
    });
});
