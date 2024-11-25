<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jidokwan Julietas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos Generales */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        /* Estilos de Navbar y Footer */
        footer, .navbar {
            background-color: #072146;
            padding: 1rem 0;
        }

        .container-fluid {
            background-color: #072146;
        }

        .img-logoNav {
            width: 90px;
            height: 90px;
            margin-left: 30px;
        }

        .background-div {
            background-image: url('{{ asset('images/FondoUser.jpg') }}');
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .table {
           max-width: 80%;
           min-height: 80%;
           justify-content: end;
        }

        .inner-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
            width: auto;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        /* Estilos de Footer */
        .footer-logo {
            width: 60px;
            height: 60px;
        }

        .footer-link, .offcanvas-title, .offcanvas-body .nav-link, .offcanvas-body .dropdown-item {
            color: white;
        }

        .imgFace {
            width: 28px;
            height: 28px;
            margin-right: 5px;
        }

        .offcanvas {
            background-color: #4d5f82;
        }

        .navbar-toggler {
            background-color: #4d5c70;
            border: 1px solid #072146;
            padding: 5px 15px;
            border-radius: 10px;
            text-decoration: none;
            cursor: pointer;
        }

        .navbar-toggler:hover:not(:disabled) {
            background: white;
            color: #072146;
            text-shadow: 0 0.1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/JDKJulietasLogoBlanco.png') }}" alt="" class="img-logoNav"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: white">Menu</h5>
                    <button type="button" class="btn-close bg-danger" data-bs-dismiss="offcanvas" aria-label="Close" style="color: white"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" style="color: white">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white"> Mi Progreso  </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style='background-color: #143e7c00'>
                                <li><a class="dropdown-item" href="{{ route('alumno.cintas') }}" style="color:rgb(255, 252, 252)">Mis cintas/examenes</a></li>
                                <li><a class="dropdown-item" href="{{ route('alumno.eventos') }}" style="color:rgb(255, 255, 255)">Mis eventos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('alumno.avisos') }}" style="color: white">Mis Avisos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('alumno.grupos') }}" style="color: white">Mis Grupos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('alumno.finanzas') }}" style="color: white">Mis Finanzas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @yield('contents')

    <!-- Footer -->
    <footer class="text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 d-flex flex-column align-items-center justify-content-center footer-link">
                    <p>8717976623</p>
                    <p><a href="https://maps.app.goo.gl/DCgQmxAuw8RjsNTo6" class="footer-link">Querétaro 120, La Merced, 27296 Torreón, Coah.</a></p>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/JDKJulietasLogoBlanco.png') }}" alt="Footer Logo" class="footer-logo">
                </div>
                <div class="col-4 d-flex align-items-center justify-content-center footer-contact">
                    <p>
                        <img src="{{ asset('images/facebookIcon.png') }}" alt="Facebook Icon" class="imgFace"> 
                        <a href="https://www.facebook.com/JidoKwanGymJulietas" class="footer-link">Jido Kwan Gym Julietas</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>