@extends('layouts.MoldeAdmin')

@section('content')
    <div class="container">
        <h1>Gestión de Inventario</h1>

        <form action="{{ route('inventario.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nombre_material" class="form-label">Nombre del Material</label>
                <input type="text" class="form-control" id="nombre_material" name="name" required>
            </div>
            <div class="mb-3">
                <label for="nombre_material" class="form-label">Descripcion del Material</label>
                <input type="text" class="form-control" id="nombre_material" name="description" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="total_quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Material</button>
        </form>

        <h2>Lista de Materiales</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Código de Referencia</th>
                    <th>Nombre del Material</th>
                    <th>Descripcion del Material</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $material)
                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ $material->name }}</td>
                        <td>{{ $material->description }}</td>
                        <td>{{ $material->total_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
