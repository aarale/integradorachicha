<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomClass;
use App\Models\Teacher;
use App\Models\CustomUser;

class ClaseController extends Controller
{


    public function index()
{
    $user = auth()->user();

    if (!$user->teacher) {
        return redirect()->route('home')->with('error', 'No tienes clases asignadas.');
    }

    $classes = CustomClass::where('teacher_id', $user->teacher->id)->get();

    foreach ($classes as $class) {
        $class->students = $class->students()->get(); 
    }

    return view('Profesores.Clases.index', compact('classes'));
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

    CustomClass::create([
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
        $class = CustomClass::findOrFail($id);
        $participants = $class->students;
        return view('clases.show', compact('class', 'participants'));
    }

    public function edit($id)
    {
        $class = CustomClass::findOrFail($id);
        return view('clases.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'capacity' => 'required|integer',
            'schedule_day' => 'required|string|max:20',
            'schedule_start' => 'required',
            'schedule_end' => 'required',
        ]);

        $class = CustomClass::findOrFail($id);
        $class->update($request->all());

        return redirect()->route('clases.index')->with('success', 'Clase actualizada exitosamente.');
    }

    public function addStudentsToClass($classId, $studentIds)
{
    $class = CustomClass::find($classId);

    $class->students()->attach($studentIds);

   
    $class->students()->sync($studentIds);

    return back()->with('success', 'Estudiantes agregados correctamente.');
}

public function testRedirect()
{
    return redirect()->route('Profesores.Clases.index');
}



}
