<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lab::create([
            'lab' => 'LAB Teknik Informatika'
        ]);
        Lab::create([
            'lab' => 'LAB Teknik Mesin'
        ]);
        Lab::create([
            'lab' => 'LAB TPTU'
        ]);
        Lab::create([
            'lab' => 'LAB Keperawatan'
        ]);

        
    }
}
