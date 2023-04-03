<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'alamat',
        'agama',
        'no_hp',
        'status',
        'image',
    ];
}