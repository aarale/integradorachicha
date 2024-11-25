<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = 'emergency_contact';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'person_id', 'phone', 'email', 'created_at', 
                        'updated_at'];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'emergency_contact_id', 'id');
    }
}
