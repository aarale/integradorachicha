@extends('layouts.MoldeAdmin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Estudiantes</h1>
        @if(count($students) > 0)
            <div class="row">
                @foreach($students as $student)
                    <div class="col-md-4 col-sm-6 mb-3"> <!-- Ajusta el tamaño de las columnas -->
                        <div class="card shadow-sm h-100"> <!-- Asegura que las tarjetas tengan la misma altura -->
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">{{ $student->student_first_name }} {{ $student->student_last_name }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-1"><strong>Fecha de Nacimiento:</strong> {{ $student->student_birth_date }}</p>
                                <p class="mb-1"><strong>Dirección:</strong> {{ $student->student_address }}</p>
                                <p class="mb-1"><strong>Teléfono:</strong> {{ $student->student_phone }}</p>
                                <p class="mb-1"><strong>Contacto de Emergencia:</strong> {{ $student->emergency_contact_first_name }} {{ $student->emergency_contact_last_name }}</p>
                                <p class="mb-1"><strong>Teléfono de Emergencia:</strong> {{ $student->emergency_contact_phone }}</p>
                                <p class="mb-1"><strong>Relación:</strong> {{ $student->emergency_contact_relationship }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No hay estudiantes registrados.
            </div>
        @endif
    </div>
@endsection