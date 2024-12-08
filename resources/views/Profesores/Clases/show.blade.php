@extends('layouts.MoldeAdmin')

@section('title', 'Participantes de la Clase')

@section('content')
<h1>Participantes: {{ $class->name }}</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Estudiante</th>
            <th>Progreso</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($participants as $participant)
        <tr>
            <td>{{ $participant->person->first_name }} {{ $participant->person->last_name }}</td>
            <td>{{ $participant->progress }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
