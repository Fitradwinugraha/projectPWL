<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'users_id',
        'motor_id',
        'tanggal_sewa',
        'no_telepon',
        'foto_ktp',
        'tanggal_kembali',
        'jumlah',
        'total_harga',
        'metode_pembayaran',
        'foto_bukti_pembayaran',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id');
    }
}
