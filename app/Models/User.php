<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmaili;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'person_id',
        'username',
        'password',
        'email',
        'recovery_email',
        'recovery_token',
        'token_expiration',
        'active',
        'profile_picture',
    ];

    // Definir relación con la tabla 'people'
    public function person()
    {
        return $this->belongsTo(people::class);
    }
}
