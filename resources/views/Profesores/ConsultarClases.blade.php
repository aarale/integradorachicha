<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.Molde')

@section('title', 'Lista de Clases')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Lista de Clases</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Clases</th>
                <th>Profesor</th>
                <th>Capacidad</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->teacher->person->first_name ?? 'N/A' }} {{ $class->teacher->person->last_name ?? '' }}</td>
                <td>{{ $class->capacity }}</td>
                <td>{{ $class->schedule_day }}</td>
                <td>{{ $class->schedule_start }}</td>
                <td>{{ $class->schedule_end }}</td>
                <td>{{ $class->status }}</td>
                <td>
  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" onclick="loadClassData({{ $class }})">Editar</button>

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
                        <label for="teacher_id" class="form-label">Profesor</label>
                        <select name="teacher_id" id="teacher_id" class="form-control" required>
                            <option value="">Seleccione un profesor</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">
                                    {{ $teacher->person->first_name }} {{ $teacher->person->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                        <div class="mb-3">
                            <label for="edit_capacity" class="form-label">Capacidad de la Clase</label>
                            <input type="number" name="capacity" id="edit_capacity" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_schedule_day" class="form-label">Día de la Clase</label>
                            <input type="text" name="schedule_day" id="edit_schedule_day" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_schedule_start" class="form-label">Hora de Inicio</label>
                            <input type="time" name="schedule_start" id="edit_schedule_start" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_schedule_end" class="form-label">Hora de Fin</label>
                            <input type="time" name="schedule_end" id="edit_schedule_end" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit_status" class="form-label">Estado de la Clase</label>
                            <select name="status" id="edit_status" class="form-control" required>
                                <option value="Active">Activa</option>
                                <option value="Inactive">Inactiva</option>
                            </select>
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
        document.getElementById('edit_teacher_id').value = classData.teacher_id;
        document.getElementById('edit_capacity').value = classData.capacity;
        document.getElementById('edit_schedule_day').value = classData.schedule_day;
        document.getElementById('edit_schedule_start').value = classData.schedule_start;
        document.getElementById('edit_schedule_end').value = classData.schedule_end;
        document.getElementById('edit_status').value = classData.status;

        document.getElementById('editClassForm').action = `/actualizar/clase/${classData.id}`;
    }
</script>
@endsection


</body>
</html>