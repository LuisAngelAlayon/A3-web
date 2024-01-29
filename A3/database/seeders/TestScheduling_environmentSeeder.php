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


        $scheduling_environment = new Scheduling_environment();
        $scheduling_environment->course_id = 2;
        $scheduling_environment->document_instructor = 3;
        $scheduling_environment->date_scheduling = "2003-01-09";
        $scheduling_environment->initial_hour = "2024-01-12 11:43:23";
        $scheduling_environment->final_hour = "2024-04-12 11:44:24";
        $scheduling_environment->environment_id = 1;
        $scheduling_environment->save();

    }

}

