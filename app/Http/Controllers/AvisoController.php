<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class AvisoController extends Controller
{
    public function avisosTeacher()
    {
        $avisos = Notification::all();
        return view('Profesores.ConsultarAvisos', compact('avisos'));
    }
    
    public function crearAviso(Request $request)
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,id',    
            'message' => 'required|string|max:255',
        ]);

        Notificacion::create([
            'admin_id' => auth()->id(),  
            'user_id' => $request->user_id,
            'message' => $request->message,
        ]);

        return redirect()->route('Profesor.ConsultarAvisos');  
    }

    public function avisosAdmin(){
        $avisos = Notification::all();
        return view('Admin.AvisosAdmin', compact('avisosAdmin'));
    }


}

