<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipo extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','nombre','victorias','empates','derrotas','id_liga','id_rama','id_catedoria'
    ];
}
