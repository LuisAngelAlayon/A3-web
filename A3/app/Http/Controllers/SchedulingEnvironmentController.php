<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Learning_environment;
use App\Models\Scheduling_environment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchedulingEnvironmentController extends Controller
{
    private $rules = [
        'course_id' => 'required|numeric',
        'instructor_document' => 'required|numeric',
        'environment_id' => 'required|numeric',
        'date_scheduling' => 'required|date_format:Y-m-d'
    ];

    private $traductionAttributes = [
        'course_id' => 'curso',
        'instructor_document' => 'documento del instructor',
        'environment_id' => 'ambiente',
        'date_scheduling' => 'fecha de programación'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduling_environments = Scheduling_environment::all();
        return view('scheduling_environment.index', compact('scheduling_environments'));
    }

    public function reports()
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('scheduling_environment.reports', compact('courses', 'instructors'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $learning_environments = Learning_environment::all();

        return view('scheduling_environment.create', compact('courses', 'learning_environments'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('scheduling_environment.create')->withInput()->withErrors($validator);
        }

        Scheduling_environment::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('scheduling_environment.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $scheduling_environment = Scheduling_environment::find($id);
        if (!$scheduling_environment) {
            return redirect()->route('scheduling_environment.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        return view('scheduling_environment.edit', compact('scheduling_environment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('scheduling_environment.edit', $id)->withInput()->withErrors($validator);
        }

        $scheduling_environment = Scheduling_environment::find($id);
        if (!$scheduling_environment) {
            return redirect()->route('scheduling_environment.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $scheduling_environment->update($request->all());
        session()->flash('message', 'Registro actualizado exitosamente');
        return redirect()->route('scheduling_environment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $scheduling_environment = Scheduling_environment::find($id);
        if (!$scheduling_environment) {
            return redirect()->route('scheduling_environment.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $scheduling_environment->delete();
        session()->flash('message', 'Registro eliminado exitosamente');
        return redirect()->route('scheduling_environment.index');
    }
}
