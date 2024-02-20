@extends('templates.base')
@section('title', 'Listado de ambientes de aprendizaje')
@section('headers', 'Listado de ambientes de aprendizaje')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('learning_environment.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Area en mt2</th>
                        <th>Piso</th>
                        <th>Inventario</th>
                        <th>Tipo</th>
                        <th>Locación</th>
                        <th>Estado</th>
                    </tr>
                       
                </thead>
                <tbody>
                    @foreach ($learning_environments as $learning_environment)
                    <tr>
                        <td>{{ $instructor['id'] }}</td>
                        <td>{{ $instructor['name'] }}</td>
                        <td>{{ $instructor['capacity'] }}</td>
                        <td>{{ $instructor['area_mt2'] }}</td>
                        <td>{{ $instructor['floor'] }}</td>
                        <td>{{ $instructor['inventory'] }}</td>
                        <td>{{ $instructor['type_id'] }}</td>
                        <td>{{ $instructor['location_id'] }}</td>
                        <td>{{ $instructor['status'] }}</td>

                        <td>
                            <a href="{{ route('learning_environment.edit', $learning_environment['id']) }}" title="editar" 
                                class="btn btn-info btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{ route('learning_environment.destroy', $learning_environment['id']) }}" title="eliminar" 
                                class="btn btn-danger btn-circle btn-sm"
                                onclick="return remove()">
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
