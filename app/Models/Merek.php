<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;

    protected $table = 'merek';
    public $timestamps = false;
    
    protected $fillable = [
        'merek_motor',
        'tahun_pembuatan',
        'jenis_motor'
    ];

    public function motors()
    {
        return $this->hasMany(Motor::class);
    }
}


