<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'id';
    public $fillable = ['id','student_id', 'date', 'type', 'method', 
                        'amount', 'created_at', 'updated_at'];

    public function Student(){

        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
