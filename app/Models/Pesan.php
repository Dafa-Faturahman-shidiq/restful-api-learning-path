<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = "pesan"; //* Nama tabel di database
    protected $primaryKey = "id_pesan"; //* Nama kolom primary key
    public $increment = false; //* karena bukan auto angka

    protected $fillable = [
        'id_pesan',
        'id_pelanggan',
        'tgl_pesan',
    ];
}
