<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun_Ajaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajarans';
    protected $fillable = [
        'tahun1',
        'tahun2',
        'tahunAjaran',
        'semester',
    ];

    // public function getTahunSemesterAttribute()
    // {
    //     return $this->tahun . '/' . $this->semester . ' ' . ($this->semester == 'Genap' ? 'Genap' : 'Ganjil');
    // }
}