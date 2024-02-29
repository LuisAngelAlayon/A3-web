
@extends('templates.base')
@section('title', 'Listado de Reportes')
@section('header', 'Listado de Reportes')
@section('content')
    @include('templates.messages')
    
    
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte General de Actividades por Ambiente</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.learning_environments') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="learning_environments">Ambiente</label>
                            </div>
                            <div class="col-lg-5">
                                <select name="learning_environments" id="learning_environments"
                                class="form-control" required>
                                    <option value="">Seleccionar</option>
                                    @foreach ($learning_environments as $learning_environment)
                                        <option value="{{ $learning_environment->id }}">{{ $learning_environment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-primary btn-block col-lg-3 mb-4">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection  