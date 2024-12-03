@extends('layouts.MoldeAlumnos')

@section('content')
    <h2 class="mb-4">Estado de Préstamos</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Referencia</th>
                <th scope="col">Nombre del Producto</th>
                <th scope="col">Estado del Préstamo</th>
                <th scope="col">Fecha de Préstamo</th>
                <th scope="col">Fecha de Devolución</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->material_reference }}</td>
                    <td>{{ $loan->material_name }}</td>
                    <td>{{ $loan->loan_status }}</td>
                    <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                    <td>{{ $loan->return_date ? \Carbon\Carbon::parse($loan->return_date)->format('d/m/Y') : 'No devuelto' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection