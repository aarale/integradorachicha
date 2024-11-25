<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';

    protected $fillable = [
        'name', 
        'location', 
        'date', 
        'duration', 
        'description'
    ];

    public $timestamps = true; 

    
}
