@extends('templates.base')

@section('title', 'Editar ambiente de aprendizaje')
@section('header', 'Editar ambiente de aprendizaje')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('learning_environment.update', $learning_environment['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-12 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"
                        id="name" name="name" required
                        value="{{ $learning_environment['name'] }}">      
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="capacity">Capacidad</label>
                        <input type="number" class="form-control"
                        id="capacity" name="capacity" required
                        value="{{ $learning_environment['capacity'] }}">    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="area_mt2">Area en mt2</label>
                        <input type="number" class="form-control"
                        id="area_mt2" name="area_mt2" required
                        value="{{ $learning_environment['area_mt2'] }}">    
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="floor">Piso</label>
                        <input type="number" class="form-control"
                        id="floor" name="floor" required
                        value="{{ $learning_environment['floor'] }}">    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="inventory">Inventario</label>
                        <input type="text" class="form-control"
                        id="inventory" name="inventory" required
                        value="{{ $learning_environment['inventory'] }}">    
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="type_id">Tipo</label>
                        <select name="type_id" id="type_id"
                            class="form-control" required
                            value="{{ $learning_environment['type_id'] }}">
                            <option value="">Seleccionar</option>
                        </select> 
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="location_id">Locacion</label>
                        <select name="location_id" id="location_id"
                            class="form-control" required
                            value="{{ $learning_environment['location_id'] }}">
                            <option value="">Seleccionar</option>
                            <option value="Sagrado Corazón">Sagrado Corazón</option>
                            <option value="Colegio Salesiano">Colegio Salesiano</option>
                            <option value="CLEM">CLEM</option>
                        </select>    
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button class="btn btn-primary btn-block" type="submit">
                            Guardar
                        </button>                        
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('learning_environment.index') }}" class="btn btn-secondary btn-block">
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