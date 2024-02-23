<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    private $rules = [
        'name' => 'required|string|min:5|max:255',
        'type' => 'required|string|min:5|max:255',
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'type' => 'tipo',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::all();
        return view('career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('career.create')->withInput()->withErrors($validator);
        }

        Career::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('career.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $career = Career::find($id);
        if (!$career) {
            return redirect()->route('career.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        return view('career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('career.edit', $id)->withInput()->withErrors($validator);
        }

        $career = Career::find($id);
        if (!$career) {
            return redirect()->route('career.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $career->update($request->all());
        session()->flash('message', 'Registro actualizado exitosamente');
        return redirect()->route('career.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Career::find($id);
        if (!$career) {
            return redirect()->route('career.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $career->delete();
        session()->flash('message', 'Registro eliminado exitosamente');
        return redirect()->route('career.index');
    }
}
