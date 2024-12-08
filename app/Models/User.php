<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role; 
use App\Models\UserRol;
use App\Models\Loan;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $fillable = ['person_id','username','password','email', 
                        'active', 'created_at', 'updated_at'];
    protected $hidden = [
        'password',
    ];

    use HasRoles;

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }
    
    public function UserRol(){
        return $this->hasMany(UserRol::class, 'user_id', 'id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'person_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne(Administrator::class, 'person_id', 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'person_id', 'id');
    }

    public function Loan(){

        return $this->hasMany(Loan::class, 'user_id', 'id');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
    
}