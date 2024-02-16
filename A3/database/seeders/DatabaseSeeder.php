<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\InstructorFactory;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        /*$this->call(CareerSeeder::class);
        $this->call(EnvironmentTypeSeeder::class);
        $this->call(LocationSeeder::class);

        //Llamada al InstructorFactory para crear 5 instructores con perfiles variados
        InstructorFactory::new()->count(5)->create();

        // Llamada al UserFactory para crear 5 usuarios
        UserFactory::new()->count(5)->create();

        $this->call(TestCareerSeeder::class);
        $this->call(TestCourseSeeder::class);
        $this->call(TestEnvironmentTypeSeeder::class);
        $this->call(TestInstructorSeeder::class);
        $this->call(TestLearning_environmentSeeder::class);
        $this->call(TestLocationSeeder::class);
        $this->call(TestScheduling_environmentSeeder::class);*/
    }
}
