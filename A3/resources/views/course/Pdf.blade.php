@extends('templates.base_reports')

@section('header', 'Reporte General de Cursos')

@section('content')
    <section id="results">
        @if ($courses)
            
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course) 
                        <tr>
                            <td>{{ $course->code }}</td> 
                            <td>{{ $course->career->name }}</td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h5>No Existen Cursos</h5>
            @endif
    </section>
@endsection