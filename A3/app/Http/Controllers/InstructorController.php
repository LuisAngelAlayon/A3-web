<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    
    private $rules = [
        'document' => 'required|integer|max:99999999999999999999|min:1',
        'fullname' => 'required|string|max:50|min:10',
        'sena_email' => 'required|string|email|unique:instructors|max:40',
        'personal_email' => 'required|string|email|unique:instructors|max:50',
        'phone' => 'required|string|max:30',
        'password' => 'required|string|max:255|min:8',
        'type' => 'required|string|max:255|min:3',
        'profile' => 'required|string|max:255|min:3',
    ];

    private $traductionAttributes = [
        'document' => 'documento',
        'fullname' => 'nombre completo',
        'sena_email' => 'correo sena',
        'personal_email' => 'correo personal',
        'phone' => 'telefono',
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
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('instructor.create')->withInput()->withErrors($errors);
        }
        
        $instructor = Instructor::where('document', '=', $request->document)
            ->first();
        if ($instructor) {
            session()->flash('error', 'Ya existe un instructor con ese documento');
            return redirect()->route('instructor.create');
        }
        $instructor = Instructor::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('instructor.index');
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
        if ($instructor) {
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
                
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('instructor.edit')->withInput()->withErrors($errors);
        }
        
        
        $instructor = Instructor::where('document', '=', $document)
            ->first();
        if ($instructor) {

            $instructor->name = $request->name;
            $instructor->especiality = $request->especiality;
            $instructor->phone = $request->phone;
            $instructor->save();
            session()->flash('message', 'Registro actualizado exitosamente');
        } else {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }

        return redirect()->route('instructor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::where('document', '=', $id)
            ->first();
        if ($instructor) {

            $instructor->delete();

            session()->flash('message', 'Registro eliminado exitosamente');
        } else {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }

        return redirect()->route('instructor.index');
    }
}
