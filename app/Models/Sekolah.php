<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_sekolah',
        'informasi_sekolah',
        // 'image',
        'alamat_sekolah',
        'email_sekolah',
        'telepon_sekolah',
        'facebook_sekolah',
        'instagram_sekolah',
        'jam_kerja_sekolah',
    ];
}