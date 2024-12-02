<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu cuenta ha sido registrada</title>
</head>
<body>
    <h1>Bienvenido a nuestra plataforma</h1>
    <p>Tu cuenta ha sido creada exitosamente.</p>
    <p><strong>Usuario:</strong> {{ $user->name }}</p>
    <p><strong>Contraseña:</strong> {{ $user->password }}</p>
    <p>Por favor, cambia tu contraseña tan pronto como inicies sesión por razones de seguridad.</p>
</body>
</html>
