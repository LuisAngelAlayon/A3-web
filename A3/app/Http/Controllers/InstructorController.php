<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    private $rules = [
        'document' => 'required|integer|min:1|max:99999999999999999999',
        'fullname' => 'required|string|min:10|max:50',
        'sena_email' => 'required|string|email|unique:instructors|max:40',
        'personal_email' => 'required|string|email|unique:instructors|max:50',
        'phone' => 'required|string|max:30',
        'password' => 'required|string|min:8|max:255',
        'type' => 'required|string|min:3|max:255',
        'profile' => 'required|string|min:3|max:255',
    ];

    private $traductionAttributes = [
        'document' => 'documento',
        'fullname' => 'nombre completo',
        'sena_email' => 'correo Sena',
        'personal_email' => 'correo personal',
        'phone' => 'teléfono',
        'password' => 'contraseña',
        'type' => 'tipo',
        'profile' => 'perfil',
    ];

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
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('instructor.create')->withInput()->withErrors($validator);
        }

        $existingInstructor = Instructor::where('document', $request->document)->first();
        if ($existingInstructor) {
            return redirect()->route('instructor.create')->with('error', 'Ya existe un instructor con ese documento');
        }

        Instructor::create($request->all());
        return redirect()->route('instructor.index')->with('message', 'Registro creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $document)
    {
        $instructor = Instructor::where('document', $document)->firstOrFail();
        return view('instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $document)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('instructor.edit', ['document' => $document])->withInput()->withErrors($validator);
        }

        $instructor = Instructor::where('document', $document)->firstOrFail();
        $instructor->update($request->only(['fullname', 'sena_email', 'phone']));

        return redirect()->route('instructor.index')->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $document)
    {
        $instructor = Instructor::where('document', $document)->firstOrFail();
        $instructor->delete();

        return redirect()->route('instructor.index')->with('message', 'Registro eliminado exitosamente');
    }
}
