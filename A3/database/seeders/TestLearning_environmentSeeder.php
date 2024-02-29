<?php

namespace Database\Seeders;

use App\Models\Learning_environment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestLearning_environmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $learning_environment = new Learning_environment();
        $learning_environment->name = "Sena Centro de Computacion";
        $learning_environment->capacity = "30";
        $learning_environment->area_mt2 = "80";
        $learning_environment->floor = "Segundo";
        $learning_environment->inventory = "perifericos, ascensor, mesas, sillas, computadores, escritorios";
        $learning_environment->type_id = 8;
        $learning_environment->location_id = 1;
        $learning_environment->status = "ACTIVO";
        $learning_environment->save();

    }
}
