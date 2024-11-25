<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrators';
    protected $primaryKey = 'id';
    public $fillable = ['id','person_id','created_at', 'created_at'];

    public function People()
    {
        return $this->belongsTo(People::class, 'person_id', 'id');
    }
}