<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentBelt extends Model
{
    protected $table = 'student_belts';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'student_id', 'belt_id', 'obtained_date', 'created_at', 
                        'updated_at']; 

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function Belt()
    {
        return $this->belongsTo(Belt::class, 'belt_id', 'id');
    }
}
