<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoja de Evaluación</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4 py-8 max-w-4xl bg-white shadow-lg rounded-md">
        <!-- Header -->
        <header class="text-center mb-6">
            <h1 class="text-2xl font-bold text-red-700">Ji Do Kwan TaeKwonDo de Mexico A.C</h1>
            <p class="text-gray-600">Hoja de Evaluación para Promociones de Grados</p>
        </header>

        
        <section class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="student_name" class="block font-semibold">Nombre:</label>
<input type="text" id="student_name" name="student_name" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="{{ $student->person->first_name }}" readonly>                </div>
                <div>
                    <label for="current_grade" class="block font-semibold">Grado Actual:</label>
                    <input type="text" id="current_grade" name="current_grade" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="<?= $student['grado_actual']; ?>" readonly>
                </div>
                <div>
                    <label for="next_grade" class="block font-semibold">Grado a Pasar:</label>
                    <input type="text" id="next_grade" name="next_grade" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="<?= $next_grade; ?>" readonly>
                </div>
                <div>
                    <label for="age" class="block font-semibold">Edad:</label>
                    <input type="text" id="age" name="age" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="<?= $student['edad']; ?>" readonly>
                </div>
                <div>
                    <label for="birth_date" class="block font-semibold">Fecha de Nacimiento:</label>
                    <input type="text" id="birth_date" name="birth_date" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="<?= $student['fecha_nacimiento']; ?>" readonly>
                </div>
                <div>
                    <label for="doyang_name" class="block font-semibold">Nombre del Doyang:</label>
                    <input type="text" id="doyang_name" name="doyang_name" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="<?= $student['doyang']; ?>" readonly>
                </div>
                <div>
                    <label for="teacher_name" class="block font-semibold">Nombre del Profesor:</label>
                    <input type="text" id="teacher_name" name="teacher_name" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="<?= $teacher['nombre']; ?>" readonly>
                </div>
                <div>
                    <label for="evaluation_date" class="block font-semibold">Fecha:</label>
                    <input type="date" id="evaluation_date" name="evaluation_date" class="w-full mt-1 p-2 border border-gray-300 rounded-md" value="<?= $exam_date; ?>" readonly>
                </div>
            </div>
        </section>

        <section class="mb-8">
            <!-- Basicos -->
            <div class="mb-6">
                <h3 class="text-xl font-bold text-red-700 mb-4">Básicos</h3>
                <table class="w-full table-auto border border-gray-300 text-sm text-center">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2 border border-gray-300">Elemento</th>
                            <th class="p-2 border border-gray-300">Observaciones</th>
                            <th class="p-2 border border-gray-300">Calificaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 border border-gray-300">Golpes</td>
                            <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                            <select name="golpes_calificacion" class="w-full p-1 border border-gray-300 rounded-md">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </tr>
                        <tr>
                            <td class="p-2 border border-gray-300">Defensas</td>
                            <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                            <td class="p-2 border border-gray-300">B</td>
                        </tr>
                        <tr>
                            <td class="p-2 border border-gray-300">Posiciones</td>
                            <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                            <td class="p-2 border border-gray-300">B</td>
                        </tr>
                        <tr>
                            <td class="p-2 border border-gray-300">Patadas</td>
                            <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                            <td class="p-2 border border-gray-300">R</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Formas -->
            <div class="mb-6">
                <h3 class="text-xl font-bold text-red-700 mb-4">Formas</h3>
                <table class="w-full table-auto border border-gray-300 text-sm text-center">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2 border border-gray-300">Elemento</th>
                            <th class="p-2 border border-gray-300">Observaciones</th>
                            <th class="p-2 border border-gray-300">Calificaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 border border-gray-300">Formas</td>
                            <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                            <td class="p-2 border border-gray-300">E</td>
                        </tr>
                    </tbody>
                </table>
            </div>

                        <!-- Combate -->
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-red-700 mb-4">Combate</h3>
                            <table class="w-full table-auto border border-gray-300 text-sm text-center">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="p-2 border border-gray-300">Elemento</th>
                                        <th class="p-2 border border-gray-300">Observaciones</th>
                                        <th class="p-2 border border-gray-300">Calificaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-2 border border-gray-300">Combate a un paso</td>
                                        <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                                        <td class="p-2 border border-gray-300">E</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 border border-gray-300">Pateo Libre</td>
                                        <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                                        <td class="p-2 border border-gray-300">E</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 border border-gray-300">Pateo a Distancia</td>
                                        <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                                        <td class="p-2 border border-gray-300">B</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 border border-gray-300">Combate Libre</td>
                                        <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                                        <td class="p-2 border border-gray-300">R</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 border border-gray-300">Rompimiento</td>
                                        <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                                        <td class="p-2 border border-gray-300">R</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 border border-gray-300">Ki hap (grito, actitud)</td>
                                        <td class="p-2 border border-gray-300"><input type="text" class="w-full p-1 border border-gray-300 rounded-md"></td>
                                        <td class="p-2 border border-gray-300">B</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
            
                    <!-- Footer -->
                    <footer class="mt-8 text-center">
                        <p class="text-sm text-gray-600">Nota: Promedio Mínimo de Promoción (B)</p>
                        <div class="flex justify-center items-center space-x-6 mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600">
                                <span class="ml-2">Acredita</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-red-600">
                                <span class="ml-2">No Acredita</span>
                            </label>
                        </div>
                        <div class="mt-6 border-t border-gray-300 pt-4">
                            <p class="font-semibold">Firma del Sinodal</p>
                        </div>
                    </footer>
                </div>
            </body>
            </html>
            