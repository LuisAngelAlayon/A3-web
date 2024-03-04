<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    private $rules = [
        'code' => 'required|string|min:3|max:255',
        'shift' => 'required|string|min:3|max:255',
        'career_id' => 'required|numeric|max:99999999999999999999',
        'initial_date' => 'required|date|date_format:Y-m-d',
        'final_date' => 'required|date|date_format:Y-m-d',
        'status' => 'required|string|max:255',
    ];

    private $traductionAttributes = [
        'code' => 'código',
        'shift' => 'jornada',
        'career_id' => 'carrera',
        'status' => 'estado',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $shifts = array(
            ['name' => 'DIURNA', 'value' => 'DIURNA'],
            ['name' => 'MIXTA', 'value' => 'MIXTA'],
            ['name' => 'NOCTURNA', 'value' => 'NOCTURNA'],
        );

        $status = array(
            ['name' => 'LECTIVA', 'value' => 'LECTIVA'],
            ['name' => 'PRODUCTIVA', 'value' => 'PRODUCTIVA'],
            ['name' => 'INDUCCIÓN', 'value' => 'INDUCCIÓN'],
        );

        $careers = Career::all();

        return view('course.create', compact('shifts', 'status', 'careers'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('course.create')->withInput()->withErrors($validator);
        }

        Course::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('course.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        if (!$course) {
            $careers = Career::all();
            $status = array(
                ['name' => 'LECTIVA', 'value' => 'LECTIVA'],
                ['name' => 'PRODUCTIVA', 'value' => 'PRODUCTIVA'],
                ['name' => 'INDUCCIÓN', 'value' => 'INDUCCIÓN'],
            );
            $shifts = array(
                ['name' => 'DIURNA', 'value' => 'DIURNA'],
                ['name' => 'MIXTA', 'value' => 'MIXTA'],
                ['name' => 'NOCTURNA', 'value' => 'NOCTURNA'],
            );

            return view('course.edit', compact('course', 'careers', 'status', 'shifts'));
        }

        session()->flash('warning', 'No se encuentra el registro solicitado');
        return redirect()->route('course.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('course.edit', $id)->withInput()->withErrors($validator);
        }

        $course = Course::find($id);
        if (!$course) {
            return redirect()->route('course.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $course->update($request->all());
        session()->flash('message', 'Registro actualizado exitosamente');
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect()->route('course.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $course->delete();
        session()->flash('message', 'Registro eliminado exitosamente');
        return redirect()->route('course.index');
    }
}

