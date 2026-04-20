<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk; //import model Produk
use Illuminate\Support\Facades\Validator;

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
            'message' => 'Detail Pada Produk',
            'data' => $produk
            ], 200);
        }

        // jika data tidak ditemukan
        return response()->json([
            'succes' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'id_produk' => 'required|uniqe:produk,id_produk|max:5',
            'nm_produk' => 'require',
            'satuan' => 'require',
            'harga' => 'require|numeric',
            'stock' => 'require|integer',
        ],
        [
            'id_produk.required' => 'Wajib Diisi',
            'id_produk.max' => 'Maximal 5 Karakter',
            'nm_produk.require' => 'Nama Produk Wajib Diisi',
            'satuan.require' => 'Satuan Wajib Diisi',
            'harga.require' => 'Harga Wajib Diisi',
            'stock.require' => 'Stock Wajib Diisi',
        ]
        );

        if($validator->fails()){ //jika validasi gagal
            return response()->json($validator->errors(), 422);
        }


    }
}
