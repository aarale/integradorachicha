@extends('layouts.MoldeTeachers')

@section('title', 'Mis Clases')

@section('content')
<h1 class="text-center mb-4">Mis Clases</h1>

<div class="accordion" id="accordionPanelsStayOpenExample">
    @forelse($classes as $index => $class)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapse{{ $index }}" 
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                        aria-controls="collapse{{ $index }}">
                    <!-- Fila de la tabla como encabezado del acordeón -->
                    <div class="table-responsive w-100">
                        <table class="table table-bordered w-100 mb-0">
                            <tbody>
                                <tr>
                                    <td>{{ $class->name }}</td>
                                    <td>{{ $class->schedule_day }}</td>
                                    <td>{{ $class->schedule_start }}</td>
                                    <td>{{ $class->schedule_end }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </button>
            </h2>

            <div id="collapse{{ $index }}" 
                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                 aria-labelledby="heading{{ $index }}" 
                 data-bs-parent="#accordionPanelsStayOpenExample">
                <div class="accordion-body">
                    <!-- Tabla de estudiantes dentro de la clase -->
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Alumno</th>
                                <th>Cinta</th>
                                <th>Edad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($class->students as $student)
                                <tr>
                                    <td>{{ $student->person->first_name }} {{ $student->person->last_name }}</td>
                                    <td>{{ $student->studentBelt ? $student->studentBelt->belt->name : 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($student->person->birth_date)->age }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No hay estudiantes en esta clase.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">No tienes clases asignadas.</p>
    @endforelse
</div>
@endsection
