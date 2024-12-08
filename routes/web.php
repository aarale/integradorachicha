<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\AvisoController;

Route::get('/', function () {return view('inicio');})->name('inicio');

        // //Admin
        //     Route::get('/InicioAdmin', [AdminController::class, 'InicioAdmin'])->name('InicioAdmin');
        // Route::get('/admin/profesores/clases', [ClaseController::class, 'teacher_classes_byId'])->name('profesor.clases');
        // Route::get('/admin/profesores/clases/{teacherId}/editar', [ClaseController::class, 'edit'])->name('profesor.edit');
        // Route::put('admin/profesores/clases/{teacherId}/actualizar', [ClaseController::class, 'update'])->name('profesor.actualizar');

            
        // Route::get('/crear/clase', [ClaseController::class, 'create'])->name('admin.clases.create');
        // Route::get('alumnos/clase/{id}', [ClaseController::class, 'show'])->name('alumnos.clase');
        //     Route::get('/clasesa/{id}/edit', [ClaseController::class, 'edit'])->name('admin.clases.edit');
        //     Route::post('/clases', [ClaseController::class, 'store'])->name('admin.clases.store');
        //     Route::post('/avisosAdmin', [AvisoController::class, 'avisosAdmin'])->name('Admin.AvisosAdmin');
        //     Route::post('/users', [UserController::class, 'store'])->name('users.store');
        //     Route::post('/users', [UserController::class, 'store'])->name('users.store');
        //     Route::post('/users', [UserController::class, 'store'])->name('users.store');

        // Route::get('/login', [UserController::class, 'getlogin'])->name('login');
        // Route::post('/login', [UserController::class, 'authenticate'])->name('login.post');
        // Route::get('/admin/users', [UserController::class, 'create'])->name('admin.users.create');
        // Route::get('/payments/student/{id}', [AlumnoController::class, 'payments'])->name('studentpays');   
        // Route::get('/loans/student/{id}', [AlumnoController::class, 'loans'])->name('studentloans');
        // Route::get('/progress/student/{id}', [AlumnoController::class, 'progress'])->name('studentprogress');
        // Route::put('/clasesab/{id}', [ClaseController::class, 'update'])->name('admin.clases.update');



        // // Profesores
        // Route::get('/crear-examen', [ExamenController::class, 'create'])->name('Profesores.CrearExamen');   
        //     Route::get('/avisosp', [AvisoController::class, 'index'])->name('Profesor.ConsultarAvisos');
        //     Route::get('/clasesb/{id}', [ClaseController::class, 'index'])->name('classes.index');
        //     Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');
        // Route::get('/consulta/examenes', [ExamenController::class, 'consultarExamenes'])->name('Profesores.ConsultaExamenes');
        // Route::get('profesores/avisos', [AvisoController::class, 'avisosTeacher'])->name('Profesores.ConsultarAvisos');
        //     Route::get('/dashboard', [ProfesorController::class, 'index'])->name('profesor.dashboard');
        //     Route::get('/clasesc', [ClaseController::class, 'index'])->name('Profesores.Clases.index');
        // Route::get('profesores/asistencia', [AsistenciaController::class, 'mostrarAsistencia'])->name('profesor.asistencia');
        // Route::get('/tomarasistencia', [AsistenciaController::class, 'tomarAsistencia'])->name('tomarasistencia');

        //     Route::post('/asistenciatomada', [AsistenciaController::class, 'guardarAsistencia'])->name('asistenciatomada');
        //     Route::post('/consultar/asistencia', [AsistenciaController::class, 'store'])->name('asistencia.store');
        //     Route::post('/crear/examen', [ExamenController::class, 'store'])->name('examen.store');


        
        // //Alumnos
        //     Route::get('/progreso/{studentId}', [AlumnoController::class, 'progress'])->name('alumnos.progreso');
        // Route::get('/avisosal', [AlumnoController::class, 'avisos'])->name('alumnos.avisos');
        //     Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');
        //     Route::get('/clases/{id}', [ClaseController::class, 'index'])->name('classes.index');
        //     Route::get('/prueba', [AlumnoController::class, 'grades'])->name('prueba');
        Route::get('/login', [UserController::class, 'getlogin'])->name('login');
        Route::post('/login', [UserController::class, 'authenticate'])->name('login.post');

// Rutas para admin
Route::middleware(['role:admin'])->prefix('/admin')->group(function () {
    //Admin
    Route::get('/InicioAdmin', [AdminController::class, 'vistaprincipal'])->name('InicioAdmin');
    Route::get('/consultar/avisos', [AvisoController::class, 'avisos'])->name('admin.consultaravisos');   
    Route::get('/consultar/clases', [AdminController::class, 'classes'])->name('admin.consultarClases');
    Route::get('consultar/alumnos', [AlumnoController::class, 'show'])->name('admin.consultaralumnos');
    Route::get('/consultar/usuarios', [AdminController::class, 'consultusers'])->name('admin.consultarusuarios');
    Route::get('/consultar/inventario', [AdminController::class, 'inventario'])->name('admin.consultarinventario');

    Route::get('/admin/profesores/clases', [ClaseController::class, 'teacher_classes_byId'])->name('profesor.clases');
    Route::get('/admin/profesores/clases/{teacherId}/editar', [ClaseController::class, 'edit'])->name('profesor.edit');
    Route::put('admin/profesores/clases/{teacherId}/actualizar', [ClaseController::class, 'update'])->name('profesor.actualizar');

        
    Route::get('/crear/clase', [ClaseController::class, 'create'])->name('admin.clases.create');
    Route::get('alumnos/clase/{id}', [ClaseController::class, 'show'])->name('alumnos.clase');
        Route::get('/clasesa/{id}/edit', [ClaseController::class, 'edit'])->name('admin.clases.edit');
        Route::post('/clases', [ClaseController::class, 'store'])->name('admin.clases.store');
        Route::get('/avisosAdmin', [AvisoController::class, 'avisosAdmin'])->name('Admin.AvisosAdmin');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');


    
    Route::get('/admin/users', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/payments/student/{id}', [AlumnoController::class, 'payments'])->name('studentpays');   
    Route::get('/loans/student/{id}', [AlumnoController::class, 'loans'])->name('studentloans');
    Route::get('/progress/student/{id}', [AlumnoController::class, 'progress'])->name('studentprogress');
    Route::put('/clasesab/{id}', [ClaseController::class, 'update'])->name('admin.clases.update');
    // Profesores
    Route::get('/crear-examen', [ExamenController::class, 'create'])->name('Profesores.CrearExamen');   
        Route::get('/avisosp', [AvisoController::class, 'index'])->name('Profesor.ConsultarAvisos');
        Route::get('/clasesb/{id}', [ClaseController::class, 'index'])->name('classes.index');
        Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');
    Route::get('/consulta/examenes', [ExamenController::class, 'consultarExamenes'])->name('Profesores.ConsultaExamenes');
    Route::get('profesores/avisos', [AvisoController::class, 'avisosTeacher'])->name('Profesores.ConsultarAvisos');
        Route::get('/dashboard', [ProfesorController::class, 'index'])->name('profesor.dashboard');
        Route::get('/clasesc', [ClaseController::class, 'index'])->name('Profesores.Clases.index');
    Route::get('profesores/asistencia', [AsistenciaController::class, 'mostrarAsistencia'])->name('profesor.asistencia');
    Route::get('/tomarasistencia', [AsistenciaController::class, 'tomarAsistencia'])->name('tomarasistencia');

        Route::post('/asistenciatomada', [AsistenciaController::class, 'guardarAsistencia'])->name('asistenciatomada');
        Route::post('/consultar/asistencia', [AsistenciaController::class, 'store'])->name('asistencia.store');
        Route::post('/crear/examen', [ExamenController::class, 'store'])->name('examen.store');
    //Alumnos
        Route::get('/progreso/{studentId}', [AlumnoController::class, 'progress'])->name('alumnos.progreso');
    Route::get('/avisosal', [AlumnoController::class, 'avisos'])->name('alumnos.avisos');
        Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');
        Route::get('/clases/{id}', [ClaseController::class, 'index'])->name('classes.index');
        Route::get('/prueba', [AlumnoController::class, 'grades'])->name('prueba');
});





// Rutas para profesor
Route::middleware(['role:teacher'])->get('/profesores', [ProfesorController::class, 'vistaprincipal']); 
Route::prefix('profesores')->group(function () {
    Route::get('/Inicio', [ProfesorController::class, 'vistaprincipal'])->name('InicioProfesores');
});

// Rutas para alumno
Route::middleware(['role:student'])->get('/alumnos', [AlumnoController::class, 'alumno.avisos'])->name('alumno.avisos');
Route::prefix('alumnos')->group(function () {
});

