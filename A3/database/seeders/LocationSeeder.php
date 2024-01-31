<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::insert([

            ['name' => 'Sagrado corazon', 'address' => 'Cra 25 # 24-47', 'status' => 'Activo'],
            ['name' => 'Colegio Salesiano', 'address' => 'Cl. 34 #Cra 26', 'status' => 'Activo'],
            ['name' => 'CLEM', 'address' => 'Km 2 vía Tuluá - Buga', 'status' => 'Inactivo'],

        ]);
    }
}
