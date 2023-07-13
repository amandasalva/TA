<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Transaksi extends Model
{
    use HasFactory;

    protected $table = 'jenis';

    protected $fillable = [
        'nama_tagihan',
        'nominal',
    ];
}