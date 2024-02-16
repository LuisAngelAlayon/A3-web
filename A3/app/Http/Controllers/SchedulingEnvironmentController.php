<?php

namespace App\Http\Controllers;

use App\Models\Scheduling_environment;
use Illuminate\Http\Request;

class schedulingEnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduling_environments = Scheduling_environment::all();

        return view('scheduling_environment.index', compact('scheduling_environments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scheduling_environment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $scheduling_environment = Scheduling_environment::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('scheduling_enviroment.index');
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
        $scheduling_environment = Scheduling_environment::find($id);
        if ($scheduling_environment) {
            return view('scheduling_environment.edit', compact('scheduling_environment'));//si la causal existe
        } else {
            return redirect()->route('scheduling_environment.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $scheduling_environment = Scheduling_environment::find($id);
        if ($scheduling_environment)//si la causal existe
        {
            $scheduling_environment->update($request->all());//delete from causal where id = x
            session()->flash('message', 'Registro actualizado exitosamente');
        } else {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }
        return redirect()->route('scheduling_environment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { {
            $scheduling_environment = Scheduling_environment::find($id);
            if ($scheduling_environment) {
                $scheduling_environment->delete();//delete from causal where id = x
                session()->flash('message', 'Registro eliminado exitosamente');
            } else {
                session()->flash('warning', 'No se encuentra el registro solicitado');
            }
            return redirect()->route('scheduling_environment.index');
        }
    }
}
