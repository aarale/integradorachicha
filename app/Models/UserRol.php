<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role; 

class UserRol extends Model
{
    protected $table = 'user_role';
    protected $primaryKey = 'id';
    public $fillable = ['user_id', 'role_id', 'created_at', 'updated_at'];
   
    public function User(){
        return $this->belongsToMany(User::class, 'user_id', 'id');
    }
    
   public function Role(){
        return $this->belongsToMany(Role::class, 'role_id', 'id');
    }
    
}