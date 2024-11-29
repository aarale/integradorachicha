@extends('layouts.MoldeTeachers')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">{{ $student->person->first_name }} {{ $student->person->last_name }}</h1>
            </div>
            <div class="card-body">
                <p><strong>Correo:</strong> {{ $student->custom_users->email }}</p>
                <p><strong>Dirección:</strong> {{ $student->person->address }}</p>
                <p><strong>Teléfono:</strong> {{ $student->person->phone }}</p>
                @if($student->role)
                    <p><strong>Rol:</strong> {{ $student->role->name }}</p>
                @endif
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('Profesores.Clases.index') }}" class="btn btn-secondary btn-lg">Regresar a mis clases</a>
            </div>
        </div>
    </div>
@endsection