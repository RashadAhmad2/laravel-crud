<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return Auth::check() ? redirect('/landing') : redirect('/login');
});

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('onlyguest')->name('login');
    Route::post('/login', 'doLogin')->middleware('onlyguest');
    Route::post('/logout','doLogout')->middleware('onlymember'); // tambahkan proteksi
});

// Register
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->middleware('onlyguest');
    Route::post('/register', 'doRegister')->middleware('onlyguest');
});

// Landing (hanya untuk user login)
Route::get('/landing', function () {
    return view('user.landing');
})->middleware('onlymember');

// Karyawan
Route::controller(KaryawanController::class)->group(function(){
    Route::get('/karyawan','index')->middleware('onlymember');
    Route::get('/tambah','ViewTambah')->middleware('onlymember');
    Route::post('/store','storePegawai')->middleware('onlymember');
    Route::get('/edit/{id}','edit')->middleware('onlymember');
    Route::post('/storeUpdate','ProsesEdit')->middleware('onlymember');
});