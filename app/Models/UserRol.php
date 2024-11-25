<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CustomUser;
use App\Models\Role; 

class UserRol extends Model
{
    protected $table = 'user_role';
    protected $primaryKey = 'id';
    public $fillable = [ 'user_id', "role_id"];
   
    public function Custom_users(){
        return $this->belongsToMany(CustomUser::class, 'user_id', 'id');
    }
    
   public function Role(){
        return $this->belongsToMany(Role::class, 'role_id', 'id');
    }
}