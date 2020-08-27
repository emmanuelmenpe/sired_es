<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jugador;
use App\Integrantes;;
use App\partido;
use App\Equipo;
use App\Resultado;
use Illuminate\Support\Facades\DB;

class ResultadoController extends Controller
{
    public function index() 
    {   
        $partidos = DB::table('resultados')
        ->join('partidos', 'partidos.id', '=', 'resultados.id_partido')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
        ->select('partidos.*', 'resultados.*','equipos.nombre','equipos.logo')
        ->get();
        $partidoss = DB::table('resultados')
        ->join('partidos', 'partidos.id', '=', 'resultados.id_partido')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*', 'resultados.*','equipos.nombre','equipos.logo')
        ->get();
        return view('datos.resultados', ['partidos'=>$partidos,'partidoss'=>$partidoss]);
        
    }
    
    public function create(Request $request, $id)
    {
        $jugadores = DB::table('jugadors')->orderBy('id','ASC')->get();
        $partido = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();

        $integrantes = DB::table('integrantes')
        ->where('integrantes.id_equipo', '=', $partido->id)
        ->get();

        $partidoo = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();

        $integrantess = DB::table('integrantes')
        ->where('integrantes.id_equipo', '=', $partidoo->id)
        ->get();
        
        $partidoID = $id;
        return view('datos.resultadosCreate', ['partido'=>$partido, 'partidoo'=>$partidoo,'partidoID'=>$partidoID, 'jugadores'=>$jugadores,'integrantes'=>$integrantes,'integrantess'=>$integrantess]);
    }
    
    public function store(Request $request)
    {
        $partidoid = request('id_partido');
        $local = request('local');
        $visitante = request('visitante');
        $resultado = new Resultado();
        $localGoles = request('localG');
        $visitanteGoles = request('visitanteG');
        $partido = Partido::findOrFail($partidoid);
        $equipo1 = Equipo::findOrFail($local);
        $equipo2 = Equipo::findOrFail($visitante);
        if ($localGoles > $visitanteGoles) {
            $resultado->id_ganador = request('local');
            $resultado->id_perdedor = request('visitante');
            $resultado->goles_ganador = $localGoles;
            $resultado->goles_perdedor = $visitanteGoles;

            $equipo1->victorias = $equipo1->victorias + 1;
            $equipo1->puntos = $equipo1->puntos + 3;
            

            $equipo2->derrotas = $equipo2->derrotas+1;
            $equipo2->puntos = $equipo2->puntos + 0;
            

        } elseif ($visitanteGoles > $localGoles) {
            $resultado->id_ganador = request('visitante');
            $resultado->id_perdedor = request('local');
            $resultado->goles_ganador = $localGoles;
            $resultado->goles_perdedor = $visitanteGoles;

            $equipo2->victorias = $equipo2->victorias + 1;
            $equipo2->puntos = $equipo2->puntos + 3;

            $equipo1->derrotas = $equipo1->derrotas+1;
            $equipo1->puntos = $equipo1->puntos + 0;
        }else {
            
            $resultado->goles_ganador = $localGoles;
            $resultado->goles_perdedor = $visitanteGoles;

            $equipo1->empates = $equipo1->victoria + 1;
            $equipo1->puntos = $equipo1->puntos + 1;

            $equipo2->empates = $equipo2->empates+1;
            $equipo2->puntos = $equipo2->puntos + 1;
        }
        $equipo1->goles_favor = $equipo1->goles_favor + $localGoles;
        $equipo1->goles_contra = $equipo1->goles_contra + $visitanteGoles;

        $equipo2->goles_favor = $equipo2->goles_favor + $visitanteGoles;
        $equipo2->goles_contra = $equipo2->goles_contra + $localGoles;
        
        $resultado->id_partido = $partidoid;
        $equipo1->update();
        $equipo2->update();
        $resultado->save();

        return redirect('/partidos');
    }
}
