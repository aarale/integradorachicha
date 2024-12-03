@extends('layouts.MoldeAdmin') <!-- Asegúrate de que este archivo sea el layout que has proporcionado -->

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Gestión de Préstamos</h2>

    <div class="mb-4">
        <h4>Registrar Préstamo</h4>
        <form id="loanForm">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="userName" class="form-label">Nombre del Usuario</label>
                    <input type="text" class="form-control" id="userName" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="materialSelect" class="form-label">Seleccionar Material</label>
                    <select class="form-select" id="materialSelect" required>
                        <option value="" disabled selected>Seleccione un material</option>
                        <!-- Aquí se llenarán los materiales del inventario -->
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="loanQuantity" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="loanQuantity" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
        </form>
    </div>

    <h4>Registro de Préstamos</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre del Usuario</th>
                <th>Material</th>
                <th>Cantidad</th>
                <th>Fecha de Préstamo</th>
            </tr>
        </thead>
        <tbody id="loanTableBody">
            <!-- Aquí se agregarán las filas de préstamos -->
        </tbody>
    </table>
</div>

<script>
    // Simulación de materiales en inventario
    const materials = [
        { code: '001', name: 'Dobok' },
        { code: '002', name: 'Protector de Espinillas' },
        { code: '003', name: 'Guantes de Taekwondo' }
    ];

    // Llenar el select de materiales
    const materialSelect = document.getElementById('materialSelect');
    materials.forEach(material => {
        const option = document.createElement('option');
        option.value = material.code; // Puedes usar el código como valor
        option.textContent = `${material.name} (${material.code})`;
        materialSelect.appendChild(option);
    });

    document.getElementById('loanForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const userName = document.getElementById('userName').value;
        const materialCode = document.getElementById('materialSelect').value;
        const loanQuantity = document.getElementById('loanQuantity').value;
        const loanDate = new Date().toLocaleDateString(); // Fecha actual

        // Crear una nueva fila en la tabla de préstamos
        const tableBody = document.getElementById('loanTableBody');
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>${userName}</td>
            <td>${materialCode}</td>
            <td>${loanQuantity}</td>
            <td>${loanDate}</td>
        `;

        tableBody.appendChild(newRow);

        // Limpiar el formulario
        document.getElementById('loanForm').reset();
    });
</script>
@endsection