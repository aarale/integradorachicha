<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loans';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'user_id', 'material_id', 'status', "quantity",
                        'transaction_date', 'devolution_date', 'created_at','updated_at'];

    public function material(){

        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function User(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
