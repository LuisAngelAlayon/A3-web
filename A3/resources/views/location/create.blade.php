@extends('templates.base')

@section('title', 'Crear Locación')
@section('headers', 'Crear Locación')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="" method="POST">
                @csrf
                
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"
                        id="name" name="name" required>    
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control"
                        id="address" name="address" required>    
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="status">Estado</label>
                        <select name="shift" id="shift"
                        class="form-control" required>
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                        </select>  
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Guardar
                        </button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('location.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir Ubicaciones la Ubicación primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection