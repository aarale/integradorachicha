<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class AvisoController extends Controller
{

    public function avisos(){
        $avisos = Notification::all();
        return view('Profesores.ConsultarAvisos', compact('avisos'));
    }

    
    public function avisosTeacher()
    {
        $avisos = Notification::all();
        return view('Profesores.ConsultarAvisos', compact('avisos'));
    }
    
    
}
