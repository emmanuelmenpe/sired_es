<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnotacionFutbolController extends Controller
{
    
    public function index(Request $request)
    { 
        if($request){   
            $query = trim($request->get('search'));
            $equipos = DB::table('equipos') 
            ->get();
            $jugadores = DB::table('jugadors')
            ->where('nombre','LIKE','%' . $query . '%')
            ->join('integrantes', 'integrantes.id_jugador', 'jugadors.id')
            ->select('integrantes.*', 'jugadors.*')
            ->orderBy('goles', 'desc');
            $jugadores = $jugadores->get(); 
        }
        return view('datos.anotacionesFutbol',['jugadores'=>$jugadores, 'equipos'=>$equipos, 'search' => $query]);
    }
}
