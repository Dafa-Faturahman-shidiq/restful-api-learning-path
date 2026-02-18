<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk"; //* Nama tabel di database
    protected $primaryKey = "id_produk"; //* Nama kolom primary key
    public $increment = false; //* karena bukan auto angka
    protected $keyType = 'string'; //* karena id_produk bertipe string

    protected $fillable = [
        'id_produk',
        'nama_produk',
        'satuan',
        'harga',
        'stok',
    ];

}
