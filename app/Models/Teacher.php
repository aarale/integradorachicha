<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\People;
use App\Models\CustomClass;

class Teacher extends Model
{
    protected $table = 'teachers';
    public $fillable = [ 'person_id', 'rfc', 'created_at', 'updated_at'];

    

    public function CustomClass(){

        return $this->hasMany(CustomClass::class, 'teacher_id', 'id');
    }

    public function person()
    {
        return $this->belongsTo(People::class, 'person_id'); 
    }

}
