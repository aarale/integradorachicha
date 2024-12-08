<?php

namespace App\Models;
use App\Models\UserRol;
use App\Models\People;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $fillable = ['name', 'guard_name', 'created_at', 'updated_at'];

    public function register(){
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
