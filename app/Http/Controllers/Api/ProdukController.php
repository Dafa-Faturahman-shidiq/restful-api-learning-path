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

    public function show($id)
    {
        // Mencari produk Berdasarkan Primary Key
        $produk = Produk::find($id);

        // jika data ditemukan
        if($produk){
            return response()->json([
            'succes' => true,
            'message' => 'Detaik Pada Produk',
            'data' => $produk
            ], 200);
        }

        // jika data tidak ditemukan
        return response()->json([
            'succes' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }
}
