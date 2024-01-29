<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = new Location();
        $location->name = "Sena Tuluá";
        $location->address = "Cra 25 # 21-35";
        $location->status = "ACTIVO";
        $location->save();
    }
}
