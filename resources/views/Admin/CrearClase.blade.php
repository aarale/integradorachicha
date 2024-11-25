
<div class="container">
    <h2 class="text-center my-4">Lista de Clases</h2>

    
    <h2 class="text-center my-4">Crear Nueva Clase</h2>
    <form action="{{ route('class.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="teacher_id" class="form-label">Profesor</label>
            <select name="teacher_id" id="teacher_id" class="form-control" required>
                <option value="">Seleccione un Profesor</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->person->first_name }} {{ $teacher->person->last_name }}</option>
                @endforeach
            </select>
        </div>
        

        
        <div class="mb-3">
            <label for="schedule_day" class="form-label">Día de la Clase</label>
            <input type="text" name="schedule_day" id="schedule_day" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="schedule_start" class="form-label">Hora de Inicio</label>
            <input type="time" name="schedule_start" id="schedule_start" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="schedule_end" class="form-label">Hora de Fin</label>
            <input type="time" name="schedule_end" id="schedule_end" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-danger w-100">Crear Clase</button>
    </form>
</div>

