<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Exam;

use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index()
    {
        
        $exams = Exam::all();
        return view('Profesor.Crear_Examen', compact('exams'));
    }

/*
    public function store(Request $request)
{
    DB::table('exams')->insert([
        'name' => $request->name,
        'location' => $request->location,
        'date' => date('Y-m-d H:i:s', strtotime($request->date)),
        'duration' => $request->duration,
        'description' => $request->description,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    
    

    return redirect()->route('consulta/examenes')->with('success', 'Examen creado exitosamente.');
}
    */
    public function store(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:50',
        'location' => 'required|string|max:75',
        'date' => 'required|date',
        'duration' => 'nullable|integer',
        'description' => 'nullable|string',
        
    ]);

    Exam::create([
        'name' => $request->name,
        'location' => $request->location,
        'date' => $request->date,
        'duration' => $request->duration,
        'description' => $request->description,
    ]);
    
        return redirect()->route('profesores.crearexamen')->with('success', 'Examen creado exitosamente.');
    }

   
    
    }
