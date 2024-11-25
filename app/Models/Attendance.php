<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'id';
    protected $fillable = [
        'student_id', 
        'class_id', 
        'date', 
        'attendace_status', 
        'comment', 
        'created_at', 
        'updated_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(CustomClass::class, 'class_id', 'id');
    }
}
