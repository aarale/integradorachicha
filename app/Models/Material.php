<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'name', 'description', 'total_quantity', 'created_at', 'updated_at'];

    public function Loan(){

        return $this->hasMany(Loan::class, 'material_id', 'id');
    }
}
