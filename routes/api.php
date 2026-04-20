<?php

use App\Http\Controllers\Api\PelangganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProdukController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//* Produk
//enpoint untuk mengambil data produk
Route::get('/produk', [ProdukController::class, 'index']);
// Menampilkan data produk Berdasarkan id
Route::get('/produk/{id}', [ProdukController::class, 'show']);
//Menambah Produk Baru
Route::post('/produk', [ProdukController::class, 'store']);
//Update Data
Route::put('/produk/{id}', [ProdukController::class, 'update']);
//Hapus Data
Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

//* pelanggan
// 1. Daftar
Route::get('/pelanggan', [PelangganController::class, 'index']);
//2. detail
Route::get('/pelanggan/{id}', [PelangganController::class, 'show']);
//3. insert
Route::post('/pelanggan', [PelangganController::class, 'store']);
// 4. update
Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
// 5. delete
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy']);

