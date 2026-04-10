<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk; //import model Produk

class ProdukController extends Controller
{
    //mengambil semua data produk dari databse
    public function index()
    {
        $produk = Produk::all();
        // mengembalikan data dalam format JSON
        return response()->json([
            'succes' => true,
            'message' => 'Daftar Data Produk',
            'data' => $produk
        ], 200);
    }
}
