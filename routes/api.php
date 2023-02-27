<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) 
{
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
});

Route::controller(InitController::class)->prefix('init')
->middleware('auth')
->group(function () {
    Route::get('dashboard', 'dashboard')->name('init.dashboard');
});

Route::controller(UserController::class)->prefix('user')
->middleware('auth')
->group(function() {
    Route::get('', 'index')->name('user.index');
    Route::post('', 'store')->name('user.store');
    Route::get('{id?}', 'show')->name('user.show');
    Route::put('{id?}', 'update')->name('user.update');
    Route::delete('{id?}', 'destroy')->name('user.destroy');
});
