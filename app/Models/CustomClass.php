<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\StudentClass;

class CustomClass extends Model
{
    protected $table = 'customclasses';
    protected $primaryKey = 'id';
    protected $fillable = ['teacher_id', 'name', 'schedule_day', 'schedule_start',
                            'schedule_end', 'capacity', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_classes', 'class_id', 'student_id');
    }

    public function StudentClass(){

        return $this->hasMany(StudentClass::class, 'class_id', 'id');
    }

    public function teacher()
{
    return $this->belongsTo(Teacher::class, 'teacher_id');
}


}
