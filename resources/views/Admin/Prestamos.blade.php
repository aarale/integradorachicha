@extends('layouts.MoldeAdmin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Gestión de Préstamos</h2>

    <div class="mb-4">
        <h4>Registrar Préstamo</h4>
        <form method="POST" action="{{ route('prestamos.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="userSelect" class="form-label">Seleccionar Usuario</label>
                    <select class="form-select" id="userSelect" name="user_id" required>
                        <option value="" disabled selected>Seleccione un usuario</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="materialSelect" class="form-label">Seleccionar Material</label>
                    <select class="form-select" id="materialSelect" name="material_id" required>
                        <option value="" disabled selected>Seleccione un material</option>
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }} ({{ $material->code }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="loanQuantity" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="loanQuantity" name="quantity" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="devolutionDate" class="form-label">Fecha de Devolución</label>
                    <input type="date" class="form-control" id="devolutionDate" name="devolution_date" required>
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
                <th>Fecha de Devolución</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Loans as $loan)
            <tr>
                <td>{{ $loan->user->name }}</td>
                <td>{{ $loan->material->name }}</td>
                <td>{{ $loan->quantity }}</td>
                <td>{{ $loan->transaction_date }}</td>
                <td>{{ $loan->devolution_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
