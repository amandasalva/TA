<?php

namespace Database\Seeders;

use App\Models\Jenis_Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisTransaksi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_tagihan' => 'Baju Seragam',
                'nominal' => 0,
            ],
            [
                'nama_tagihan' => 'Sarana dan Prasarana',
                'nominal' => 0,
            ],
            [
                'nama_tagihan' => 'LKS',
                'nominal' => 0,
            ],
            ];
            
        Jenis_Transaksi::insert($data);
    }
}