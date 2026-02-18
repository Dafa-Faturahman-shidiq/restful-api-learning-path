<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "pelanggan"; //* Nama tabel di database
    protected $primaryKey = "id_pelanggan"; //* Nama kolom primary key
    public $increment = false; //* karena bukan auto angka
    protected $keyType = 'string'; //* karena id_pelanggan bertipe string

    protected $fillable = [
        'id_pelanggan',
        'nm_pelanggan',
        'alamat',
        'telepon',
        'email',
    ];
}
