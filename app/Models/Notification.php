<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Si la tabla tiene un nombre diferente, lo defines aquí.
    protected $table = 'notifications'; // Ajusta el nombre de la tabla si es necesario.

    // Indicar si deseas manejar las marcas de tiempo (created_at y updated_at)
    public $timestamps = true;

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'admin_id',
        'user_id',
        'message',
    ];

    // Si deseas definir una relación con el usuario que recibe la notificación
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Si deseas definir una relación con el administrador que envía la notificación
    public function administrador()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
