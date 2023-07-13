<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_Jenis_Transaksi extends Model
{
    use HasFactory;

    protected $table = 'riwayat_ubah_jenis_pembayaran';

    protected $fillable = [
        'nama_tagihan',
        'nominal',
    ];
}