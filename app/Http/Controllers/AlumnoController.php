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
    return view('alumno.show', compact('student'));
    }

    public function payments($studentId)
    {
        // Realizar la consulta a la base de datos
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

        // Pasar los datos a la vista
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

}
