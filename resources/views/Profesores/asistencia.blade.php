@extends('layouts.MoldeTeachers')

@section('title', 'Asistencia')

@section('content')
<style>
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .form-check-input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #000;
        border-radius: 3px;
        position: relative;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: black;
        border-color: black;
    }

    .form-check-input:not(:checked) {
        background-color: white;
        border-color: #000;
    }
</style>

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
                                <th>Fecha</th>
                                <th>Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->first_name }} {{ $attendance->last_name }}</td>
                                    <td>{{ $attendance->attendance ? 'Presente' : 'Ausente' }}</td>
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
