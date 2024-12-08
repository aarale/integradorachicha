<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ProfesorController extends Controller
{
    public function vistaprincipal(){
        return view('Profesores.Dashboard');
    }


    public function crearexamen(){
        return view('Profesores.CrearExamen');
    }

    
    public function modificarclase(){
        return view('Profesores.ModificarClase');
    }


    public function asignarAlumnoClase(){
        return view('Profesores.AsignarAlumnoClase');
    }


    public function infoalumnos(){
        return view('Profesores.ConsultarAlumnos');
    }

    
    public function consultaExamenes(){
        return view('Profesores.ConsultaExamenes');
    }
}
