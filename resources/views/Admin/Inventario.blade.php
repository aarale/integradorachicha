@extends('layouts.MoldeAdmin') <!-- Asegúrate de que este archivo sea el layout que has proporcionado -->

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Gestión de Inventario</h2>

    <div class="mb-4">
        <h4>Agregar Material</h4>
        <form id="inventoryForm">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="materialCode" class="form-label">Código de Referencia</label>
                    <input type="text" class="form-control" id="materialCode" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="materialName" class="form-label">Nombre del Material</label>
                    <input type="text" class="form-control" id="materialName" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="materialStock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="materialStock" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Material</button>
        </form>
    </div>

    <h4>Lista de Materiales</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código de Referencia</th>
                <th>Nombre del Material</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody id="inventoryTableBody">
            <!-- Aquí se agregarán las filas de materiales -->
        </tbody>
    </table>
</div>

<script>
    document.getElementById('inventoryForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const materialCode = document.getElementById('materialCode').value;
        const materialName = document.getElementById('materialName').value;
        const materialStock = document.getElementById('materialStock').value;

        // Crear una nueva fila en la tabla
        const tableBody = document.getElementById('inventoryTableBody');
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>${materialCode}</td>
            <td>${materialName}</td>
            <td>${materialStock}</td>
        `;

        tableBody.appendChild(newRow);

        // Limpiar el formulario
        document.getElementById('inventoryForm').reset();
    });
</script>
@endsection