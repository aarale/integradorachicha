<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class ProfesorController extends Controller
{
    public function vistaprincipal(){
        return view('inicio');
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
