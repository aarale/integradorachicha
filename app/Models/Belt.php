<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Belt extends Model
{
    protected $table = 'belt';
    protected $primaryKey = 'id';
    public $fillable = ['id','name','color','created_at', 'updated_at'];

    public function StudentBelt()
    {
        return $this->hasOne(StudentBelt::class, 'belt_id', 'id');
    }
}
