<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    private $rules = [
        'code' => 'required|string|max:255|min:3',
        'shift' => 'required|string|max:255|min:3',
        'career_id' => 'required|numeric|max:99999999999999999999',
        'initial_date' => 'required|date|date_format:Y-m-d',
        'final_date' => 'required|date|date_format:Y-m-d',
        'status' => 'required|string|max:255|'
    ];

    private $traductionAttributes = [
        'code' => 'codigo',
        'shift' => 'jornada',
        'career' => 'carrera',
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
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
                $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('course.edit')->withInput()->withErrors($errors);
        }
        
        Course::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('course.index');
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
        $course = Course::find($id);
        if ($course) {
            return view('course.edit', compact('course'));
        } else {
            return redirect()->route('course.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('course.edit')->withInput()->withErrors($errors);
        }
        
        $course = Course::find($id);
        if ($course)
        {
            $course->update($request->all());
            session()->flash('message', 'Registro actualizado exitosamente');
        } else {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { {
            $course = Course::find($id);
            if ($course) {
                $course->delete();//delete from causal where id = x
                session()->flash('message', 'Registro eliminado exitosamente');
            } else {
                session()->flash('warning', 'No se encuentra el registro solicitado');
            }
            return redirect()->route('course.index');
        }
    }
}
