@extends('templates.base')

@section('title', 'Crear tipo de ambientes')
@section('headers', 'Crear tipo de ambientes')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('environment_type.store') }}" method="POST">
                @csrf
                
                <div class="row form-group">
                    <div class="col-lg-12 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control"
                        id="description" name="description" required
                        value="{{ old('description') }}">>    
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Guardar
                        </button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('environment_type.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir Tipo de ambiente los Ambientes primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection