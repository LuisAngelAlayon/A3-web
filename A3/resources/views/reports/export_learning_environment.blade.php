@extends('templates.base_reports')
@section('header', 'Reporte General de ambientes de aprendizaje')
@section('content')
    <section id="results">
         @if ($learning_environments)
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Ambiente</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($learning_environments as $learning_environment)
                        <tr>
                            <td>{{ $learning_environment['name'] }}</td>
                            <td>{{ $learning_environment->environment_type->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h5>No Existen Generadores de ambiente</h5>
        @endif
    </section>
@endsection
