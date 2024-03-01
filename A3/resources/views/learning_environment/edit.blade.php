@extends('templates.base')

@section('title', 'Crear ambiente de aprendizaje')
@section('headers', 'Crear ambiente de aprendizaje')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('learning_environment.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-12 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"
                        id="name" name="name" required>    
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="capacity">Capacidad</label>
                        <input type="number" class="form-control"
                        id="capacity" name="capacity" required
                        value="{{ old('capacity') }}">>    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="area_mt2">Area en mt2</label>
                        <input type="number" class="form-control"
                        id="area_mt2" name="area_mt2" required
                        value="{{ old('area_mt2') }}">    
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="floor">Piso</label>
                        <input type="number" class="form-control"
                        id="floor" name="floor" required
                        value="{{ old('floor') }}">    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="inventory">Inventario</label>
                        <input type="text" class="form-control"
                        id="inventory" name="inventory" required
                        value="{{ old('inventory') }}">    
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="type_id">Tipo</label>
                        <select name="type_id" id="type_id"
                            class="form-control" required>
                            <option value="">Seleccione</option>
                                @foreach($environments_types as $environment_type)
                                    <option value="{{ $environment_type['id'] }}">{{ $environment_type['description'] }} </option>
                                 @endforeach
                        </select> 
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="location_id">Locación</label>
                        <select name="location_id" id="location_id"
                            class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($locations_id as $location_id)
                                <option value="{{ $location['id'] }}">{{ $location['name'] }} </option>
                             @endforeach
                        </select>    
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
                        Para añadir Ambientes de aprendizaje los Ambientes primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection