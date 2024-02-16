@extends('templates.base')

@section('title', 'Editar curso')
@section('header', 'Editar curso')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('course.update', $course['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col lg-4 mb-4">
                    <label for="code">Código</label>
                    <input type="number" class="form-control"
                        id="code" name="code" required> 
                    </div>
                    <div class="col lg-4 mb-4">
                    <label for="shift">Jornada</label>
                        <select name="shift" id="shift"
                        class="form-control" required>
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Diurna">Diurna</option>
                        <option value="Mixta">Mixta</option>
                        <option value="Nocturna">Nocturna</option> 
                        </select>
                    </div>
                
                
                    <div class="col lg-4 mb-4">
                        <label for="career_id">Carrera</label>
                        <select name="career_id" id="career_id"
                        class="form-control" required>
                        <option value="">Seleccionar</option>
                    </select>    
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="initial_date">Fecha inicial</label>
                        <input type="date" class="form-control"
                        id="initial_date" name="initial_date" required>    
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="final_date">Fecha final</label>
                        <input type="date" class="form-control"
                        id="final_date" name="final_date" required>    
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="status">Estado</label>
                        <input type="text" class="form-control"
                        id="status" name="status" required>    
                    </div>
                </div>
               
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button class="btn btn-primary btn-block" type="submit">
                            Guardar
                        </button>                        
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('course.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a> 
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir actividades a la Actividad primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection