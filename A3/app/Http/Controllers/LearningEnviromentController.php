<?php

namespace App\Http\Controllers;

use App\Models\Learning_environment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LearningEnviromentController extends Controller
{
   
    private $rules = [
        'name' => 'required|string|max:255|min:3',
        'capacity' => 'required|string|max:255|min:3',
        'area_mt2' => 'required|string|max:255|min:3',
        'floor' => 'required|string|max:255|min:3',
        'inventory' => 'required|string|max:255|min:3',
        'type_id' => 'required|numeric|max:99999999999999999999',
        'location_id' => 'required|numeric|max:99999999999999999999',
        'status' => 'required|string|max:255|min:3'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'capacity' => 'capacidad',
        'area_mt2' => 'area',
        'floor' => 'piso',
        'inventory' => 'inventario',
        'type_id' => 'tipo',
        'location_id' => 'locacion',
        'status' => 'estado',
    ];
   
   
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
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('learning_environment.create')->withInput()->withErrors($errors);
        }
        
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
            return view('learning_environment.edit', compact('learning_environment'));
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
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('learning_environment.edit')->withInput()->withErrors($errors);
        }
        
        
        $learning_environment = Learning_environment::find($id);
        if($learning_environment)
        {
            $learning_environment->update($request->all());
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
                $learning_environment->delete();
                session()->flash('message', 'Registro eliminado exitosamente');
            }
            else{
                session()->flash('warning', 'No se encuentra el registro solicitado');
            }
            return redirect()->route('learning_environment.index');
        }
    }
}
