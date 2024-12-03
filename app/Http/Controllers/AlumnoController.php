<?php

namespace App\Http\Controllers;
use App\Models\StudentBelt;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function avisos()
    {
        return view('Alumno.Avisos');
    }


    public function grupos()
    {
        return view('Alumno.Grupos');
    }


    public function finanzas()
    {
        return view('Alumno.Finanzas');
    }


    public function progresos()
    {
        return view('Alumno.Progreso');
    }


    public function eventos(){
        return view('Alumno.Eventos');
    }


    public function cintas(){
        return view('Alumno.Cintas');
    }


    public function cintas_examenes()
    {
        $studentbelt = StudentBelt::all();
        return view('Alumno.Progreso',compact('studentbelt'));
    }


    public function show($id)
{
    $student = Student::findOrFail($id);
    return view('Alumno.show', compact('student'));
}
    {
        $student = Student::findOrFail($id);
    return view('alumno.show', compact('student'));
    }

    public function payments($studentId)
    {
        $payments = DB::select("
            SELECT 
                p.reference AS reference_payment,          
                p.method AS payment_method,     
                p.date AS payment_date,
                p.amount AS payment_amount
            FROM payments p
            JOIN students s ON p.student_id = s.id
            WHERE s.id = ?
        ", [$studentId]);

        return view('Alumno.Pagos', ['payments' => $payments]);
    }

    public function loans($userId)
    {
        $loans = DB::select("
        SELECT 
            m.product AS material_name,                    
            m.reference AS material_reference,                    
            l.status AS loan_status,                      
            l.transaction_date AS loan_date,
            l.devolution_date AS return_date 
        FROM loans l
        JOIN materials m ON l.material_id = m.id         
        WHERE l.status = 'loaned'                        
        AND l.transaction_date >= CURRENT_DATE - INTERVAL 30 DAY
        AND l.user_id = ? 
    ", [$userId]);

    return view('Alumno.Prestamos', ['loans' => $loans]);
    }


    public function progress($studentId)
    {
        $studentProgress = DB::select("
            SELECT 
                p.first_name,
                p.last_name,
                b.name AS current_belt,
                b.color AS current_belt_color,
                ex.date AS exam_date,
                ex.name AS exam_name,
                ev.date_time AS event_date,
                ev.name AS event_name,
                es_event.result AS event_result
            FROM 
                students s
            JOIN 
                people p ON s.person_id = p.id
            JOIN 
                student_belts sb ON s.id = sb.student_id AND sb.active = 1
            JOIN 
                belts b ON sb.belt_id = b.id
            LEFT JOIN 
                exam_student es_exam ON s.id = es_exam.student_id
            LEFT JOIN 
                exams ex ON es_exam.exam_id = ex.id
            LEFT JOIN 
                event_students es_event ON s.id = es_event.student_id
            LEFT JOIN 
                events ev ON es_event.event_id = ev.id
            WHERE 
                s.id = ?
        ", [$studentId]);

        $exams = [];
        $belts = [];
        $events = [];

        foreach ($studentProgress as $progress) {
            $studentName = $progress->first_name . ' ' . $progress->last_name;
            $currentBelt = $progress->current_belt;

            if ($progress->exam_date) {
                $exams[] = [
                    'date' => $progress->exam_date,
                    'name' => $progress->exam_name,
                    'belt' => $progress->current_belt_color 
                ];
            }

           if ($progress->event_date) {
                $events[] = [
                    'date' => $progress->event_date,
                    'name' => $progress->event_name,
                    'result' => $progress->event_result
                ];
            }
        }

        $belts = DB::select("
            SELECT b.name AS belt_name, sb.created_at AS date
            FROM student_belts sb
            JOIN belts b ON sb.belt_id = b.id
            WHERE sb.student_id = ?
            ORDER BY sb.created_at ASC
        ", [$studentId]);

        return view('Alumno.Progreso', compact('studentName', 'currentBelt', 'exams', 'belts', 'events'));
    }
    

}
