@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $student->person->first_name }} {{ $student->person->last_name }}</h1>
        <p><strong>Correo:</strong> {{ $student->email }}</p>
        <p><strong>Dirección:</strong> {{ $student->person->address }}</p>
        <p><strong>Teléfono:</strong> {{ $student->person->phone }}</p>
        @if($student->role)
        <p>Rol: {{ $student->role->name }}</p>
    @endif
        <a href="{{ route('profesor.clases.index') }}" class="btn btn-secondary">Regresar a mis clases</a>
    </div>
@endsection
