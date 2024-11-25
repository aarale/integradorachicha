<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id';
    public $fillable = ['id', 'name', 'announcment', 'place_name', 'date', 
                        "time", "address", 'created_at', 'updated_at'];

    public function EventStudent(){

        return $this->hasOne(EventStudent::class, 'event_id', 'id');

    }
}
