@extends('templates.base_reports')
@section('header', 'Reporte de programación de ambientes por instructor')
@section('content')
     <section id="results">
        @if ($scheduling_enviroments)
        <p><strong>Fecha inicial: </strong>{{ $initial_date }}</p>
        <p><strong>Fecha final: </strong>{{ $final_date }}</p>
        <hr>
        <h3>Programación de ambientes por instructor</h3>
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Curso</th>
                        <th>Instructor</th>
                        <th>Fecha</th>
                        <th>Hora inicial</th>
                        <th>Hora final</th>
                        <th>Ambiente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scheduling_enviroments as $scheduling_enviroment)
                        <tr>
                            <td>{{ $scheduling_enviroment['id'] }}</</td>
                            <td>{{ $scheduling_enviroment->course->code}}</td>
                            <td>{{ $scheduling_enviroment->instructor->fullname}}</td>
                            <td>{{ $scheduling_enviroment['date_scheduling'] }}</td>
                            <td>{{ $scheduling_enviroment['initial_hour'] }}</td>
                            <td>{{ $scheduling_enviroment['final_hour'] }}</td>
                            <td>{{ $scheduling_enviroment->learning_enviroment->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h5>No existen ambientes programados para este instructor en ese rango de fechas</h5>
        @endif
     </section>
@endsection
