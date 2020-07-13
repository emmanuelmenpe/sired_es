<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jugador extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','nombre','curp','fotografia','sancion','motivo','fecha_sancion','fecha_fin'
    ];
}
