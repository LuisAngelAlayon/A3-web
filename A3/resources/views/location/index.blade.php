@extends('templates.base')
@section('title', 'Listado de Locaciones')
@section('headers', 'Listado de Locaciones')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('location.create') }}" class="btn btn-primary">Crear actividad</a>
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
                        <th>Dirección</th>
                        <th>Estado</th>
                    
                        
                    </tr>
                       
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>{{ $instructor['id'] }}</td>
                        <td>{{ $instructor['name'] }}</td>
                        <td>{{ $instructor['address'] }}</td>
                        <td>{{ $instructor['status'] }}</td>
                        
                        <td>                      
                            <a href="{{ route('location.edit', $location['id']) }}" title="editar" 
                                class="btn btn-info btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{ route('location.destroy', $location['id']) }}" title="eliminar" 
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