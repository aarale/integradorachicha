<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'id';
    public $fillable = ['first_name', 'last_name', 'birth_date', 'address', 'phone'];


    public function Administrator()
    {
        return $this-> hasOne(People::class, 'person_id', 'id');
    }

    public function Student()
    {
        return $this-> hasOne(Student::class, 'person_id', 'id');
    }

    public function Teacher()
    {
        return $this-> hasOne(Teacher::class, 'person_id', 'id');
    }
    
}
