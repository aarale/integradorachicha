<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamStudent extends Model
{
    protected $table = 'exam_student';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'exam_id', 'student_id', 'created_at', 
                        'updated_at'];

    public function Exam(){

        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function Student(){

        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
