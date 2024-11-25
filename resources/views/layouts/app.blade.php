<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('inicio') }}">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="clasesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clases
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clasesDropdown">
                            <li><a class="dropdown-item" href="{{ route('profesor.clases.index') }}">Mis Clases</a></li>
                            <li><a class="dropdown-item" >Horarios</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="asistenciaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Asistencia
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="asistenciaDropdown">
                            <li><a class="dropdown-item" >Tomar Asistencia</a></li>
                            <li><a class="dropdown-item" >Ver Historial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="estudiantesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estudiantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="estudiantesDropdown">
                            <li><a class="dropdown-item" >Lista de Estudiantes</a></li>
                            <li><a class="dropdown-item" >Progreso y Notas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="examenesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Exámenes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="examenesDropdown">
                            <li><a class="dropdown-item" href="{{ route('profesores.crearexamen') }}">Crear Examen</a></li>
                            <li><a class="dropdown-item" >Resultados</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="avisosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Avisos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="avisosDropdown">
                            <li><a class="dropdown-item" >Ver Avisos</a></li>
                            <li><a class="dropdown-item" >Crear Aviso</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="eventosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Eventos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="eventosDropdown">
                            <li><a class="dropdown-item" >Mis Eventos</a></li>
                            <li><a class="dropdown-item" >Calendario</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="mensajeriaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mensajería
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="mensajeriaDropdown">
                            <li><a class="dropdown-item" >Chat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="configuracionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Configuración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="configuracionDropdown">
                            <li><a class="dropdown-item" >Editar Perfil</a></li>
                            <li><a class="dropdown-item" >Preferencias</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
