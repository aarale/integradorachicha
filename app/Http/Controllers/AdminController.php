<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function inicioAdmin()
    {
        return view('Admin.InicioAdmin');
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
}
