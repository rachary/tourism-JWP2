<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DestinationImageController;
use App\Http\Controllers\DestinationRegionController;
use App\Http\Controllers\DestinationTagController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/user/role', [UserRoleController::class, 'index'])->name('role');
Route::get('/destination/region', [DestinationRegionController::class, 'index'])->name('region');
Route::get('/destination/tag', [DestinationTagController::class, 'index'])->name('tag');
Route::get('/destination/image', [DestinationImageController::class, 'index'])->name('image');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->controller(UserController::class)->prefix('user')->group(function() {
    Route::get('', 'index')->name('user.index');
    Route::post('', 'store')->name('user.store');
    Route::get('{id?}', 'show')->name('user.show');
    Route::put('{id?}', 'update')->name('user.update');
    Route::delete('{id?}', 'destroy')->name('user.destroy');
});

Route::controller(DestinationController::class)->prefix('destination')->group(function() {
    Route::get('', 'index')->name('destination.index');
    Route::post('', 'store')->name('destination.store');
    Route::get('{id?}', 'show')->name('destination.show');
    Route::put('{id?}', 'update')->name('destination.update');
    Route::delete('{id?}', 'destroy')->name('destination.destroy');
});

Route::controller(EventController::class)->prefix('event')->group(function() {
    Route::get('', 'index')->name('event.index');
    Route::post('', 'store')->name('event.store');
    Route::get('{id?}', 'show')->name('event.show');
    Route::put('{id?}', 'update')->name('event.update');
    Route::delete('{id?}', 'destroy')->name('event.destroy');
});



