@extends('layouts.Molde')
@section('title', 'Users')
@section('content')
    <div class="inner-container">
        <div class="card my-4">
            <div class="card-header text-white" style="background-color: #143d7c;">
                <h2>Registra un nuevo usuario</h2>
            </div>
            <div class="card-body">
                <form id="userForm" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="input-name">Nombre y apellidos:</label>
                        <div class="input-group">
                            <input type="text" name="first_name" aria-label="First name" class="form-control" placeholder="Nombre">
                            <input type="text" name="last_name" aria-label="Last name" class="form-control" placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-age">Fecha de Nacimiento:</label>
                        <input type="date" name="birth_date" id="input-age" class="form-control bg-gray-700 text-gray-200 border-0 rounded-md p-2">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-address">Dirección:</label>
                        <input type="text" name="address" id="input-address" class="form-control" placeholder="Dirección">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-phone">Teléfono:</label>
                        <input type="text" name="phone" id="input-phone" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-username">Nombre de usuario:</label>
                        <input type="text" name="username" id="input-username" class="form-control" placeholder="Nombre de usuario">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-password">Contraseña:</label>
                        <input type="password" name="password" id="input-password" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-email">Correo electrónico:</label>
                        <input type="email" name="email" id="input-email" class="form-control" placeholder="Correo electrónico">
                    </div>
                    <div class="mb-3">
                        <label for="role_id">Rol</label>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ isset($user) && $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #b20505">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
