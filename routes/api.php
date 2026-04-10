<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProdukController;

Route::get('/salam', function () {
    return response()->json([
        'Pesan'=> 'Halo ini adalah pesan dari API Laravel',
        'Status'=> 'Sukses',
    ]);
});


//enpoint untuk mengambil data produk
Route::get('/produk', [ProdukController::class, 'index']);
// Menampilkan data produk Berdasarkan id
Route::get('/produk/{id}', [ProdukController::class, 'show']);
