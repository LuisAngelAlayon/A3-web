<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Course;
use App\Models\EnvironmentType;
use App\Models\Learning_environment;
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
