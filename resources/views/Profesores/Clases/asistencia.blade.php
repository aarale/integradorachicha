<!-- resources/views/profesor/asistencia/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Asistencias de las clases</h1>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->student->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->attendace_status }}</td>
                    <td>{{ $attendance->comment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
