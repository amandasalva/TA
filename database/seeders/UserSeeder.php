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
            ],
            [
                'username' => 'siswa',
                'password' => Hash::make('siswa'),
                'role_id' => '2',
            ],
            [
                'username' => 'guru',
                'password' => Hash::make('guru'),
                'role_id' => '3',
            ],
            [
                'username' => 'kepsek',
                'password' => Hash::make('kepsek'),
                'role_id' => '4',
            ],
        ];
        User::insert($data);
    }
}