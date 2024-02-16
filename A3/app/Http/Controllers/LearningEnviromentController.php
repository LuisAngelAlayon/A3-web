<?php

namespace App\Http\Controllers;

use App\Models\Learning_environment;
use Illuminate\Http\Request;

class LearningEnviromentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $learning_environments = Learning_environment::all();  
      
        return view('learning_environment.index', compact('learning_environments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('learning_environment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $learning_environment = Learning_environment::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('learning_environment.index');
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
        $learning_environment = Learning_environment::find($id);
        if($learning_environment){
            return view('learning_environment.edit', compact('learning_environment'));//si la causal existe
        }
        else{
            return redirect()->route('learning_environment.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $learning_environment = Learning_environment::find($id);
        if($learning_environment)//si la causal existe
        {
            $learning_environment->update($request->all());//delete from causal where id = x
            session()->flash('message', 'Registro actualizado exitosamente');
        }
        else{
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('learning_environment.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $learning_environment = Learning_environment::find($id);
            if($learning_environment)
            {
                $learning_environment->delete();//delete from causal where id = x
                session()->flash('message', 'Registro eliminado exitosamente');
            }
            else{
                session()->flash('warning', 'No se encuentra el registro solicitado');
            }
            return redirect()->route('learning_environment.index');
        }
    }
}
