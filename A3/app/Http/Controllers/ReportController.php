<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Course;
use App\Models\EnvironmentType;
use App\Models\Learning_environment;
use App\Models\Instructor;
use App\Models\Scheduling_environment;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learning_environments = Learning_environment::all();
        $environment_types = EnvironmentType::all();

        return view('reports.index', compact('learning_environments', 'environment_types'));
    }


    public function export_learning_environments()
    {
        $learning_environments = Learning_environment::all();
        $environment_types = EnvironmentType::all();

        $data = array(
            'learning_environments' => $learning_environments,
            'environment_types' => $environment_types
        );
        $pdf = Pdf::loadView('reports.export_learning_environment', $data)->setPaper('letter', 'portrait');
        return $pdf->download('LearningEnvironments.pdf');
    }

    public function export_scheduling_enviroments_by_course(Request $request)
    {
        $courses = Course::where('id', '=', $request['course_id'])->first();
        $learning_environments = Learning_environment::all();
        $scheduling_environments = Scheduling_environment::whereBetween('date_scheduling', [$request['initial_date'], $request['final_date']])
            ->where('course_id', '=', $request['course_id'])->get();
        $data = array(
            'initial_date' => $request['initial_date'],
            'final_date' => $request['final_date'],
            'courses' => $courses,
            'learning_environments' => $learning_environments,
            'scheduling_enviroments' => $scheduling_environments // Aquí se corrigió el nombre de la variable
        );


        $pdf = Pdf::loadView('reports\export_scheduling_enviroments_by_course', $data)->setPaper('letter', 'portrait');
        return $pdf->download('scheduling_environments_by_course.pdf');
    }

    public function export_scheduling_enviroments_by_instructor(Request $request)
    {
        $instructors = Instructor::where('id', '=', $request['fullname'])->first();
        $learning_environments = Learning_environment::all();
        $scheduling_environments = Scheduling_environment::whereBetween('date_scheduling', [$request['initial_date'], $request['final_date']])
            ->where('instructor_document', '=', $request['instructor_document'])->get();
        $data = array(
            'initial_date' => $request['initial_date'],
            'final_date' => $request['final_date'],
            'instructors' => $instructors,
            'learning_environments' => $learning_environments,
            'scheduling_enviroments' => $scheduling_environments  // <-- Asegúrate de que esta variable esté presente
        );


        $pdf = Pdf::loadView('reports/export_scheduling_enviroments_by_instructor', $data)->setPaper('letter', 'portrait');
        return $pdf->download('scheduling_enviroments_by_instructor.pdf');
    }

    public function generatePdf()
    {
        $courses = Course::all();
        $careers = Career::all()->find('1')->name;


        $data = array(
            'courses' => $courses
            ,
            'careers' => $careers
        );

        $pdf = PDF::loadView('course.pdf', $data)->setPaper('letter', 'portrait');
        return $pdf->download('courses.pdf');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
