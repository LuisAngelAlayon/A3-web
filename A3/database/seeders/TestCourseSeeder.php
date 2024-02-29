<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $course = new Course();
        $course->code = "2771230";
        $course->shift = "DIURNO";
        $course->career_id = 1;
        $course->initial_date = "2024-01-29";
        $course->final_date = "2024-8-30";
        $course->status = "ACTIVO";
        $course->save();

        $course = new Course();
        $course->code = "2773030";
        $course->shift = "NOCTURNA";
        $course->career_id = 2;
        $course->initial_date = "2024-01-29";
        $course->final_date = "2024-5-30";
        $course->status = "INACTIVO";
        $course->save();

        $course = new Course();
        $course->code = "4050232";
        $course->shift = "DIURNO";
        $course->career_id = 3;
        $course->initial_date = "2024-01-29";
        $course->final_date = "2024-6-30";
        $course->status = "ACTIVO";
        $course->save();

        $course = new Course();
        $course->code = "1025092";
        $course->shift = "NOCTURNA";
        $course->career_id = 4;
        $course->initial_date = "2024-01-29";
        $course->final_date = "2024-7-30";
        $course->status = "INACTIVO";
        $course->save();

        $course = new Course();
        $course->code = "2930298";
        $course->shift = "DIURNO";
        $course->career_id = 5;
        $course->initial_date = "2024-01-29";
        $course->final_date = "2024-12-30";
        $course->status = "ACTIVO";
        $course->save();
    }
}
