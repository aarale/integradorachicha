@extends('layouts.MoldeTeachers')

@section('title', 'Asistencia')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Asistencias de las Clases</h1>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Clase 5-6
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Estudiante</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->student->name }}</td>
                                    <td>
                                        <input type="checkbox" 
                                               class="form-check-input" 
                                               {{ $attendance->attendance_status ? 'checked' : '' }} 
                                               disabled>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
