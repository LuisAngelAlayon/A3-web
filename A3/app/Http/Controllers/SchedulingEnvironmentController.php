<?php

namespace App\Http\Controllers;

use App\Models\Scheduling_environment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class schedulingEnvironmentController extends Controller
{
    
    private $rules = [
        'course_id' => 'required|numeric|max:99999999999999999999',
        'instructor_document' => 'required|integer|max:99999999999999999999|min:1',
        'date_scheduling' => 'required|date|date_format:Y-m-d',
        'inicial_hour' => 'required|numeric|max:9999999999|min:1',
        'final_hour' => 'required|numeric|max:9999999999|min:1',
        'environment_id' => 'required|numeric|max:99999999999999999999',

    ];

    private $traductionAttributes = [
        'course_id' => 'curso',
        'instructor_document' => 'documento del intructor',
        'inicial_hour' => 'hora inicial',
        'final_hour' => 'hora final',
        'environment_id' => 'ambiente'
    ];
    
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
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('scheduling_environment.create')->withInput()->withErrors($errors);
        }
        
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
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('scheduling_environment.edit')->withInput()->withErrors($errors);
        }
        
        $scheduling_environment = Scheduling_environment::find($id);
        if ($scheduling_environment)
        {
            $scheduling_environment->update($request->all());
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
                $scheduling_environment->delete();
                session()->flash('message', 'Registro eliminado exitosamente');
            } else {
                session()->flash('warning', 'No se encuentra el registro solicitado');
            }
            return redirect()->route('scheduling_environment.index');
        }
    }
}
