<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan; // import model Pelanggan

class PelangganController extends Controller
{
    public function index()
    {
        //mengembalikan data dalam format json
        return response()->json([
            'success' => true,
            'message' => 'Daftar Pelanggan',
            'data' => Pelanggan::all()
        ], 200);
    }
}
