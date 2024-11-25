<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventStudent extends Model
{
    protected $table = 'event_students';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'event_id', 'student_id', 'created_at', 
                        'updated_at'];

    public function Event(){

        return $this->belongsToMany(Event::class, 'event_id', 'id');
    }

    public function Student(){

        return $this->belongsToMany(Student::class, 'student_id', 'id');
    }
}
