@extends('templates.base')
@section('title', 'Listado de tipos de ambientes')
@section('headers', 'Listado de tipos de ambientes')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('environment_type.create') }}" class="btn btn-primary">Crear actividad</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                    
                    </tr>
                       
                </thead>
                <tbody>
                    @foreach ($environment_types as $environment_type)
                        <tr>
                            <td>{{ $environment_type['id'] }}</td>
                            <td>{{ $environment_type['description'] }}</td>
                          
                           
                            
                            <td>
                                <a href="{{ route('environment_type.edit', $environment_type['id']) }}" title="editar" 
                                    class="btn btn-info btn-circle btn-sm">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{ route('environment_type.destroy', $environment_type['id']) }}" title="eliminar" 
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
