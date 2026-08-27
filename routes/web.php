<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

// METHOD: GET, POST, PUT, DELETE
// GET : MEMBACA, MELIHAT
// post : action request dari form, tambah/insert

Route::get('greeting', [LatihanController::class, 'greeting']);
Route::get('penjumlahan', [LatihanController::class, 'penjumlahan'])->name('penjumlahan');
Route::get('pengurangan', [LatihanController::class, 'pengurangan'])->name('pengurangan');
Route::get('pembagian', [LatihanController::class, 'pembagian'])->name('pembagian');
Route::get('perkalian', [LatihanController::class, 'perkalian'])->name('perkalian');


Route::post('action-penjumlahan', [LatihanController::class, 'actionPenjumlahan'])->name('action-penjumlahan');
Route::post('action-pengurangan', [LatihanController::class, 'actionPengurangan'])->name('action-pengurangan');
Route::post('action-pembagian', [LatihanController::class, 'actionPembagian'])->name('action-pembagian');
Route::post('action-perkalian', [LatihanController::class, 'actionPerkalian'])->name('action-perkalian');

// resource bisa handle get post



Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');



Route::resource('user', UserController::class)->middleware(['auth']);
Route::resource('user', UserController::class);
