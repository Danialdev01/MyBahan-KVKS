<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanController;
Route::resource('bahan', BahanController::class);

Route::get('/', function () {return view('index');})->name('index');
Route::get('/pembelian', function () {return view('pembelian');})->name('pembelian');
Route::get('/utama', function () {return view('utama');})->name('utama');

Route::get('/utama', [BahanController::class, 'utama'])->name('utama');
Route::get('/pembelian', [BahanController::class, 'pembelian'])->name('pembelian');
Route::post('/', [BahanController::class, 'store'])->name('bahan.store');
Route::get('/create', [BahanController::class, 'create'])->name('bahan.create');

Route::get('/kemaskini/{id}', [BahanController::class, 'edit'])->name('bahan.edit');
Route::put('/kemaskini/{id}', [BahanController::class, 'update'])->name('bahan.update');
Route::put('/beli/{id}', [BahanController::class, 'beli'])->name('bahan.beli');
Route::delete('/hapus/{id}', [BahanController::class, 'delete'])->name('bahan.delete');