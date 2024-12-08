<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class ClaseController extends Controller
{

    public function teacher_classes_byId(){    
        $query = "
        SELECT 
        classes.name AS class_name,
        CONCAT(classes.schedule_day, ' de ', TIME_FORMAT(classes.schedule_start, '%H:%i'), ' a ', TIME_FORMAT(classes.schedule_end, '%H:%i')) AS schedule,
        CONCAT(DATE_FORMAT(classes.created_at, '%Y-%m-%d'), ' - ', DATE_FORMAT(classes.updated_at, '%Y-%m-%d')) AS period,
        COUNT(student_classes.student_id) AS student_count
        FROM classes
        LEFT JOIN student_classes ON classes.id = student_classes.class_id
        WHERE classes.teacher_id = ?  
        GROUP BY classes.id
        ";
    
        $teacher_classes = DB::select($query);
    
        return view('Profesores.ConsultarClases', compact('teacher_classes', 'teacherId'));
        }
    


public function create()
{
    $teachers = Teacher::with('person')->get(); 
    return view('admin.CrearClase', compact('teachers'));

}

public function store(Request $request)
{
    $request->validate([
        'teacher_id' => 'required|exists:teachers,id',
        'schedule_day' => 'required|string|max:20',
        'schedule_start' => 'required',
        'schedule_end' => 'required',
    ]);

    Classes::create([
        'teacher_id' => $request->teacher_id,
        'name' => 'Clase ' . now()->format('Y-m-d'),
        'schedule_day' => $request->schedule_day,
        'schedule_start' => $request->schedule_start,
        'schedule_end' => $request->schedule_end,
        'capacity' => 30, 
    ]);

    return redirect()->route('admin.clases.index')->with('success', 'Clase creada exitosamente.');
}

    public function show($id)
    {
        $class = Classes::findOrFail($id);
        $participants = $class->students;
        return view('Profesores.Clases.show', compact('class', 'participants'));
    }

    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        $teacher_classes = Classes::where('teacher_id', $class->teacher_id)->get();
        return view('Profesores.Clases.Editar', compact('class'));
    }

    public function update(Request $request, $id)
{
    $class = Classes::findOrFail($id);
    $class->update($request->all());
    return redirect()->route('profesor.clases')->with('success', 'Clase actualizada correctamente.');
}

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:50',
    //         'capacity' => 'required|integer',
    //         'schedule_day' => 'required|string|max:20',
    //         'schedule_start' => 'required',
    //         'schedule_end' => 'required',
    //     ]);

    //     $class = Classes::findOrFail($id);
    //     $class->update($request->all());

    //     return redirect()->route('clases.index')->with('success', 'Clase actualizada exitosamente.');
    // }

    public function addStudentsToClass($classId, $studentIds)
{
    $class = Classes::find($classId);
    $class->students()->attach($studentIds);
    $class->students()->sync($studentIds);
    return back()->with('success', 'Estudiantes agregados correctamente.');
}

public function testRedirect()
{
    return redirect()->route('Profesores.Clases.index');
}



}
