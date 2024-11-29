@extends('layouts.MoldeAdmin')
@section('title', 'Users')
@section('content')
    <div class="inner-container">
        <div class="card my-4">
            <div class="card-header text-white" style="background-color: #143d7c;">
                <h2>Registra un nuevo usuario</h2>
            </div>

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <fieldset>
                <legend>Información Personal</legend>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="role_id" class="form-label">Rol</label>
                    <select class="form-select" id="role_id" name="role_id" required>
                        <option value="" disabled {{ old('role_id') ? '' : 'selected' }}>Seleccione un rol</option>
                        <option value="1" {{ old('role_id') == 1 ? 'selected' : '' }}>Administrador</option>
                        <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>Docente</option>
                        <option value="3" {{ old('role_id') == 3 ? 'selected' : '' }}>Estudiante</option>
                    </select>
                </div>
                
            </fieldset>

            <fieldset id="emergency_contact" style="display:none;">
                <legend>Contacto de Emergencia</legend>
                <div class="mb-3">
                    <label for="emergency_contact_first_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="emergency_contact_first_name" name="emergency_contact_first_name" value="{{ old('emergency_contact_first_name') }}">
                </div>
                <div class="mb-3">
                    <label for="emergency_contact_last_name" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="emergency_contact_last_name" name="emergency_contact_last_name" value="{{ old('emergency_contact_last_name') }}">
                </div>
                <div class="mb-3">
                    <label for="emergency_contact_address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="emergency_contact_address" name="emergency_contact_address" value="{{ old('emergency_contact_address') }}">
                </div>
                <div class="mb-3">
                    <label for="emergency_contact_phone" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}">
                </div>
                <div class="mb-3">
                    <label for="emergency_contact_relationship" class="form-label">Relación</label>
                    <input type="text" class="form-control" id="emergency_contact_relationship" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship') }}">
                </div>
            </fieldset>

            <div id="teacher_fields" style="display:none;">
                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC (solo para docentes)</label>
                    <input type="text" class="form-control" id="rfc" name="rfc" value="{{ old('rfc') }}">
                </div>
            </div>

            <div id="student_fields" style="display:none;">
                <div class="mb-3">
                    <label for="belt_id" class="form-label">Cinturón (solo para estudiantes)</label>
                    <input type="number" class="form-control" id="belt_id" name="belt_id" value="{{ old('belt_id') }}">
                </div>
            </div>
            

            <button type="submit" class="btn btn-outline-primary">Enviar</button>
        </form>
    </div>

    <script>
        document.getElementById('role_id').addEventListener('change', function() {
    const emergencyContactFieldset = document.getElementById('emergency_contact');
    const teacherFields = document.getElementById('teacher_fields');
    const studentFields = document.getElementById('student_fields');

    emergencyContactFieldset.style.display = 'none';
    teacherFields.style.display = 'none';
    studentFields.style.display = 'none';

    if (this.value == '3') { 
        emergencyContactFieldset.style.display = 'block';
        studentFields.style.display = 'block';
    } else if (this.value == '2') { 
        teacherFields.style.display = 'block';
    }
});

    </script>
</body>
</html>

@endsection