<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnvironmentTypeController extends Controller
{
    private $rules = [
        'description' => 'required|string|max:255|min:3'
    ];

    private $traductionAttributes = [
        'description' => 'descripcion'
    ];
   
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $environment_types = EnvironmentType::all();
        return view('environment_type.index', compact('environment_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('environment_type.create');
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
            return redirect()->route('environment_type.create')->withInput()->withErrors($errors);
        }

        $environment_type = EnvironmentType::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('environment_type.index');
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
        $environment_type = EnvironmentType::find($id);
        if ($environment_type) {
            return view('environment_type.edit', compact('environment_type'));//si la causal existe
        } else {
            return redirect()->route('environment_type.index');
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
            return redirect()->route('environment_type.edit')->withInput()->withErrors($errors);
        }
        
        $environment_type = EnvironmentType::find($id);
        if ($environment_type)
        {
            $environment_type->update($request->all());
            session()->flash('message', 'Registro actualizado exitosamente');
        } else {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('environment_type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $environment_type = EnvironmentType::find($id);
        if ($environment_type) {
            $environment_type->delete();
            session()->flash('message', 'Registro eliminado exitosamente');
        } else {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('environment_type.index');
    }
}
