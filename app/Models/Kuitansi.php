<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    use HasFactory;
    protected $table = "kuitansi";
    protected $primaryKey = 'id_kuitansi';
    public $incrementing = false;

    protected $fillable = [
        'id_kuitansi',
        'id_faktur',
        'tgl_kuitansi',
    ];

}
