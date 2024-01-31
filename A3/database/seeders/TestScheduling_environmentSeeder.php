<?php

namespace Database\Seeders;

use App\Models\Instructor;
use App\Models\Scheduling_environment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestScheduling_environmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Instructor::find(6);
        $instructor = Instructor::where('document', '=', '29301321')->first();

        $scheduling_environment = new Scheduling_environment();
        $scheduling_environment->course_id = 2;
        $scheduling_environment->instructor_document = $instructor->document;
        $scheduling_environment->date_scheduling = "2023-01-09";
        $scheduling_environment->initial_hour = "00:11:23";
        $scheduling_environment->final_hour = "00:12:23";
        $scheduling_environment->environment_id = 1;
        $scheduling_environment->save();

    }

}

