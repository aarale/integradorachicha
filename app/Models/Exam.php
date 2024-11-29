<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';

    protected $fillable = [
        'name', 
        'location', 
        'date', 
        'duration', 
        'description'
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'exam_student', 'exam_id', 'student_id');
    }
    public $timestamps = true; 

    
}
