<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Attendance;


class AsistenciaController extends Controller
{
    
    public function index()
    {
        $attendances = Attendance::all(); 
        return view('Profesores.asistencia', compact('attendances'));
    }

    public function store(Request $request)
    {
        foreach ($request->input('attendances') as $userId => $estado) {
        }
        return redirect()->route('asistencia.index')->with('success', 'Asistencia registrada correctamente');
    }

}
