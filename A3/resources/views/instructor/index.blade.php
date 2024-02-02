@extends('templates.base')
@section('title', 'Listado de actividad')
@section('headers', 'Listado actividad')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('instructor.create') }}" class="btn btn-primary">Crear actividad</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Documento</th>
                        <th>Nombre completo</th>
                        <th>Correo Sena</th>
                        <th>Correo personal</th>
                        <th>Telefono</th>
                        <th>Contraseña</th>
                        <th>Perfil</th>
                    </tr>
                       
                </thead>
                <tbody>
                    <tr>
                        <td>6</td>
                        <td>29301321</td>
                        <td>Juan Perez Gonzalez</td>
                        <td>JuanP@Soy.sena.edu.co</td>
                        <td>JuanPerez@example.com</td>
                        <td>34691247654</td>
                        <td>JuanPerez123</td>
                        <td>instructor</td>
                        <td>CONTRATISTA O DE PLANTA</td>
                        <td>
                            <a href="{{ route('activity.create') }}" title="Editar" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" title="confirmar" class="btn btn-confirm btn-circle btn-sm" 
                            style="background-color: green; color: white">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" title="Eliminar" 
                                class="btn btn-danger btn-circle btn-sm" onclick="return remove()">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>        
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
  
@endsection
