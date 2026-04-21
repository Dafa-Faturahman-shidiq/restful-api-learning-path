<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Validator;// import model Pelanggan

class PelangganController extends Controller
{
    // Daftar Pelanggan
    public function index()
    {
        //mengembalikan data dalam format json
        return response()->json([
            'success' => true,
            'message' => 'Daftar Pelanggan',
            'data' => Pelanggan::all()
        ], 200);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        if($pelanggan){ // jika pelanggan tidak ada
            return response()->json([
                'success' => true,
                'message' => 'Detail data Pelanggan',
                'data' => $pelanggan
            ], 200);
        }

        // jika data tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'Data tidak Ditemukan'
        ], 404);
    }

    public function store(Request $request)
    {

    //validasi
        $validator = Validator::make($request->all(), [
            'id_pelanggan' => 'required|unique:pelanggan,id_pelanggan',
            'nm_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:pelanggan,email'
        ]);

        // jika validasi gagal
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        //insert
        $pelanggan = Pelanggan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'nm_pelanggan' => $request->nm_pelanggan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan',
            'data' => $pelanggan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);

        // jika data tidak ada
        if(!$pelanggan){
            return response()->json([
                'success' => false,
                'message' => "Data Tidak DItemukan"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nm_pelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:pelanggan,email'
        ]);

        // jika validasi gagal
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $pelanggan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diubah',
            'data' => $pelanggan
        ], 200);


    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);

        if(!$pelanggan)
        {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $pelanggan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
            'data' => $pelanggan
        ], 200);

    }
}
