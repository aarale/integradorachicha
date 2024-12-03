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


        Route::get('/clasesasistencia', [AsistenciaController::class, 'mostrarAsistencia'])->name('verasistencia');
        Route::get('/tomarasistencia', [AsistenciaController::class, 'tomarAsistencia'])->name('tomarasistencia');
        Route::post('/tomarasistencia', [AsistenciaController::class, 'guardarAsistencia'])->name('asistenciatomada');
        Route::get('/payments/student/{id}', [AlumnoController::class, 'payments'])->name('studentpays');   
        Route::get('/loans/student/{id}', [AlumnoController::class, 'loans'])->name('studentloans');
        Route::get('/progress/student/{id}', [AlumnoController::class, 'progress'])->name('studentprogress');
        Route::get('/consulta/examenes', [ExamenController::class, 'consultarExamenes'])->name('Profesores.ConsultaExamenes');


Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/prueba', [AlumnoController::class, 'grades'])->name('prueba');

Route::get('/login', [UserController::class, 'getlogin'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.post');
Route::get('/admin/users', function () { return view('Admin/UsersAdmin');});
Route::get('/admin/users', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/admin/users', function () { return view('Admin/UsersAdmin');});
Route::get('/admin/users', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');



Route::get('/admin/users', function () { return view('Admin/UsersAdmin');});
Route::get('/admin/users', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/clases', [ClaseController::class, 'index'])->name('admin.clases.index');


Route::post('/avisosAdmin', [AvisoController::class, 'avisosAdmin'])->name('Admin.AvisosAdmin');
Route::middleware('auth')->group(function () {
        Route::middleware(['role:admin'])->get('/admin', [AdminController::class, 'Admin.InicioAdmin']); 
        Route::get('/InicioAdmin', [AdminController::class, 'InicioAdmin'])->name('InicioAdmin');
        Route::get('/clases', [ClaseController::class, 'index'])->name('admin.clases.index');
        Route::get('/crear/clase', [ClaseController::class, 'create'])->name('admin.clases.create');
        Route::post('/clases', [ClaseController::class, 'store'])->name('admin.clases.store');
        Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('admin.clases.show');
        Route::get('/clases/{id}/edit', [ClaseController::class, 'edit'])->name('admin.clases.edit');
        Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('admin.clases.update');

        


    Route::middleware(['role:teacher'])->get('/profesores', [ProfesorController::class, 'vistaprincipal']); 
Route::prefix('profesores')->group(function () {
});

        Route::get('/dashboard', [ProfesorController::class, 'index'])->name('profesor.dashboard');
        Route::get('/clases', [ClaseController::class, 'index'])->name('Profesores.Clases.index');

       // Route::get('/crearexamen', [ProfesorController::class, 'crearExamen'])->name('Profesores.CrearExamen');
        
        Route::post('/crear/examen', [ExamenController::class, 'store'])->name('examen.store');
        // Route::get('/clases/asistencia', function () {return view('profesores.clases.asistencia'); 
        // })->name('profesor.clases.asistencia');
        Route::get('/asistencia', [AsistenciaController::class, 'index'])->name('Profesores.asistencia');
       // Route::get('/clases/asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index');
        Route::post('/clases/asistencia', [AsistenciaController::class, 'store'])->name('asistencia.store');
        Route::get('profesores/avisos', [AvisoController::class, 'avisosTeacher'])->name('Profesores.ConsultarAvisos');

        // Route::get('/avisos', [AvisoController::class, 'avisosTeacher'])->name('Profesores.ConsultarAvisos');

        Route::get('/clases/{id}', [ClaseController::class, 'index'])->name('classes.index');
        Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');



    // Rutas para alumno
    Route::middleware(['role:student'])->get('/alumnos', [AlumnoController::class, 'alumno.avisos']);
        Route::get('/progreso', [AlumnoController::class, 'progreso'])->name('alumnos.progreso');
        Route::get('/avisos', [AlumnoController::class, 'avisos'])->name('alumnos.avisos');
        Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');
    });

        Route::get('/consulta/examenes', [ExamenController::class, 'consultarExamenes'])->name('Profesores.ConsultaExamenes');

        Route::get('/crear-examen', [ExamenController::class, 'create'])->name('Profesores.CrearExamen');   
        Route::get('/crear-examen', [ExamenController::class, 'consult'])->name('Profesores.CrearExamen');
        Route::get('/profesor/avisos', [AvisoController::class, 'index'])->name('Profesor.ConsultarAvisos');
        Route::get('/clases/{id}', [ClaseController::class, 'index'])->name('classes.index');
        Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');



