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
        'merek_id',
        'nomor_polisi',
        'foto_motor',
        'harga_sewa',
        'transmisi',
        'status'
    ];

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }
}

