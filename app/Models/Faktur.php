<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;
    protected $table = 'faktur';
    protected $primaryKey = 'id_faktur';
    public $incrementing = false;


    protected $fillable = [
        'id_faktur',
        'id_pesan',
        'tgl_faktur',
    ];
}
