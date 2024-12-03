@extends('layouts.MoldeAlumnos')

@section('content')
<div class="container">
    <h1 class="mb-4">Progreso del Alumno</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Información del Alumno</h5>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $studentName }}</p>
            <p><strong>Cinta Actual:</strong> {{ $currentBelt }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Exámenes Realizados</h5>
        </div>
        <div class="card-body">
            @if(count($exams) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Examen</th>
                            <th>Cinta Obtenida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exams as $exam)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($exam['date'])->format('d/m/Y') }}</td>
                                <td>{{ $exam['name'] }}</td>
                                <td>{{ $exam['belt'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No se han realizado exámenes.</p>
            @endif
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Historial de Cintas</h5>
        </div>
        <div class="card-body">
            @if(count($belts) > 0)
                <ul class="list-group">
                    @foreach ($belts as $belt)
                        <li class="list-group-item">{{ $belt->belt_name }} - {{ \Carbon\Carbon::parse($belt->date)->format('d/m/Y') }}</li>
                    @endforeach
                </ul>
            @else
                <p>No hay historial de cintas registrado.</p>
            @endif
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Torneos y Exhibiciones</h5>
        </div>
        <div class="card-body">
            @if(count($events) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Evento</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($event['date'])->format('d/m/Y') }}</td>
                                <td>{{ $event['name'] }}</td>
                                <td>{{ $event['result'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay torneos o exhibiciones registrados.</p>
            @endif
        </div>
    </div>
</div>
@endsection