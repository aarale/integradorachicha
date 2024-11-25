<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 50px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.7);
        }
        .input-container {
            position: relative;
            margin: 20px;
        }
        .input-field {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-bottom: 2px solid #ccc;
            outline: none;
            background-color: transparent;
        }
        .input-label {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 16px;
            color: rgba(204, 204, 204, 0);
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .input-highlight {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0;
            background-color: #007bff;
            transition: all 0.3s ease;
        }
        .input-field:focus + .input-label {
            top: -20px;
            font-size: 12px;
            color: #007bff;
        }
        .input-field:focus + .input-label + .input-highlight {
            width: 100%;
        }
        body {
            height: 130vh;
            background-image: url('images/fondoLog.png');
            background-size: cover;
            background-position: center;
        }
        .btn-primary{
            border-radius: 40px;
        }


    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4" style="width: 300px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/JDKJulietasLogoBlanco.png') }}" alt="Logo" style="width: 100px;">
        </div>
        <h3 class="text-center">Inicio de Sesión</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar sesión</button>
        </form>
        
            
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
