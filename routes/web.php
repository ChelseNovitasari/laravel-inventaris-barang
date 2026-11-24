<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('barang/create', [BarangController::class, 'store'])->name('barang.store');
    Route::get('barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::get('barang/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::put('barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
