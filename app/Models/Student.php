<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role; 

class Student extends Model
{
        protected $table = 'students';
        protected $primaryKey = 'id';
        public $fillable = ['id', 'person_id', 'emergency_contact_id', 'created_at', 'updated_at'];


        public function person()
    {
        return $this->belongsTo(People::class);
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }


        public function StudentBelt(){

                return $this->hasOne(StudentBelt::class, 'student_id', 'id');
        }

        public function EmergencyContact(){

                return $this->hasOne(EmergencyContact::class, 'emergency_contact_id', 'id');
                }

        public function EventStudent(){

                return $this->hasMany(EventStudent::class, 'student_id', 'id');
        }

        public function ExamStudent(){

                return $this->hasMany(ExamStudent::class, 'student_id', 'id');
        }

        public function Payment(){

                return $this->hasMany(Payment::class, 'student_id', 'id');
        }

        public function StudentClass(){

                return $this->hasMany(StudentClass::class, 'student_id', 'id');
        }
        public function classes()
    {
        return $this->belongsToMany(CustomClass::class, 'student_classes', 'student_id', 'class_id');
    }
}
