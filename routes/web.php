<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PulsaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('content.admin.dashboard');
})->name('dashboard');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login-process');

Route::get('/registration', [LoginController::class, 'registration']);
Route::post('/registration', [LoginController::class, 'register'])->name('register-process');

Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');
Route::post('/user-datatable', [UserController::class, 'datatable'])->name('user-datatable');
Route::get('/manage-user-edit/{id}', [UserController::class, 'edit'])->name('user-edit');
Route::get('/manage-user-delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
Route::put('/manage-user-update/{id}', [UserController::class, 'update'])->name('user-update');

Route::get('/manage-product-pulsa', [PulsaController::class, 'index'])->name('manage-pulsa');
Route::post('/pulsa-datatable', [PulsaController::class, 'datatable'])->name('pulsa-datatable');
Route::get('/manage-pulsa-create', [PulsaController::class, 'create'])->name('pulsa-create');
Route::post('/manage-pulsa-create', [PulsaController::class, 'store'])->name('pulsa-store');
Route::get('/manage-pulsa-edit/{id}', [PulsaController::class, 'edit'])->name('pulsa-edit');
Route::get('/manage-pulsa-delete/{id}', [PulsaController::class, 'destroy'])->name('pulsa-delete');
Route::put('/manage-pulsa-update/{id}', [PulsaController::class, 'update'])->name('pulsa-update');

Route::get('/manage-product-barang', [BarangController::class, 'index'])->name('manage-barang');
Route::post('/barang-datatable', [BarangController::class, 'datatable'])->name('barang-datatable');
Route::get('/manage-barang-create', [BarangController::class, 'create'])->name('barang-create');
Route::post('/manage-barang-create', [BarangController::class, 'store'])->name('barang-store');
Route::get('/manage-barang-edit/{id}', [BarangController::class, 'edit'])->name('barang-edit');
Route::get('/manage-barang-delete/{id}', [BarangController::class, 'destroy'])->name('barang-delete');
Route::put('/manage-barang-update/{id}', [BarangController::class, 'update'])->name('barang-update');





