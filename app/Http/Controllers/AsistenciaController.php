<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

class AsistenciaController extends Controller
{
    public function mostrarAsistencia()
    {
        $classId = 7; 

        $query = "
        SELECT 
            p.first_name,
            p.last_name,
            a.attendance_status AS attendance
        FROM 
            attendance a
        JOIN 
            students s ON a.student_id = s.id
        JOIN 
            people p ON s.person_id = p.id
        WHERE 
            a.class_id = ? 
        ";

        // Ejecutar la consulta
        $attendances = DB::select($query, [$classId]);

        // Convertir attendance_status a booleano
        foreach ($attendances as $attendance) {
            $attendance->attendance = (bool) $attendance->attendance; // Conversión explícita
        }

        return view('Profesores.asistencia', compact('attendances'));
    }

    public static function attendancestudent()
    {
        $users = User::leftJoin('user_role as ur', 'ur.user_id', 'users.id')
                            ->where('role_id', 3)->get();
        return redirect()->route('asistencia.store', compact('users'));
    }

    
    public function tomarAsistencia()
    {
        $teacherId = 1;
        $classId = 1;
    
        $query = "
        SELECT 
            s.id AS student_id,
            p.first_name,
            p.last_name,
            a.attendance_status
        FROM 
            students s
        JOIN 
            student_classes sc ON s.id = sc.student_id
        JOIN 
            classes c ON sc.class_id = c.id
        JOIN 
            attendance a ON a.class_id = c.id AND a.student_id = s.id
        JOIN 
            people p ON s.person_id = p.id
        WHERE 
            c.teacher_id = ? AND c.id = ?
        ";
    
        $studentsAttendance = DB::select($query, [$teacherId, $classId]);
    
        // Pasar los resultados a la vista
        return view('Profesores.Clases.TomarAsistencia', compact('studentsAttendance'));
    }

    
    public function guardarAsistencia(Request $request)
    {
    $attendanceData = $request->input('attendance', []);

    foreach ($attendanceData as $studentId => $status) {
        Attendance::updateOrCreate(
            ['student_id' => $studentId, 'class_id' => 1],
            ['attendance_status' => 1] 
        );
    }
    return redirect()->route('asistenciatomada')->with('success', 'Asistencia guardada correctamente.');
    }


    public function store(Request $request)
    {
    $request->validate([
        'attendances' => 'required|array',
        'attendances.status' => 'required|boolean',
    ]);
    foreach ($request->input('attendances') as $studentId => $estado) {
        Attendance::updateOrCreate(
            [
                'student_id' => $studentId,
                'class_id' => 1 
            ],
            [
                'attendance_status' => $estado ? 1 : 0 
            ]
        );}
    return redirect()->route('verasistencia')->with('success', 'Asistencia registrada correctamente');
    }


}
