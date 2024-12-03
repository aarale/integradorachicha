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
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\GuardarExamen;



Route::get('/examen', [GuardarExamen::class, 'showForm'])->name('examen.form');
Route::post('/guardar-examen', [GuardarExamen::class, 'storeExamen'])->name('guardar.examen');


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

Route::get('/Profesores/examen_form', function () { return view('Profesores/examen_form');});


Route::get('/admin/users', function () { return view('Admin/UsersAdmin');});
Route::get('/admin/users', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/admin/inventario', [InventarioController::class, 'index'])->name('admin.inventario');
Route::post('/inventario', [InventarioController::class, 'store'])->name('inventario.store');

Route::get('/admin/prestamos', [LoansController::class, 'index'])->name('prestamos.index');
Route::post('admin/prestamos', [LoansController::class, 'store'])->name('prestamos.store');

Route::get('/clases', [ClaseController::class, 'index'])->name('admin.clases.index');

Route::get('/profesores/clases', [ClaseController::class, 'index'])->name('Profesores.Clases.index');

       // Route::get('/crearexamen', [ProfesorController::class, 'crearExamen'])->name('Profesores.CrearExamen');
        
        Route::post('/crear/examen', [ExamenController::class, 'store'])->name('examen.store');
        // Route::get('/clases/asistencia', function () {return view('profesores.clases.asistencia'); 
        // })->name('profesor.clases.asistencia');
        Route::get('/asistencia', [AsistenciaController::class, 'index'])->name('Profesores.asistencia');
       // Route::get('/clases/asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index');
        Route::post('/clases/asistencia', [AsistenciaController::class, 'store'])->name('asistencia.store');
        Route::get('/consulta/examenes', [ExamenController::class, 'consultarExamenes'])->name('Profesores.ConsultaExamenes');

        Route::get('/crear-examen', [ExamenController::class, 'create'])->name('Profesores.CrearExamen');   
        Route::get('/crear-examen', [ExamenController::class, 'consult'])->name('Profesores.CrearExamen');
        Route::get('/profesor/avisos', [AvisoController::class, 'index'])->name('Profesor.ConsultarAvisos');
        Route::get('/clases/{id}', [ClaseController::class, 'index'])->name('classes.index');
        Route::get('/alumno/{id}', [AlumnoController::class, 'student'])->name('alumno.show');

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
   



/*
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/login', [UserController::class, 'getlogin'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.post');

Route::middleware('auth')->group(function () {
    
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/clasess', [ClaseController::class, 'index'])->name('admin.clases.index');
        Route::get('/crear/clase', [ClaseController::class, 'create'])->name('admin.clases.create');
        Route::post('/clases', [ClaseController::class, 'store'])->name('admin.clases.store');
        Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('admin.clases.show');
        Route::get('/clases/{id}/edit', [ClaseController::class, 'edit'])->name('admin.clases.edit');
        Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('admin.clases.update');
    });

    Route::middleware(['auth', RoleMiddleware::class])->prefix('profesores')->group(function () {
        Route::get('/clases', [ClaseController::class, 'index'])->name('profesor.clases.index');
        Route::get('/clases/horarios', [ClaseController::class, 'horarios'])->name('profesor.clases.horarios');
        Route::get('/crear/examen',[ProfesorController::class,'crearexamen'])->name('profesores.crearexamen');
        Route::post('/crear/examen', [ExamenController::class, 'store'])->name('examen.store');
        
    });
    Route::middleware(['role:teacher'])->get('/profesores/dashboard', [ProfesorController::class, 'index']);
        Route::get('/clases', [ClaseController::class, 'index'])->name('profesor.clases.index');
        Route::get('/profesores/crear/examen', [ProfesorController::class, 'crearExamen'])->name('profesores.crearexamen');
        Route::post('/crear/examen', [ExamenController::class, 'store'])->name('examen.store');
    });

    Route::prefix('alumnos')->middleware('role:student')->group(function () {
        Route::get('/progreso', [AlumnoController::class, 'progreso'])->name('alumnos.progreso');
        Route::get('/avisos', [AlumnoController::class, 'avisos'])->name('alumnos.avisos');
        Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');

    });




use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JidokwanController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\ProfesorController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\DashboardController;

Route::get('/',[ProfesorController::class,'vistaprincipal']);
Route::get('/login', [UserController::class, 'getlogin'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.post');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Clases
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/horarios', [ClaseController::class, 'horarios'])->name('clases.horarios');

    // Asistencia
    Route::get('/asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index');
    Route::get('/asistencia/historial', [AsistenciaController::class, 'historial'])->name('asistencia.historial');

    // Estudiantes
    Route::get('/estudiantes', [AlumnoController::class, 'index'])->name('estudiantes.lista');
    Route::get('/estudiantes/progreso', [AlumnoController::class, 'progreso'])->name('estudiantes.progreso');

    // Exámenes
    
    Route::get('/examenes/resultados', [ExamenController::class, 'resultados'])->name('examenes.resultados');

    // Avisos
    Route::get('/avisos', [AvisoController::class, 'ver'])->name('avisos.ver');
    Route::get('/avisos/crear', [AvisoController::class, 'crear'])->name('avisos.crear');

    // Eventos
    Route::get('/eventos', [EventoController::class, 'misEventos'])->name('eventos.mis');
    Route::get('/eventos/calendario', [EventoController::class, 'calendario'])->name('eventos.calendario');

    // Mensajería
    Route::get('/mensajeria', [MensajeController::class, 'chat'])->name('mensajeria.chat');

    // Configuración
    Route::get('/configuracion/perfil', [ConfiguracionController::class, 'perfil'])->name('configuracion.perfil');
    Route::get('/configuracion/preferencias', [ConfiguracionController::class, 'preferencias'])->name('configuracion.preferencias');
});
Route::prefix('profesores')->middleware('auth')->group(function () {
    Route::get('/clases', [ClaseController::class, 'index'])->name('profesor.clases.index');
    Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('profesor.clases.show');
    Route::get('/clases/{id}/edit', [ClaseController::class, 'edit'])->name('profesor.clases.edit');
    Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('profesor.clases.update');
});



Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/clases', [ClaseController::class, 'index'])->name('admin.clases.index');
    Route::get('/crear/clase', [ClaseController::class, 'crearclase'])->name('clases.create');
    Route::post('/crear/clase', [ClaseController::class, 'store'])->name('class.store');
    Route::post('/clases', [ClaseController::class, 'store'])->name('admin.clases.store');
    Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('admin.clases.show');
    Route::get('/clases/{id}/edit', [ClaseController::class, 'edit'])->name('admin.clases.edit');
    Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('admin.clases.update');
});


Route::get('/crear/examen',[ProfesorController::class,'crearexamen']);
Route::post('/crear/examen', [ExamenController::class, 'store'])->name('examen.store');




Route::get('/modificar/clase',[ProfesorController::class,'modificarclase']);
Route::get('/profesores/ConsultarClases', [ClaseController::class, 'index'])->name('class.Consulta');

Route::get('/editar/clase/{id}', [ClaseController::class, 'edit'])->name('class.edit'); 
Route::put('/actualizar/clase/{id}', [ClaseController::class, 'update'])->name('class.update'); 


Route::get('/asignar/alumno/clase',[ProfesorController::class,'asignarAlumnoClase']);
Route::get('/profesores/info-alumnos',[ProfesorController::class,'infoalumnos']);

Route::group(['middleware' => 'role:student'], function () {
    Route::get('/alumno/cintas', [AlumnoController::class, 'cintas'])->name('alumno.cintas');
Route::get('/alumno/eventos', [AlumnoController::class, 'eventos'])->name('alumno.eventos');
Route::get('/alumno/avisos', [AlumnoController::class, 'avisos'])->name('alumno.avisos');
Route::get('/alumno/grupos', [AlumnoController::class, 'grupos'])->name('alumno.grupos');
Route::get('/alumno/finanzas', [AlumnoController::class, 'finanzas'])->name('alumno.finanzas');
Route::get('/alumno/progresos', [AlumnoController::class, 'progresos'])->name('alumno.progresos');
Route::get('/alumno/cintas_examenes', [AlumnoController::class, 'cintas_examenes'])->name('alumno.cintas_examenes');

});



Route :: get('/alumno/progresos', [AlumnoController:: class , 'progresos']);
Route::get('/alumno/avisos', [AlumnoController::class, 'avisos'])->name('alumno.avisos');
Route :: get('/alumno/grupos', [AlumnoController:: class , 'grupos']);
Route :: get('/alumno/finanzas', [AlumnoController:: class , 'finanzas']);

Route::get('/admin/users', function () { return view('Admin/UsersAdmin');});
Route::get('/admin/users', [UserController::class, 'create'])->name('admin.users.create');



Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/molde',[LayoutController::class,'molde']);
Route::get('/login/admin', [AdminController::class,'inicioAdmin']);
Route::get ('/login/admin/addUser',[AdminController::class,'users']);
Route::get('/profesor/login', [ProfesorController::class, 'getlogin']);
Route::get ('/login/admin/addUser/userAdmin',[AdminController::class,'addAdmin']);
Route::get ('/login/admin/addUser/userProfe',[AdminController::class,'addProfesor']);
Route::get ('/login/admin/addUser/userAlumno',[AdminController::class,'addAlumno']);
Route::get('/profesor/crearclase', [ProfesorController::class, 'profesor.crearclase']);


Route::middleware('auth')->group(function () {
    // Clases
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/horarios', [ClaseController::class, 'horarios'])->name('clases.horarios');

    // Asistencia
    Route::get('/asistencia', [AsistenciaController::class, 'index'])->name('asistencia.index');
    Route::get('/asistencia/historial', [AsistenciaController::class, 'historial'])->name('asistencia.historial');

    // Estudiantes
    Route::get('/estudiantes', [AlumnoController::class, 'index'])->name('estudiantes.lista');
    Route::get('/estudiantes/progreso', [AlumnoController::class, 'progreso'])->name('estudiantes.progreso');

    // Exámenes
    Route::get('/examenes/crear', [ExamenController::class, 'crear'])->name('examenes.crear');
    Route::get('/examenes/resultados', [ExamenController::class, 'resultados'])->name('examenes.resultados');

    // Avisos
    Route::get('/avisos', [AvisoController::class, 'ver'])->name('avisos.ver');
    Route::get('/avisos/crear', [AvisoController::class, 'crear'])->name('avisos.crear');

    // Eventos
    Route::get('/eventos', [EventoController::class, 'misEventos'])->name('eventos.mis');
    Route::get('/eventos/calendario', [EventoController::class, 'calendario'])->name('eventos.calendario');

    // Mensajería
    Route::get('/mensajeria', [MensajeController::class, 'chat'])->name('mensajeria.chat');

    // Configuración
    Route::get('/configuracion/perfil', [ConfiguracionController::class, 'perfil'])->name('configuracion.perfil');
    Route::get('/configuracion/preferencias', [ConfiguracionController::class, 'preferencias'])->name('configuracion.preferencias');
});
Route::middleware('auth')->group(function () {
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('clases.show');
    Route::get('/clases/{id}/edit', [ClaseController::class, 'edit'])->name('clases.edit');
    Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('clases.update');
});
*/
    });

        Route::get('/consulta/examenes', [ExamenController::class, 'consultarExamenes'])->name('Profesores.ConsultaExamenes');

        Route::get('/crear-examen', [ExamenController::class, 'create'])->name('Profesores.CrearExamen');   
        Route::get('/crear-examen', [ExamenController::class, 'consult'])->name('Profesores.CrearExamen');
        Route::get('/profesor/avisos', [AvisoController::class, 'index'])->name('Profesor.ConsultarAvisos');
        Route::get('/clases/{id}', [ClaseController::class, 'index'])->name('classes.index');
        Route::get('/alumno/{id}', [AlumnoController::class, 'show'])->name('alumno.show');



