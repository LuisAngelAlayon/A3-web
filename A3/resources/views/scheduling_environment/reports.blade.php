@extends('templates.base')
@section('title', 'Reportes')
@section('header', 'Reportes')
@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte de programación de ambientes por ficha
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.scheduling_environments_course') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                                <div class="col-lg-2">
                                    <label for="course_id">Ficha</label>
                                </div>
                            <div class="col-lg-5">
                                <select name="course_id" id="course_id" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course['id'] }}">
                                            {{ $course['code'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="inital_date">Fecha inicial</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" name="initial_date" id="initial_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="final_date">Fecha final</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" name="final_date" id="final_date" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-block col-lg-3 mb-4">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte de programación de ambientes por instructor
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.scheduling_environments_instructor') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                                <div class="col-lg-2">
                                    <label for="instructor_id">Instructor</label>
                                </div>
                            <div class="col-lg-5">
                                <select name="instructor_id" id="instructor_id" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor['id'] }}">
                                            {{ $instructor['fullname'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="inital_date">Fecha inicial</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" name="initial_date" id="initial_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="final_date">Fecha final</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" name="final_date" id="final_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12">
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
