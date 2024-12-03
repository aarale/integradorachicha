@extends('layouts.MoldeTeachers')
@section('title', 'Crear nuevo Examen')
@section('content')

<div class="background-div">
    <div class="inner-container">
        <div class="card my-4">
            <div class="card-header text-black">
                <h2>Crear Nuevo Examen</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('examen.store') }}" method="POST">
                    @csrf
                    <!-- Nombre del Examen -->
                    <div class="mb-3">
                        <label for="grupoSeleccionado" class="form-label">Nombre del examen:</label>
                        <input type="text" name="name" id="examenNombre" class="form-control" placeholder="Ingresar el nombre del examen">
                    </div>

                <div class="mb-3">
                    <label for="horaInicio" class="form-label">Duracion del examen:</label>
                    <input type="number" name="duration"  id="horaInicio" class="form-control" placeholder="Ingresar la duración estimada del examen">
                </div>
                    <!-- Ubicación del Examen -->
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación del examen:</label>
                        <input type="text" name="location" id="ubicacion" class="form-control" placeholder="Ingresar la ubicación del examen">
                    </div>

                    <!-- Fecha y hora del Examen -->
                    <div class="mb-3">
                        <label for="fechaExamen" class="form-label">Fecha y hora del examen:</label>
                        <div class="input-group">
                            <input type="datetime-local" name="date" id="input-first-name" aria-label="First name" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="horaInicio" class="form-label">Duración del examen (en minutos):</label>
                        <input type="number" name="duration" id="horaInicio" class="form-control" placeholder="Ingresar la duración del examen">
                    </div>

                    <div class="mb-3">
                        <label for="descripcionExamen" class="form-label">Descripción del examen:</label>
                        <textarea name="description" id="descripcionExamen" class="form-control" rows="3" placeholder="Ingresar la descripción del examen"></textarea>
                    </div>

                    <h3>Seleccionar alumnos por clase:</h3>
                    @foreach ($groupedStudents as $classId => $studentsInClass)
                        <h4>Clase: {{ $studentsInClass[0]->schedule_day }} ({{ $studentsInClass[0]->schedule_start }} - {{ $studentsInClass[0]->schedule_end }})</h4>
                        @foreach ($studentsInClass as $student)
                            <div>
                                <input type="checkbox" name="students[]" value="{{ $student->student_id }}">
                                {{ $student->first_name }} {{ $student->last_name }} 
                            </div>
                        @endforeach
                    @endforeach
            
                    <button type="submit" class="btn btn-primary">Crear Examen</button>
                    <a href="{{ route('Profesores.ConsultaExamenes') }}" class="btn btn-secondary">Ver Examenes</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
