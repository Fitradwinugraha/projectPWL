<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $table = 'motor'; 

    protected $fillable = [
        'nama_motor',
        'merek_motor',  
        'tahun_pembuatan',
        'foto_motor',
        'harga_sewa',
        'transmisi',
        'deskripsi',
        'jumlah',
    ];
}



