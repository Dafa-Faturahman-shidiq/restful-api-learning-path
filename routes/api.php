<?php

use Illuminate\Support\Facades\Route;

Route::get('/salam', function () {
    return response()->json([
        'Pesan'=> 'Halo ini adalah pesan dari API Laravel',
        'Status'=> 'Sukses',
    ]);
});
