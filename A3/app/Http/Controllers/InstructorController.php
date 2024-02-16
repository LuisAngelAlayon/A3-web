<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructor.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $instructor = Instructor::where('document', '=', $request->document)
        ->first();
        if($instructor)
        {
        session()->flash('error', 'Ya existe un tecnico con ese documento');
        return redirect()->route('technician.create');
        }
        $instructor = Instructor::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('type_activity.index');
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
        $instructor = Instructor::where('document', '=', $id)
        ->first();
        if($instructor)

        {
            return view('instructor.edit', compact('instructor'));

        }

        session()->flash('warning', 'No se encuentra el registro solicitado');
        return redirect()->route('instructor.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $document)
    {
        $instructor = Instructor::where('document', '=', $document)
        ->first();
        if($instructor)

        {
           
            $instructor->name = $request->name ;
            $instructor->especiality = $request->especiality;
            $instructor->phone = $request->phone;
            $instructor->save();
            session()->flash('message', 'Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }

        return redirect()->route('technician.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::where('document', '=', $id)
        ->first();
        if($instructor)

        {
           
            $instructor->delete();

            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }

        return redirect()->route('instructor.index');
    }
}
