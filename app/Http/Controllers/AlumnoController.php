<?php

namespace App\Http\Controllers;
use App\Models\StudentBelt;
use App\Models\ExamStudent;
use App\Models\EventStudent;
use App\Models\StudentClass;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Role;


use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function avisos()
    {
        return view('Alumno.Avisos');
    }

    public function grupos()
    {
        return view('Alumno.Grupos');
    }

    public function finanzas()
    {
        return view('Alumno.Finanzas');
    }
    public function progresos()
    {
        return view('Alumno.Progreso');
    }
    public function eventos(){
        return view('Alumno.Eventos');
    }

    public function cintas(){
        return view('Alumno.Cintas');
    }

    public function cintas_examenes()
    {
        $studentbelt = StudentBelt::all();
        return view('Alumno.Progreso',compact('studentbelt'));
    }


    public function show($id)
{
    $student = Student::findOrFail($id);
    return view('alumno.show', compact('student'));
}

}
