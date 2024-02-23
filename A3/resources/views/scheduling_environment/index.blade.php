@extends('templates.base')

@section('title', 'Listado de programación de ambientes')
@section('headers', 'Listado de programación de ambientes')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('scheduling_environment.create') }}" class="btn btn-primary">Crear actividad</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Curso</th>
                        <th>Documento Instructor</th>
                        <th>Fecha de Ambiente</th>
                        <th>Hora Inicial</th>
                        <th>Hora Final</th>
                        <th>ID Medio Ambiente</th>
                        <th>Acciones</th>
                    </tr>   
                </thead>
                <tbody>
                    @foreach ($scheduling_environments as $scheduling_environment)
                        <tr>
                            <td>{{ $scheduling_environment->id }}</td>
                            <td>{{ $scheduling_environment->course_id }}</td>
                            <td>{{ $scheduling_environment->instructor_document }}</td>
                            <td>{{ $scheduling_environment->date_scheduling }}</td>
                            <td>{{ $scheduling_environment->initial_hour }}</td>
                            <td>{{ $scheduling_environment->final_hour }}</td>
                            <td>{{ $scheduling_environment->environment_id }}</td>
                            <td>
                                <a href="{{ route('scheduling_environment.edit', $scheduling_environment->id) }}" title="Editar" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('scheduling_environment.destroy', $scheduling_environment->id) }}" title="Eliminar" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
