@extends('templates.base')
@section('title', 'Listado de curso')
@section('headers', 'Listado de curso')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('course.create') }}" class="btn btn-primary">Crear actividad</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Código</th>
                        <th>Jornada</th>
                        <th>Carrera</th>
                        <th>Fecha inicial</th>
                        <th>Fecha final</th>
                        <th>Estado</th>
                    </tr>
                       
                </thead>
                <tbody>
                    @foreach ($courses as $course)
            
                        <tr>
                            
                            <td>{{ $course['id']}}</td>
                            <td>{{ $course['code']}}</td>
                            <td>{{ $course['shift']}}</td>
                            <td>{{ $course['career_id']}}</td>
                            <td>{{ $course['initial_date']}}</td>
                            <td>{{ $course['final_date']}}</td>
                            <td>{{ $course['status']}}</td>
                            
                            <td>
                                <a href="{{ route('course.edit', $course['id']) }}" title="editar" 
                                    class="btn btn-info btn-circle btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('course.destroy', $course['id']) }}" title="eliminar" 
                                    class="btn btn-danger btn-circle btn-sm"
                                    onclick="return remove()">
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
