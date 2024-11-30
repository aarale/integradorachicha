<?php

namespace App\Models;
use App\Models\User;
use App\Models\UserRol;
use App\Models\People;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $fillable = ['name'];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id');
    }
    public function register()
{
    $this->app->bind('Role', function ($app) {
        return new Role();
    });
}
    public function People()
    {
        return $this->belongsTo(People::class, 'person_id', 'id');
    }

    public function UserRol(){

        return $this->hasMany(UserRol::class, 'role_id', 'id');
    }
    
}
