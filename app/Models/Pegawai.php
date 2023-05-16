<?php

namespace App\Models;

use Carbon\Carbon;
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

    // Akses mutator untuk mengatur nilai tgl_lahir
    // public function setTglLahirAttribute($value)
    // {
    //     $this->attributes['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $value);
    // }

    // // Aksesor untuk mengakses nilai tgl_lahir
    // public function getTglLahirAttribute($value)
    // {
    //     return Carbon::parse($value)->format('dd/mm/yyyy');
    // }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}