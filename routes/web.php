<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

Route::controller(\App\Http\Controllers\LoginController::class)->group(function()
{
    Route::get('/login', 'login')->middleware(App\Http\Middleware\OnylGuestMiddleware::class);
    Route::post('/login', 'DoLogin')->middleware(App\Http\Middleware\OnylGuestMiddleware::class);
    Route::post('/logout','DoLogout')->middleware(App\Http\Middleware\OnylMemberMiddleware::class);
});