<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'bendahara',
                'password' => Hash::make('bendahara'),
                'role_id' => '1',
                'email' => 'lalakloper@gmail.com',
            ],
            [
                'username' => 'siswa',
                'password' => Hash::make('siswa1234'),
                'role_id' => '2',
                'email' => 'guru@gmail.com',
            ],
            [
                'username' => 'wali kelas',
                'password' => Hash::make('guru1234'),
                'role_id' => '3',
                'email' => 'walikelas@gmail.com',
            ],
            [
                'username' => 'kepala sekolah',
                'password' => Hash::make('kepsek1234'),
                'role_id' => '4',
                'email' => 'kepsek@gmail.com',
            ],
        ];
        User::insert($data);
    }
}