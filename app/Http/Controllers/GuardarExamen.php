<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 
use App\Models\Teacher; 

class GuardarExamen extends Controller
{
    public function showForm($studentId)
    {
        $student = Student::find($studentId);  
    
        if (!$student) {
            return redirect()->route('examen.form')->with('error', 'Estudiante no encontrado.');
        }
    
        return view('examen_form', compact('student'));
    }

    public function storeExamen(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'current_grade' => 'required|integer',
            'next_grade' => 'required|integer',
            'age' => 'required|integer',
            'birth_date' => 'required|date',
            'teacher_name' => 'required|string|max:255',
            'evaluation_date' => 'required|date',
        ]);

        $student_name = $request->input('student_name');
        $current_grade = $request->input('current_grade');
        $next_grade = $request->input('next_grade');
        $age = $request->input('age');
        $birth_date = $request->input('birth_date');
        $teacher_name = $request->input('teacher_name');
        $evaluation_date = $request->input('evaluation_date');

        $examen = new \App\Models\Exam(); 
        $examen->student_name = $student_name;
        $examen->current_grade = $current_grade;
        $examen->next_grade = $next_grade;
        $examen->age = $age;
        $examen->birth_date = $birth_date;
        $examen->teacher_name = $teacher_name;
        $examen->evaluation_date = $evaluation_date;

        $examen->save();

        return redirect()->route('examen.form')->with('success', 'Examen guardado con éxito');
    }



}
