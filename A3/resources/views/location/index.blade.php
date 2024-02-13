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
                    <tr>
                        <td>4</td>
                        <td>Sena Tuluá</td>
                        <td>Cra 25 # 21-35</td>
                        <td>ACTIVO</td>
                        
                        <td>                      
                            <a href="#" title="editar" 
                                class="btn btn-info btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="#" title="eliminar" 
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