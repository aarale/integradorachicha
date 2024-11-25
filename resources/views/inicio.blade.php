<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jidokwan Julietas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        footer, .navbar {
            background-color: #072146;
            padding: 1rem 0;
        }
        .navbar-custom {
            background-color: #072146;
        }
        .img-logoNav {
            width: 90px;
            height: 90px;
            margin-left: 30px;
        }
        .personajesNav {
            width: 170px;
            height: 100px;
        }
        #contenedorBotom {
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-customAcc {
            background-color: #0E2A52;
            color: white;
            border: 2px solid #072146;
            padding: 2rem 2rem;
            border-radius: 10px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-customAcc:active {
            color: white;
            box-shadow: 0 0.2rem #dfd9d9;
            transform: translateY(0.2rem);
        }
        .btn-customAcc:hover:not(:disabled) {
            background: white;
            color: #072146;
            text-shadow: 0 0.1rem #bcb4b4;
        }
        .header-text {
            color: white;
            margin: 0 20px;
        }
        .footer-logo {
            width: 60px;
            height: 60px;
        }
        .footer-link {
            color: white;
        }
        .imgFace {
            width: 28px;
            height: 28px;
            margin-right: 5px;
        }
        .carousel-item {
            position: relative;
        }
        .carousel-caption {
            position: absolute;
            bottom: 20%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 1rem;
            border-radius: 10px;
        }

        #container-fluid{
            background-color: #072146;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <div class="row w-100">
                <div class="col-4 d-flex align-items-center">
                    <img src="{{ asset('images/JDKJulietasLogoBlanco.png') }}" alt="" class="img-logoNav">
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <img src="{{ asset('images/MonosBlanco.png') }}" alt="" class="personajesNav">
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center" id="contenedorBotom">
                    <a href="../login" class="btn-customAcc">Acceso</a>
                </div>
            </div>
        </div>
    </nav>


    <div id="container-fluid">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/pic1.jpg') }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Primera Imagen</h5>
                        <p>Descripción de la primera imagen.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/pic2.jpg') }}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Segunda Imagen</h5>
                        <p>Descripción de la segunda imagen.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/pic3.jpg') }}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tercera Imagen</h5>
                        <p>Descripción de la tercera imagen.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="card w-100 p-0 5">
            <div class="card-body">
                <h5 class="card-title">Encuéntranos aquí</h5>
            </div>
            <div class="ratio ratio-1x1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3601.169893513552!2d-103.4047761261058!3d25.499379877517608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdddface4550b%3A0xf7afbaebe9356650!2sTaekwondo%20Jidokwan%20Julietas!5e0!3m2!1ses-419!2smx!4v1729393877191!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>



    <footer class="text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 d-flex flex-column align-items-center justify-content-center footer-link">
                    <p>📞 8717976623</p>
                    <p>📍<a href="https://maps.app.goo.gl/DCgQmxAuw8RjsNTo6" class="footer-link">Querétaro 120, La Merced, 27296 Torreón, Coah.</a></p>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/JDKJulietasLogoBlanco.png') }}" alt="" class="footer-logo">
                </div>
                <div class="col-4 d-flex align-items-center justify-content-center footer-contact">
                    <p><img src="{{ asset('images/facebookIcon.png') }}" alt="" class="imgFace"> <a href="https://www.facebook.com/JidoKwanGymJulietas" class="footer-link">Jido Kwan Gym Julietas</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
