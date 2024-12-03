<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail{
    use Notifiable;
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'person_id',
        'name',
        'password',
        'email',
        'recovery_email',
        'recovery_token',
        'token_expiration',
        'active',
        'profile_picture',
    ];

    public function person()
    {
        return $this->belongsTo(people::class);
    }
    
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'loans', 'user_id', 'material_id');
    }

    
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role; 
use App\Models\UserRol;
use App\Models\Loan;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $fillable = ['person_id','username','password','email', 
                        'active', 'created_at', 'updated_at'];
    protected $hidden = [
        'password',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }
    
    public function userRoles(){
        return $this->hasMany(UserRol::class, 'user_id');
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
public function teacher()
{
    return $this->hasOne(Teacher::class, 'person_id', 'person_id');
}


public function hasRole($role)
{
    return $this->roles()->where('name', $role)->exists();
}


}
