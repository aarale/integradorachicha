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

    function removeBlur() {
        document.body.classList.remove('blur-background');
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
