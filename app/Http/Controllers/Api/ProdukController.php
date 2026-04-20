<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk; //import model Produk
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    //*mengambil semua data produk dari databse
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

    //* Detail Barang
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

    //* Menambah Produk Baru
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'id_produk' => 'required|unique:produk,id_produk|max:5',
            'nm_produk' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer'
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

        if($validator->fails()){ // 2. jika validasi gagal
            return response()->json($validator->errors(), 422);
        }

        $produk = Produk::create([ // 3. Simpan Data Ke DB (INSERT)
            // field di database
            'id_produk' => $request->id_produk,
            'nm_produk' => $request->nm_produk,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stock' => $request->stock
        ]);

        return response()->json([ // 4. Return Respone Berhasil
            'success' => true,
            'message' => "Data Produk Berhasil Disimpan",
            'data' => $produk
        ], 201); // 201 artinya "Created"
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id); // 1. Cari Produk berdasarkan id

        if (!$produk) { //! jika data Tidak ad
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [ // 2. Validasi Input
            'nm_produk' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        if($validator->fails()){ // 3. jika validasi gagal
            return response()->json($validator->errors(), 422);
        }

        $produk->update([ // 3. Update Data Ke DB
            // field di database
            'nm_produk' => $request->nm_produk,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stock' => $request->stock
        ]);

        return response()->json([ // 4. Return Respone Berhasil
            'success' => true,
            'message' => "Data Produk Berhasil Diubah",
            'data' => $produk
        ], 200); // 200 artinya "Berhasil"
    }

    public function destroy($id)
    {
        $produk = Produk::find($id); // 1. Cari Produk berdasarkan id

        if (!$produk) { //! jika data Tidak ada
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $produk->delete();

        return response()->json([ // 4. Return Respone Berhasil
            'success' => true,
            'message' => "Data Produk Berhasil Hapus"
        ], 200); // 200 artinya "Berhasil"

    }
}
