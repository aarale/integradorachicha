<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role; 
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CustomUser extends Authenticatable
{
    protected $table = 'custom_users';
    protected $primaryKey = 'id';
    public $fillable = ['person_id','username','password','email', 'active', ];
    protected $hidden = [
        'password',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }
    
    public function UserRol(){
        return $this->hasMany(UserRol::class, 'user_id', 'id');
    }

    public function Loan(){

        return $this->hasMany(Loan::class, 'user_id', 'id');
    }

    
    

public function teacher()
{
    return $this->hasOne(Teacher::class, 'person_id', 'person_id');
}


public function hasRole($role)
{
    return $this->roles()->where('name', $role)->exists();
}


}