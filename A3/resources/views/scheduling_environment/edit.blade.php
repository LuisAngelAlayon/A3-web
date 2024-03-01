@extends('templates.base')

@section('title', 'Editar programación del ambiente')
@section('header', 'Editar programación del ambiente')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('scheduling_environment.update', $scheduling_environment['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">    
                        <label for="course_id">Curso</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            <option value="">Seleccionar</option>
                        @foreach($courses as $course)
                            <option value="{{ $course['course_id'] }}"
                            @if(old('course_id') == $course['id']) selected @endif>
                            {{ $course['name'] }}</option>
                         @endforeach
                        </select>  
                    </div>
                    <div class="col-lg-4 mb-4">    
                        <label for="instructor_document">Documento Instructor</label>
                        <select name="instructor_document" id="instructor_document" class="form-control" required
                        value="{{ $scheduling_environment['document_instructor'] }}">
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="date_scheduling">Fecha de programación</label>
                        <input type="date" class="form-control" id="date_scheduling" name="date_scheduling" required value="{{ $scheduling_environment['date_scheduling'] }}">    
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="initial_hour">Hora inicial</label>
                        <input type="time" class="form-control" id="initial_hour" name="initial_hour" required 
                        value="{{ $scheduling_environment['initial_hour'] }}">    
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="final_hour">Hora final</label>
                        <input type="time" class="form-control" id="final_hour" name="final_hour" required 
                        value="{{ $scheduling_environment['final_hour'] }}">    
                    </div>
                    <div class="col-lg-4 mb-4">    
                        <label for="environment_id">Ambiente de aprendizaje</label>
                        <select name="environment_id" id="environment_id" class="form-control" required>
                            <option value="">Seleccionar</option>
                            @foreach($learning_environments as $learning_environment)
                                <option value="{{ $learning_environment['environment_id'] }}"
                                @if(old('environment_id') == $course['id']) selected @endif>
                                {{ $course['name'] }}</option>
                             @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('scheduling_environment.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir actividades a la Actividad primero debe crearlas y luego dar click en la acción editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
