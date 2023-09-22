<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'superadmin'
        ]);

        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role' => 'admin'
        // ]);

        // User::create([
        //     'name' => 'mahasiswa',
        //     'email' => 'mahasiswa@gmail.com',
        //     'password' => bcrypt('12345678'),
        //     'role' => 'mahasiswa'
        // ]);
    }
}
