<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    private $rules = [
        'name' => 'required|string|max:255|min:3',
        'address' => 'required|string|max:255|min:3',
        'status' => 'required|string|max:255|min:3'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'address' => 'dirección',
        'status' => 'estado',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('location.create')->withInput()->withErrors($validator);
        }

        Location::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('location.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $location = Location::find($id);

        if (!$location) {
            return redirect()->route('location.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('location.edit', $id)->withInput()->withErrors($validator);
        }

        $location = Location::find($id);

        if (!$location) {
            return redirect()->route('location.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $location->update($request->all());
        session()->flash('message', 'Registro actualizado exitosamente');
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location = Location::find($id);

        if (!$location) {
            return redirect()->route('location.index')->with('warning', 'No se encuentra el registro solicitado');
        }

        $location->delete();
        session()->flash('message', 'Registro eliminado exitosamente');
        return redirect()->route('location.index');
    }
}
