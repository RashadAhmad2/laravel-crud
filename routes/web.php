<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'home']);

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->middleware('onlyguest');
    Route::post('/login', 'doLogin')->middleware('onlyguest');
    Route::post('/logout','doLogout')->middleware('onlymember');
});

// Register
Route::controller(RegisterController::class)->group(function () {
    Route::get('/regis', 'showRegisterForm')->middleware('onlyguest');
    Route::post('/regis', 'register')->middleware('onlyguest');
});

// Landing (hanya untuk user login)
Route::get('/Landing', function () {
    return view('landing');
})->middleware(App\Http\Middleware\OnylMemberMiddleware::class);
