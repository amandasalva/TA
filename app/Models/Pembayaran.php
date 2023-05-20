<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tgl_pembayaran',
        'total_bayar',
        'keterangan',
        'tipe_pembayaran',
        'status',
        'token',
    ];
}