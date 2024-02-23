<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnvironmentTypeController extends Controller
{
    private $rules = [
        'description' => 'required|string|min:3|max:255'
    ];

    private $traductionAttributes = [
        'description' => 'descripción'
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

        if ($validator->fails()) {
            return redirect()->route('environment_type.create')->withInput()->withErrors($validator);
        }

        EnvironmentType::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('environment_type.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $environment_type = EnvironmentType::find($id);

        if (!$environment_type) {
            return redirect()->route('environment_type.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        return view('environment_type.edit', compact('environment_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('environment_type.edit', $id)->withInput()->withErrors($validator);
        }

        $environment_type = EnvironmentType::find($id);

        if (!$environment_type) {
            return redirect()->route('environment_type.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $environment_type->update($request->all());
        session()->flash('message', 'Registro actualizado exitosamente');
        return redirect()->route('environment_type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $environment_type = EnvironmentType::find($id);

        if (!$environment_type) {
            return redirect()->route('environment_type.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $environment_type->delete();
        session()->flash('message', 'Registro eliminado exitosamente');
        return redirect()->route('environment_type.index');
    }
}
