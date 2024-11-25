<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'student_classes';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'student_id', 'class_id', 'status', 'created_at', 
                        'updated_at'];

    public function Student(){

        return $this->belongsToMany(Student::class, 'student_id', 'id');
    }

    public function Class(){

        return $this->belongsToMany(CustomClass::class, 'class_id', 'id');
    }
}
