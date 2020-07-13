<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Integrantes extends Model
{
    use Notifiable;

    protected $fillable = [
        'id_integrantes','id_equipo','id_jugador'
    ];
}
