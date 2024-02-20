@extends('templates.base')
@section('title', 'Listado de programción de ambientes')
@section('headers', 'Listado de programción de ambientes')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('scheduling_environment.create') }}" class="btn btn-primary">Crear actividad</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id Curso</th>
                        <th>Documento instructor</th>
                        <th>Fecha de ambiente</th>
                        <th>Hora inicial</th>
                        <th>Hora final</th>
                        <th>Id medio ambiente</th>
                        
                        <th></th>
                    </tr>
                       
                </thead>
                <tbody>
                    @foreach ($schedulings_environments as $scheduling_environment)
                    <tr>
                        <td>{{ $instructor['id'] }}</td>
                        <td>{{ $instructor['course_id'] }}</td>
                        <td>{{ $instructor['instructor_document'] }}</td>
                        <td>{{ $instructor['date_scheduling'] }}</td>
                        <td>{{ $instructor['initial_hour'] }}</td>
                        <td>{{ $instructor['final_hour'] }}</td>
                        <td>{{ $instructor['environment_id'] }}</td>
                        <td>
                            <a href="{{ route('scheduling_environment.edit', $scheduling_environment['id']) }}" title="Editar" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('scheduling_environment.destroy', $scheduling_environment['id']) }}" title="Eliminar" 
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