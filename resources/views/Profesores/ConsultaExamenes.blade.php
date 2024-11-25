@extends('layouts.Molde')

@section('title', 'Exámenes')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 my-4">
            <div class="card shadow-lg border-light">
                <div class="card-header text-white text-center py-3" style="border-radius: 10px 10px 0 0; background-color: #143d7c;">
                    <h2 class="mb-0">Exámenes</h2>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Duración</th>
                                    <th>Hora de Inicio</th>
                                    <th>Hora de Fin</th>
                                    <th>Estado</th>
                                    <th>Alumnos</th>
                                    <th>Agregar Alumnos</th>
                                    <th>Generar Hoja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($exam->date)->format('Y-m-d') }}</td>
                                        <td>{{ $exam->name }}</td>
                                        <td>{{ $exam->description }}</td>
                                        <td>{{ $exam->duration }} hora(s)</td>
                                        <td>{{ \Carbon\Carbon::parse($exam->date)->format('h:i A') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($exam->date)->addHours($exam->duration)->format('h:i A') }}</td>
                                        <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                        <td><a href="#" class="text-decoration-none text-primary">Ver Alumnos</a></td>
                                        <td><a href="#" class="text-decoration-none text-success">Agregar Alumnos</a></td>
                                        <td><a href="#" class="text-decoration-none text-info">Generar Hoja</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('examen.store') }}" class="btn btn-lg btn-danger px-4 py-3" style="border-radius: 50px; font-size: 18px;">
                            <i class="fas fa-plus-circle me-2"></i>Crear Examen
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Añadir iconos de FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
    