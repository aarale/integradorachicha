<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function inicioAdmin()
    {
        return view('Prueba');
    }

    public function users()
    {
        return view('Admin/UsersAdmin');
    }   
    public function addAdmin()
    {
        return view('Admin/UserAdmin');
    }
    public function addProfesor()
    {
        return view('Admin/UserProfesor');
    }
    public function addAlumno()
    {
        return view('Admin/UserAlumno');
    }
    public function addusr(){
        return view('Admin.InicioAdmin');
    }
    public function proves(){
        return view('Admin.Prestamos');
    }
}
