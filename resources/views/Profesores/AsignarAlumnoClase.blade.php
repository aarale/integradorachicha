@extends('layouts.Molde')
@section('title', 'Asignar alumno a clase')
@section('content')


<!-- Contenido Principal -->
  <div class="background-div">

<!-- Contenido Principal -->

    <div class="inner-container-fluid">
        <div class="card my-4" >
            <div class="card-header text-white " style='background-color: #143d7c'>
                <h2>Asignar alumno a clase</h2>

                <table class="table table-primary table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">Clase</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      <tr>
                        <th scope="row">1</th>
                        <td>Clase 1</td>
                        <td><p><a class="link-opacity-100" href="#">Agregar alumno</a></p></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Clase 2</td>
                        <td><p><a class="link-opacity-100" href="#">Agregar alumno</a></p></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Clase 3</td>
                        <td><p><a class="link-opacity-100" href="#">Agregar alumno</a></p></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

                <th>Seleccionar Clase</th>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Clase
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Clase 1</a></li>
                    <li><a class="dropdown-item" href="#">Clase 2</a></li>
                    <li><a class="dropdown-item" href="#">Clase 3</a></li>
                    </ul>
                </div>

                <th>Seleccionar Alumno</th>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Alumno
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Alumno 1</a></li>
                    <li><a class="dropdown-item" href="#">Alumno 2</a></li>
                    <li><a class="dropdown-item" href="#">Alumno 3</a></li>
                    </ul>
                </div>

            <div>
                <button class="mt-3" type="submit" class="btn btn-primary" style='background-color: #b20505'>Añadir</button>
            </div>

            </div>
        </div>
    </div>

@endsection
