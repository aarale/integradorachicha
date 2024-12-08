<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Clases</title>
</head>
<body>
@extends('layouts.MoldeAdmin')

@section('title', 'Lista de Clases')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Lista de Clases</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Clase</th>
                <th>Horario</th>
                <th>Periodo</th>
                <th>Estudiantes</th>
                <th></th>
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
                    <a href="{{ route('admin.consultarClases') }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" onclick="loadClassData({{ json_encode($class) }})">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal de Edición -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Clase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editClassForm" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Nombre de la Clase</label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_schedule" class="form-label">Horario</label>
                            <input type="text" name="schedule" id="edit_schedule" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_period" class="form-label">Período</label>
                            <input type="text" name="period" id="edit_period" class="form-control" readonly>
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
@endsection

</body>
</html>
