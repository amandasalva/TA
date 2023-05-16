<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'user_id' => 1,
            'nama_lengkap' => 'Bendahara',
            'tempat_lahir' => 'Cilacap',
            'tgl_lahir' => Carbon::now(),
            'jk' => 'Laki-laki',
            'alamat' => 'Cilacap',
            'agama' => 'Islam',
            'no_hp' => '083213123232',
            'status' => 'aktif',
            // 'image' => '/images/user-default.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}