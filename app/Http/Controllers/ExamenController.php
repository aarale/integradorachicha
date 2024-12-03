<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index()
    {
        
        $exams = Exam::all();
        $students = Student::with('person')->get();
        
        return view('Profesores.CrearExamen', compact('exams','students'));
    }
    
   


public function consult()
{
    $teacherId = 1;

    $students = DB::table('students')
        ->join('people', 'students.person_id', '=', 'people.id') 
        ->join('student_classes', 'students.id', '=', 'student_classes.student_id') 
        ->join('classes', 'student_classes.class_id', '=', 'classes.id') 
        ->where('classes.teacher_id', '=', $teacherId) 
        ->select('students.id as student_id', 'people.first_name', 'people.last_name', 'classes.id as class_id', 'classes.schedule_day', 'classes.schedule_start', 'classes.schedule_end')
        ->orderBy('classes.schedule_day') 
        ->get();
        
    $groupedStudents = $students->groupBy('class_id');
    
    return view('Profesores.CrearExamen', compact('groupedStudents'));
}


    public function consultarExamenes(){
        $exams = Exam::all();

        //

        return view('Profesores.ConsultaExamenes', compact('exams'));
    }

    

    public function store(Request $request)
    {
    
    $request->validate([
        'name' => 'required|string|max:50',
        'location' => 'required|string|max:75',
        'date' => 'required|date',
        'duration' => 'nullable|integer',
        'description' => 'nullable|string',
        
    ]);

    $exam =Exam::create([
        'name' => $request->name,
        'location' => $request->location,
        'date' => $request->date,
        'duration' => $request->duration,
        'description' => $request->description,
    ]);
    if ($request->has('students')) {
        $exam->students()->sync($request->students);
    }
    
        return redirect()->route('Profesores.CrearExamen')->with('success', 'Examen creado exitosamente.');
    }

    
 

    
    }
