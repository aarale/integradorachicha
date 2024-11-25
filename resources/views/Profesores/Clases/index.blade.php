@extends('layouts.app')

@section('title', 'Mis Clases')

@section('content')
<h1>Mis Clases</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Clase</th>
            <th>Capacidad</th>
            <th>Día</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Acciones

                
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($classes as $class)
        <tr>
            <td>{{ $class->name }}</td>
            <td>{{ $class->capacity }}</td>
            <td>{{ $class->schedule_day }}</td>
            <td>{{ $class->schedule_start }}</td>
            <td>{{ $class->schedule_end }}</td>
            <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentsModal{{ $class->id }}">
                    Ver Estudiantes
                </button>
            </td>
        </tr>
        <div class="modal fade" id="studentsModal{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="studentsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentsModalLabel">Estudiantes de la clase {{ $class->name }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            @foreach ($class->students as $student)
                                @if ($student->person)
                                    <li><a href="{{ route('alumno.show', $student->id) }}">{{ $student->person->first_name }} {{ $student->person->last_name }}</a></li>
                                @else
                                    <li>Estudiante sin información de persona</li>
                                @endif
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        @endforeach
    </tbody>


</table>

@endsection
