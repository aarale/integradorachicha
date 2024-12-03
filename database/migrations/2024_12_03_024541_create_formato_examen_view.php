<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateFormatoExamenView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW formato_examen AS
            SELECT 
                s.id AS estudiante_id,
                CONCAT(p.first_name, ' ', p.last_name) AS nombre_estudiante,
                YEAR(CURDATE()) - YEAR(p.birth_date) AS edad,
                b_actual.name AS cinta_actual,
                b_siguiente.name AS cinta_siguiente,
                p.birth_date AS fecha_nacimiento,
                CONCAT(tp.first_name, ' ', tp.last_name) AS nombre_profesor,
                e.date AS fecha_examen
            FROM 
                students AS s
            JOIN 
                people AS p ON s.person_id = p.id
            JOIN 
                student_belts AS sb ON sb.student_id = s.id
            JOIN 
                belts AS b_actual ON sb.belt_id = b_actual.id
            LEFT JOIN 
                belts AS b_siguiente ON b_siguiente.id = b_actual.id + 1
            JOIN 
                teachers AS t ON t.id = s.id
            JOIN 
                people AS tp ON t.person_id = tp.id
            JOIN 
                exam_student AS es ON es.student_id = s.id
            JOIN 
                exams AS e ON e.id = es.exam_id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS formato_examen');
    }
}
