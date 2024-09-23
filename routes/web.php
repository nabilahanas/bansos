<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerimaController;

Route::get('/', [PenerimaController::class, 'create'])->name('penerima.create');
Route::post('/store', [PenerimaController::class, 'store'])->name('penerima.store');
Route::get('/preview/{id}', [PenerimaController::class, 'preview'])->name('penerima.preview');

Route::get('/get-kota/{provinceId}', [PenerimaController::class, 'getKota']);
Route::get('/get-kecamatan/{cityId}', [PenerimaController::class, 'getKecamatan']);
Route::get('/get-kelurahan/{regencyId}', [PenerimaController::class, 'getKelurahan']);