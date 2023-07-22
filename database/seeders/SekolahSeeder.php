<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sekolah::create([
            'nama_sekolah' => 'SD Muhammadiyah 05 Karangtalun',
            'informasi_sekolah' => 'Sekolah Dasar (SD) Muhammadiyah 05 Karangtalun adalah salah satu sekolah swasta yang berdiri sejak 01 September 1960 di Kabupaten Cilacap. SD Muhammadiyah 05 ini sudah terakreditasi B dengan pembelajaran menggunakan kurikulum 2013 dan kurikulum merdeka, serta kegiatan belajar mengajar selama 6 hari dalam seminggu.',
            'alamat_sekolah' => 'Jl. Darusman No.27, RT.04/RW.7, Karangtalun, Kec. Cilacap Utara, Kabupaten Cilacap, Jawa Tengah 53233',
            'email_sekolah' => 'purwantotri111@gmail.com',
            'telepon_sekolah' => '0857-2601-8140',
            'facebook_sekolah' => 'SD Muhammadiyah 05 Cilacap',
            'instagram_sekolah' => '@sdmuliacilacap',
            'jam_kerja_sekolah' => 'Senin - Sabtu, 07.00 - 15.00 WIB',
            'image' => 'sdmulia.jpg',
        ]);
    }
}