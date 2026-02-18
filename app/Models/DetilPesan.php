<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetilPesan extends Model
{
    protected $table = "detil_pesan";
    //* Karena tidak ada satu ID tunggal, kita beritahu laravel bahwa table ini tidak memiliki primary key standar
    protected $primaryKey = null; //* Karena tidak ada primary key tunggal
    public $incrementing = false;

    protected $fillable = [
        'id_pesan',
        'id_produk',
        'jumlah',
        'harga',
    ];

}
