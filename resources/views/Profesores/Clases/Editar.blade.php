<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Clases</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.MoldeAdmin')

@section('title', 'Lista de Clases')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Lista de Clases</h2>

    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModal">Agregar Clase</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Clase</th>
                <th>Horario</th>
                <th>Periodo</th>
                <th>Estudiantes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacher_classes as $class)
            <tr>
                <td>{{ $class->class_name }}</td>
                <td>{{ $class->schedule }}</td>
                <td>{{ $class->period }}</td>
                <td>{{ $class->student_count }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" onclick="loadClassData({{ json_encode($class) }})">Editar</button>
                    <form action="{{ route('profesor.actualizar', $teacherId, $class->id) }}" method="PUT" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de la información capturada?');">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal de Agregar Clase -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Agregar Clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addClassForm" method="POST" action="{{ route('clases.') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="add_name" class="form-label">Nombre de la Clase</label>
                            <input type="text" name="class_name" id="add_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="add_schedule" class="form-label">Horario</label>
                            <input type="text" name="schedule" id="add_schedule" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="add_period" class="form-label">Período</label>
                            <input type="text" name="period" id="add_period" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Agregar Clase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden ="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editClassForm" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Nombre de la Clase</label>
                            <input type="text" name="class_name" id="edit_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_schedule" class="form-label">Horario</label>
                            <input type="text" name="schedule" id="edit_schedule" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_period" class="form-label">Período</label>
                            <input type="text" name="period" id="edit_period" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Actualizar Clase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para cargar los datos de la clase en el modal -->
<script>
    function loadClassData(classData) {
        document.getElementById('edit_name').value = classData.class_name;
        document.getElementById('edit_schedule').value = classData.schedule;
        document.getElementById('edit_period').value = classData.period;

        document.getElementById('editClassForm').action = `/actualizar/clase/${classData.id}`;
    }
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

</body>
</html>