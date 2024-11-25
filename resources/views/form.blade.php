<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Grupos y Exámenes - Academia de Taekwondo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center">Gestión de Grupos y Exámenes</h1>

    <!-- Sección para Crear Examen -->
    <div class="card my-4">
        <div class="card-header bg-primary text-white">
            <h2>Crear Nuevo Examen</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="grupoSeleccionado" class="form-label">Selecciona el nivel del grupo:</label>
                    <select id="grupoSeleccionado" class="form-select">
                        <option value="">-- Selecciona un nivel --</option>
                        <option value="principiante">10° kup</option>
                        <option value="principiante">9° kup</option>
                        <option value="iniciado">8° kup</option>
                        <option value="iniciado">7° kup</option>
                        <option value="intermedio">6° kup</option>
                        <option value="intermedio">5° kup</option>
                        <option value="avanzado">4° kup</option>
                        <option value="avanzado">3° kup</option>
                        <option value="profesional">2° kup</option>
                        <option value="profesional">1° kup</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numEstudiantes" class="form-label">Número de Estudiantes:</label>
                    <input type="number" id="numEstudiantes" class="form-control" max="30" placeholder="Máximo 30" value="1">
                </div>

                <div class="mb-3">
                    <label for="fechaExamen" class="form-label">Fecha:</label>
                    <input type="date" id="fechaExamen" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="descripcionExamen" class="form-label">Descripción:</label>
                    <textarea id="descripcionExamen" class="form-control" rows="4" placeholder="Descripción del examen"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Crear Examen</button>
            </form>
        </div>
    </div>

    <!-- Sección para Crear Grupo -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2>Crear Nuevo Grupo</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="cantidadEstudiantes" class="form-label">Cantidad de Estudiantes:</label>
                    <input type="number" id="cantidadEstudiantes" class="form-control" max="30" placeholder="Cantidad de estudiantes">
                </div>

                <div class="mb-3">
                    <label for="nombreGrupo" class="form-label">Nombre del Estudiante:</label>
                    <input type="text" id="nombreGrupo" class="form-control" placeholder="Nombre del estudiante">
                </div>

                <div class="mb-3">
                    <label for="nivelGrupo" class="form-label">Nivel:</label>
                    <select id="nivelGrupo" class="form-select">
                        <option value="">-- Selecciona un nivel --</option>
                        <option value="principiante">10° kup</option>
                        <option value="principiante">9° kup</option>
                        <option value="iniciado">8° kup</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-secondary">Crear Grupo</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
