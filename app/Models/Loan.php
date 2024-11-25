<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loan';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'user_id', 'material_id', 'status', "quantity",
                        'transaction_date', 'devolution_date', 'created_at','updated_at'];

    public function Material(){

        return $this->belongsToMany(Material::class, 'material_id', 'id');
    }

    public function CustomUser(){

        return $this->belongsToMany(CustomUser::class, 'user_id', 'id');
    }
}
