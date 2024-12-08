@extends('layouts.MoldeAdmin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Usuarios</h1>

        <div class="form-group">
            <label for="roleSelect">Selecciona un rol:</label>
            <select class="form-control" id="roleSelect" onchange="showUsers(this.value)">
                <option value="">Selecciona un rol</option>
                <option value="admin">Admin</option>
                <option value="teacher">Maestros</option>
                <option value="student">Estudiantes</option>
            </select>
        </div>

        <div id="userCards" class="row mt-4">
            <!-- Los cards se llenarán aquí mediante JavaScript -->
        </div>
    </div>

    <script>
        const admins = @json($admins);
        const teachers = @json($teachers);
        const students = @json($students);

        function showUsers(role) {
            const userCards = document.getElementById('userCards');
            userCards.innerHTML = ''; // Limpiar tarjetas existentes

            let users = [];
            if (role === 'admin') {
                users = admins;
            } else if (role === 'teacher') {
                users = teachers;
            } else if (role === 'student') {
                users = students;
            }

            users.forEach(user => {
                const card = `
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">${user.first_name} ${user.last_name}</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-1"><strong>Correo:</strong> ${user.email}</p>
                                <p class="mb-1"><strong>Teléfono:</strong> ${user.phone}</p>
                                <p class="mb-1"><strong>Dirección:</strong> ${user.address}</p>
                                <p class="mb-1"><strong>Fecha de Nacimiento:</strong> ${user.birth_date}</p>
                            </div>
                        </div>
                    </div>
                `;
                userCards.innerHTML += card;
            });
        }
    </script>
@endsection