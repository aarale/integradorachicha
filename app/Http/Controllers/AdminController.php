<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function vistaprincipal()
    {
        return view('Admin.Dashboard');
    }
    
    public function proves(){
        return view('Admin.Prestamos');
    }

    public function classes(){    
        $query = "
        SELECT 
        classes.name AS class_name,
        CONCAT(classes.schedule_day, ' de ', TIME_FORMAT(classes.schedule_start, '%H:%i'), ' a ', TIME_FORMAT(classes.schedule_end, '%H:%i')) AS schedule,
        CONCAT(DATE_FORMAT(classes.created_at, '%Y-%m-%d'), ' - ', DATE_FORMAT(classes.updated_at, '%Y-%m-%d')) AS period,
        COUNT(student_classes.student_id) AS student_count
        FROM classes
        LEFT JOIN student_classes ON classes.id = student_classes.class_id
        GROUP BY classes.id
        HAVING COUNT(DISTINCT classes.teacher_id);
        ";
    
        $teacher_classes = DB::select($query);
    
        return view('Admin.ConsultarClases', compact('teacher_classes'));
        }

        public function consultusers(){

        $query = "
        SELECT 
        u.id AS user_id,
        CONCAT(p.first_name, ' ', p.last_name) AS full_name,
        u.username,
        r.name AS role
        FROM 
        users u
        JOIN 
        people p ON u.person_id = p.id
        JOIN 
        user_role ur ON u.id = ur.user_id
        JOIN 
        roles r ON ur.role_id = r.id
        ORDER BY 
        u.id;";

        $admins= DB::select($query);
        $teachers = DB::select($query);
        $students = DB::select($query);

            return view('Admin.Users', compact('admins', 'teachers', 'students'));
        }

        public function inventario(){
            return view('Admin.Inventario');
        }
}
