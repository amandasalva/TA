<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;

    protected $table = 'wali_kelas';

    protected $fillable = [
        'user_id',
        'kelas_id',
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

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}