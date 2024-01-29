<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestInstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructor = new Instructor();
        $instructor->document = 29301321;
        $instructor->fullname = 'Juan Perez Gonzalez';
        $instructor->sena_email = 'JuanP@Soy.sena.edu.co';
        $instructor->personal_email = 'JuanPerez@example.com';
        $instructor->phone = '34691247654';
        $instructor->password = 'JuanPerez123';
        $instructor->remember_token = '1234567890';
        $instructor->type = 'instructor';
        $instructor->profile = 'CONTRATISTA O DE PLANTA';
        $instructor->save();



    }
}
