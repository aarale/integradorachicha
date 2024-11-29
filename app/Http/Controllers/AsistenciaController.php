<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AsistenciaController extends Controller
{
    
    public function mostrarAsistencia()
    {
        $classId = 7; 
        $date = "2024-11-19";

        $query = "
        SELECT 
            p.first_name,
            p.last_name,
            COUNT(a.id) AS attendance
        FROM 
            attendance a
        JOIN 
            students s ON a.student_id = s.id
        JOIN 
            people p ON s.person_id = p.id
        WHERE 
            a.class_id = ? 
            AND DATE(a.date) = ? 
        GROUP BY 
            p.first_name, p.last_name
        ";

        $attendances = DB::select($query, [$classId, $date]);
        return view('Profesores.asistencia', compact('attendances', 'date'));
    }


    public static function attendancestudent(){
        $users= CustomUser::leftJoin('user_role as ur', 'ur.user_id', 'custom_users.id')
                            ->where('role_id', 3)->get();
         return redirect()->route('asistencia.store', compact('users'));
    }


    public function store(Request $request)
    {
        foreach ($request->input('attendances') as $userId => $estado) {
        }
        return redirect()->route('asistencia.index')->with('success', 'Asistencia registrada correctamente');
    }


    public function tomarAsistencia() {
        $teacherId = 1;
    
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
            c.teacher_id = ?
        ";
    
        $studentsAttendance = DB::select($query, [$teacherId]);
    
        // Pasar los resultados a la vista
        return view('Profesores.Clases.TomarAsistencia', compact('studentsAttendance'));
    }

}
