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
            /*->join('ligas', 'equipos.id_liga', '=', 'ligas.id')
            ->select('ligas.liga','equipos.*')*/
            //->where('equipos.id_liga', '=', '1');
            ->get();
            //dd($equipos);
            /*$jugadores = Jugador::all();
            $integrantes = Integrantes::all(); */
            $jugadores = DB::table('jugadors')
            ->where('nombre','LIKE','%' . $query . '%')
            ->join('integrantes', 'integrantes.id_jugador', 'jugadors.id')
            ->select('integrantes.*', 'jugadors.*')
            ->orderBy('goles', 'desc');
            $jugadores = $jugadores->get(); 
        }
        return view('datos.anotacionesFutbol',['jugadores'=>$jugadores, 'equipos'=>$equipos, 'search' => $query]);
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
