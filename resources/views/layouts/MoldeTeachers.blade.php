<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JidoKwan Julietas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f4;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .main-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar-nav {
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ebebeb;
            border-right: 1px solid #e0e0e0;
            padding-top: 40px;
            width: 220px;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-nav .nav-link {
            color: #5f6368;
            font-weight: 500;
            padding: 15px 20px;
            transition: background-color 0.2s, color 0.2s, transform 0.2s;
        }

        .sidebar-nav .nav-link:hover, .sidebar-nav .nav-link.active {
            background-color: #faafaf;
            color: black;
            border-radius: 5px;
            transform: scale(1.1);
        }

        #img-logoNav {
            width: 170px;
            height: auto;
            margin-bottom: 70px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: 220px;
        }

        .header {
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            position: relative;
        }

        .profile-dropdown {
            position: absolute;
            top: 60px;
            right: 20px;
            width: 200px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1000;
        }

        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #888888;
            padding: 10px 0;
            border-top: 1px solid #e0e0e0;
            margin-top: 20px;
        }

        .navbar-toggler {
            border: none; /* Quitar bordes del toggler */
            background-color: transparent; /* Fondo transparente */
        }

        .navbar-toggler-icon {
            display: none; /* Ocultar las líneas del toggler */
        }

        #profileButton {
            border: none; /* Sin borde */
            background: transparent; /* Fondo transparente */
            box-shadow: none; /* Sin sombras */
            padding: 0; /* Ajusta el relleno */
        }

        @media (max-width: 768px) {
            .sidebar-nav {
                position: static;
                width: 100%;
                height: auto;
                margin-left: 0;
                padding: 10px;
            }
            .content {
                margin-left: 0;
            }
            .profile-dropdown {
                width: 100%;
                right: 0;
                left: 0;
                top: auto;
                bottom: 0;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light mobile-nav d-md-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/JDKJulietasLogoNegro.png') }}" alt="Logo" id="img-logoNavMobile"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="mobileSidebar">
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('Profesores.Clases.index')}}">Clases</a>
                <a class="nav-link" href="{{ route('Profesor.ConsultarAvisos') }}">Ver avisos</a>
                <a class="nav-link" href="{{ route('Profesores.asistencia')}}">Asistencias</a>
                <a class="nav-link" href="{{ route('Profesores.CrearExamen')}}">Exámenes</a>
            </nav>
        </div>
    </div>
</nav>

<div class="main-container">
    <div class="sidebar-nav d-none d-md-block">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/JDKJulietasLogoNegro.png') }}" alt="Logo" id="img-logoNav"></a>
        <nav class="nav flex-column">
        <a class="nav-link" href="{{ route('Profesor.ConsultarAvisos') }}">Ver avisos</a>
            <a class="nav-link" href="{{ route('Profesores.asistencia')}}">Asistencias</a>
            <a class="nav-link" href="{{ route('Profesores.CrearExamen') }}">Exámenes</a>
            <a class="nav-link" href="{{ route('Profesores.Clases.index') }}">Clases</a>
        </nav>
    </div>

    <div class="content container-fluid">
        <header class="header d-flex align-items-center">
            <h1 class="h5 mb-0"></h1>
            <button id="profileButton" class="ms-auto">
                <img src="https://via.placeholder.com/50" alt="Foto de perfil" class="rounded-circle mb-2">
            </button>
        </header>

        <div class="profile-dropdown" id="profileDropdown">
            <img src="https://via.placeholder.com/50" alt="Foto de perfil" class="rounded-circle mb-2">
            <p class="fw-bold mb-1">Usuario</p>
            <button class="btn btn-danger btn-sm w-100" {{ route('Profesores.Clases.index') }}>Cerrar sesión</button>
        </div>

        <section id="inicio" class="mt-4">
            @yield('content')
        </section>

        <footer class="footer">
            <p>&copy; 2024 Jidokwan Gym Julietas</p>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.getElementById('profileDropdown');
        const profileButton = document.getElementById('profileButton');

        profileButton.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function() {
            dropdown.style.display = 'none';
        });

        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>

</body>
</html>
