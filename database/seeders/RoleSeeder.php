<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["name" => "Bendahara"],
            ["name" => "Siswa"],
            ["name" => "Guru"],
            ["name" => "KepSek"],
        ];
        Role::insert($data);
    }
}