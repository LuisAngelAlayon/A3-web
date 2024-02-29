<?php

namespace Database\Seeders;

use App\Models\EnvironmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestEnvironmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $EnvironmentType = new EnvironmentType();
        $EnvironmentType->description = "AULA DE COMPUTACION";
        $EnvironmentType->save();
    }
}
