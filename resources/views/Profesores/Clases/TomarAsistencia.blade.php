@extends('layouts.MoldeTeachers')

@section('title', 'Tomar Asistencia')

@section('content')

<style>
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<style>
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

    .form-check-input:checked::before {
        color: white;
        position: absolute;
        top: 0;
        left: 3px;
    }

    .form-check-input:not(:checked) {
        background-color: white;
        border-color: #000;
    }
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Tomar Asistencia</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('asistenciatomada') }}" method="POST">
        @csrf
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Asistencia <input type= "date">  
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Alumno</th>
                                    <th>Asistencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentsAttendance as $attendance)
                                    <tr>
                                        <td>{{ $attendance->first_name }} {{ $attendance->last_name }}</td>
                                        <td>
                                            <input type="checkbox" 
                                                   class="form-check-input" 
                                                   name="attendance[{{ $attendance->student_id }}]" 
                                                   {{ $attendance->attendance_status ? 'checked' : 'false' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection