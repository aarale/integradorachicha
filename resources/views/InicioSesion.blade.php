<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.8);
            position: relative;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }
        .card:hover {
            box-shadow: 0px 10px 300px rgba(0, 0, 0, 0.2);
        }

        /* Aplicamos el blur al fondo de la página cuando se pasa el mouse sobre el card */
        body.blur-background {
            backdrop-filter: blur(10px);
            transition: backdrop-filter 0.3s ease;
        }

        .form-control {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #003c7a);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        
        body {
            background-image: url('images/fondoLog.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            transition: backdrop-filter 0.3s ease;
        }

        .container {
            z-index: 3;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4" style="width: 350px;" onmouseover="addBlur()" onmouseout="removeBlur()">
        <div class="text-center mb-4">
            <img src="{{ asset('images/JDKJulietasLogoBlanco.png') }}" alt="Logo" style="width: 100px;">
        </div>
        <h3 class="text-center mb-4">Inicio de Sesión</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                <label for="password" class="text-danger" style="font-size: 12px;">Minimo 8 caracteres</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>

<script>
    function addBlur() {
        document.body.classList.add('blur-background');
    }
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JDK Jidokwan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Protest+Revolution&display=swap');

        .navbar {
            background-color: #091d56;
        }

        .navbar-brand img {
            max-height: 50px;
            width: auto;
        }

        #inicio {
            position: relative;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)),
                        url('images/fondo.jpg') no-repeat center center / cover;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        #inicio::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 150px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(248, 249, 250, 1));
            pointer-events: none;
        }

        #bienvenidos {
            font-family: "Protest Revolution", sans-serif;
            font-size: 8vw; /* Adaptable según el ancho de pantalla */
        }

        #btn-53 {
            border: 1px solid;
            border-radius: 999px;
            padding: 1.2rem 3rem;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #000;
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        #btn-53 .original {
            background: #091d56;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            inset: 0;
            transition: transform 0.2s ease-in-out;
        }

        #btn-53:hover .original {
            transform: translateY(100%);
        }

        #btn-53 .letters span {
            opacity: 0;
            transform: translateY(-15px);
            transition: transform 0.2s ease-in-out, opacity 0.2s;
        }

        #btn-53:hover .letters span {
            opacity: 1;
            transform: translateY(0);
        }

        .carousel-inner {
            height: 100vh; /* Altura adaptable */
        }

        .carousel-item img,
        .carousel-item video {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        #conocenos {
            font-family: "Protest Revolution", sans-serif;
            font-size: 6vw; /* Adaptable según el ancho de pantalla */
            text-align: center;
        }

        .text-muted {
            font-size: 1.5rem;
            text-align: center;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: 0;
        }

        /* Media Queries para ajustes específicos */
        @media (max-width: 768px) {
            #bienvenidos {
                font-size: 12vw; /* Más grande en pantallas pequeñas */
            }

            #conocenos {
                font-size: 8vw;
            }

            .carousel-inner {
                height: 50vh;
            }
        }

        @media (max-width: 576px) {
            #btn-53 {
                padding: 0.8rem 2rem;
            }

            iframe {
                height: 300px;
            }
        }
        header img {
    max-width: 200px; /* Tamaño máximo de la imagen */
    height: auto; /* Mantener proporciones */
    margin-bottom: 20px; /* Separación entre imagen y texto */
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">JidoKwan Julietas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../login">Acceso</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header id="inicio">
    <!-- Logo arriba del texto -->
    <img src="images/JDKJulietasLogoBlanco.png" alt="Logo Jidokwan Julietas" class="pavo-izquierdo" style="max-width: 200px; margin-bottom: 100px;">
    <h1 id="bienvenidos">Bienvenidos</h1>
    <a href="#acerca" id="btn-53" role="button">
        <div class="original">CONÓCENOS</div>
        <div class="letters">
            <span>C</span><span>O</span><span>N</span><span>O</span><span>C</span><span>E</span><span>N</span><span>O</span><span>S</span>
        </div>
    </a>
</header>


    <!-- Services Section -->
    <section id="servicios" class="bg-light py-5">
        <div class="container">
            <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/fotoGrupal.jpeg" class="d-block w-100" alt="Foto grupal">
                    </div>
                    <div class="carousel-item">
                        <img src="images/DEFENSA.png" class="d-block w-100" alt="Foto grupal">
                    </div>
                    <div class="carousel-item">
                        <img src="images/combates.jpeg" class="d-block w-100" alt="Combates">
                    </div>
                    <div class="carousel-item">
                        <img src="images/DOCENTE.png" class="d-block w-100" alt="Combates">
                    </div>
                    <div class="carousel-item">
                        <img src="images/EXAMEN.jpeg" class="d-block w-100" alt="Combates">
                    </div>
                    <div class="carousel-item">
                        <img src="images/EXHIBICION.jpeg" class="d-block w-100" alt="Combates">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="acerca" class="bg-dark py-5 text-white">
        <div class="container">
            <h2 id="conocenos">Conócenos</h2>
            <p class="text-muted">Ofrecemos servicios de calidad para optimizar tu gestión.</p>
            <div class="row text-center">
                <div class="col-md-4">
                    <p>Con más de <strong>28 años</strong> formando campeones de vida.</p>
                </div>
                <div class="col-md-4">
                    <p>Nuestra academia está <strong>100% avalada</strong> por la FMTKD.</p>
                </div>
                <div class="col-md-4">
                    <p>Un espacio seguro donde tus hijos podrán desarrollarse y aprender este arte marcial.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Encuéntranos aquí</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3601.1698935135487!2d-103.40477612387419!3d25.499379877517715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdddface4550b%3A0xf7afbaebe9356650!2sTaekwondo%20Jidokwan%20Julietas!5e0!3m2!1ses-419!2smx!4v1732630168359!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p> JidoKwan Julietas.</p>
        <p class="mb-0">
         Jidokwan Julietas.
        <a href="https://www.facebook.com/jidokwan.gymjulietas" target="_blank" class="text-white ">
            Síguenos en Facebook
        </a>
        <img src="images/facebookIcon.png" alt="Facebook" width="30" height="30" style+='margin-left: 10px;'>
    </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    function removeBlur() {
        document.body.classList.remove('blur-background');
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
