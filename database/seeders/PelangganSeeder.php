<?php

namespace Database\Seeders;

use App\Models\Pesan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_pelaggan' => 'P0001', 'nm_pelanggan' => 'Budi Santoso', 'alamat' => 'Jl. Teratai No.15, Bandung', 'telepon' => '081234567890', 'email' => 'budi@gmail.com'],
            ['id_pelaggan' => 'P0002', 'nm_pelanggan' => 'Sinta Dewi', 'alamat' => 'Jl. Mawar No.7, Cimahi', 'telepon' => '0888899900', 'email' => 'sinta@yahoo.com'],
            ['id_pelaggan' => 'P0003', 'nm_pelanggan' => 'Andi Pratama', 'alamat' => 'Jl. Anggrek No.5, Sukabumi', 'telepon' => '081355512345', 'email' => 'andipratama@mycompany.com'],
            ['id_pelaggan' => 'P0004', 'nm_pelanggan' => 'Dewi Larasari', 'alamat' => 'Jl. Anggrek No.11, Cimahi', 'telepon' => '081377788899', 'email' => 'dwi@gmail.com'],
            ['id_pelaggan' => 'P0005', 'nm_pelanggan' => 'Rizky Ananda', 'alamat' => 'Jl. Kenangan No.9, Garut', 'telepon' => '081366600000', 'email' => 'rizky@ymail.com'],
        ];

        foreach ($data as $item ){
            Pelanggan::create($item);
        };
    }
}
