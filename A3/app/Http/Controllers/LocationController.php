<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
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
        $location = Location::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('career.index');
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
        $location = Location::find($id);
        if($location){
            return view('location.edit', compact('location'));//si la causal existe
        }
        else{
            return redirect()->route('location.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = Location::find($id);
        if($location)
        {
            $location->update($request->all());
            session()->flash('message', 'Registro actualizado exitosamente');
        }
        else{
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::find($id);
        if($location)
        {
            $location->delete();//delete from causal where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else{
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('location.index');
    }
}

