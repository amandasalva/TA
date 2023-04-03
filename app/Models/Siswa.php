<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'NIS', 
        'nama_lengkap', 
        'nama_wali', 
        'no_hp',
        'jk',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'alamat',
        'thn_masuk',
        'status',
        'image',
    ];
}