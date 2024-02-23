@extends('templates.base')

@section('title', 'Editar instructor')
@section('header', 'Editar instructor')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('instructor.update', $instructor['document']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="document">Documento</label>
                        <input type="number" class="form-control"
                        id="document" name="document" required
                        value="{{ $instructor['document'] }}">    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="fullname">Nombre Completo</label>
                        <input type="text" class="form-control"
                        id="fullname" name="fullname" required
                        value="{{ $instructor['fullname'] }}"> 
                    </div>  
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="sena_email">Correo Sena</label>
                        <input type="email" class="form-control"
                        id="sena_email" name="sena_email" required
                        value="{{ $instructor['sena_email'] }}">    
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="personal_email">Correo personal</label>
                        <input type="email" class="form-control"
                        id="personal_email" name="personal_email" required
                        value="{{ $instructor['personal_email'] }}">  
                    </div>   
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="phone">Teléfono</label>
                        <input type="number" class="form-control"
                        id="phone" name="phone" required
                        value="{{ $instructor['phone'] }}">        
                    </div>  

                    <div class="col-lg-6 mb-4">
                        <label for="password">Contraseña</label>
                        <input type="text" class="form-control"
                        id="password" name="password" required
                        value="{{ $instructor['password'] }}">  
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="type">Tipo</label>
                        <select name="type" id="type"
                            class="form-control" required>
                            <option value="Seleccionar">Seleccionar</option>
                            <option value="Planta">Planta</option>
                            <option value="Contratista">Contratista</option
                            value="{{ $instructor['type'] }}">  
                        </select>
                    </div>  
                    <div class="col-lg-6 mb-4">
                        <label for="profile">Perfil</label>
                        <select type="text" class="form-control"
                        id="profile" name="profile" required
                        value="{{ $instructor['profile'] }}">
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
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
                        <a href="{{ route('instructor.index') }}" class="btn btn-secondary btn-block">
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
