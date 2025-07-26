<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;
Route::resource('bahan', BahanController::class);

Route::get('/pembelian', function () {return view('pembelian');})->name('pembelian');

Route::get('/', [BahanController::class, 'index'])->name('index');
Route::post('/', [BahanController::class, 'store'])->name('bahan.store');
Route::get('/create', [BahanController::class, 'create'])->name('bahan.create');

Route::get('/kemaskini/{id}', [BahanController::class, 'edit'])->name('bahan.edit');
Route::put('/kemaskini/{id}', [BahanController::class, 'update'])->name('bahan.update');
Route::delete('/hapus/{id}', [BahanController::class, 'destroy'])->name('bahan.destroy');