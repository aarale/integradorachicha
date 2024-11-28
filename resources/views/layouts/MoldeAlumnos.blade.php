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
            position: fixed; /* Sidebar fijo */
            top: 0;
            left: 0;
            background-color: #ebebeb;
            border-right: 1px solid #e0e0e0;
            padding-top: 40px;
            width: 220px;
            height: 100vh; /* Altura completa de la ventana */
            overflow-y: auto;
            z-index: 1000; /* Asegura prioridad sobre otros elementos */
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

        .sidebar-nav .navbar-brand {
            display: flex;
            justify-content: center;
        }

        #img-logoNav {
            width: 170px;
            height: auto;
            margin-bottom: 70px;
        }

        #img-logoNavMobile {
            width: 100px;
            height: auto;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: 220px; /* Separación del sidebar */
        }

        .header {
            background-color: #bad7e6;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        img {
            max-width: 100%;
            height: auto;
        }

        /* Ajustes responsivos */
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
            .mobile-nav .nav-link {
                padding: 10px 15px;
                font-size: 1rem;
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

<!-- Nav móvil para pantallas pequeñas -->
<nav class="navbar navbar-expand-md navbar-light mobile-nav d-md-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/JDKJulietasLogoNegro.png') }}" alt="Logo" id="img-logoNavMobile"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mobileSidebar">
            <nav class="nav flex-column">
                <a class="nav-link" href="#inicio">Avisos</a>
                <a class="nav-link" href="#importante">Usuarios</a>
                <a class="nav-link" href="#enviados">Finanzas</a>
                <a class="nav-link" href="#borradores">Exámenes</a>
                <a class="nav-link" href="#papelera">Clases</a>
                <a class="nav-link" href="#alumnos">Alumnos</a>
            </nav>
        </div>
    </div>
</nav>

<div class="main-container">
    <!-- Sidebar nav para pantallas grandes -->
    <div class="sidebar-nav d-none d-md-block">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/JDKJulietasLogoNegro.png') }}" alt="Logo" id="img-logoNav"></a>
        <nav class="nav flex-column">
            <a class="nav-link" href="#inicio">Avisos</a>
            <a class="nav-link" href="#importante">Usuarios</a>
            <a class="nav-link" href="#enviados">Finanzas</a>
            <a class="nav-link" href="#borradores">Exámenes</a>
            <a class="nav-link" href="#papelera">Clases</a>
            <a class="nav-link" href="#alumnos">Alumnos</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content container-fluid">
        <!-- Header -->
        <header class="header d-flex align-items-center">
            <h1 class="h5 mb-0">Avisos</h1>
            <button id="profileButton" class="btn btn-outline-secondary ms-auto" style="background-color: #f77070; color: #373737;">Perfil</button>
        </header>

        <!-- Profile Dropdown -->
        <div class="profile-dropdown" id="profileDropdown">
            <img src="https://via.placeholder.com/50" alt="Foto de perfil" class="rounded-circle mb-2">
            <p class="fw-bold mb-1">Usuario</p>
            <button class="btn btn-danger btn-sm w-100">Cerrar sesión</button>
        </div>

        <section id="inicio" class="mt-4">
            @yield('content')
        </section>

        <!-- Footer -->
        <footer class="footer mt-4">
            <p>&copy; 2024 Jidokwan Gym Julietas</p>
        </footer>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript para el dropdown del perfil -->
<script>
    document.getElementById('profileButton').addEventListener('click', function() {
        var dropdown = document.getElementById('profileDropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const header = document.querySelector('.header h1'); // Selección del encabezado
        const navLinks = document.querySelectorAll('.nav-link'); // Selección de enlaces de navegación

        // Escucha clics en los enlaces del menú
        navLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Evitar el comportamiento predeterminado del enlace

                // Actualizar el texto del encabezado
                header.textContent = this.textContent;

                // Eliminar la clase "active" de todos los enlaces y añadirla al seleccionado
                navLinks.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>

</body>
</html>
