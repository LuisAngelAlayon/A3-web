<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
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
        $career = Career::create($request->all());
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
        $career = Career::find($id);
        if($career){
            return view('career.edit', compact('career'));//si la causal existe
        }
        else{
            return redirect()->route('career.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $career = Career::find($id);
        if($career)//si la causal existe
        {
            $career->update($request->all());//delete from causal where id = x
            session()->flash('message', 'Registro actualizado exitosamente');
        }
        else{
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('career.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $career = Career::find($id);
        if($career)
        {
            $career->delete();//delete from causal where id = x
            session()->flash('message', 'Registro eliminado exitosamente');
        }
        else{
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('career.index');
    }
}

