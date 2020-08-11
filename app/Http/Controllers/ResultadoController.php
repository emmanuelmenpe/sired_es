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
        /*
        $equipos = Equipo::all();
        $resultados = Resultado::all();
        //return view('partidos.index', ['partidos'=>Partido::all(), 'equipos'=>Equipo::all()]);
        $partidos = DB::table('partidos')
        //->where('nombre','LIKE','%' . $query . '%')
        ->orderBy('id', 'desc')
        //->join('canchas', 'canchas.id', '=', 'partidos.id_cancha')
        //->join('arbitros', 'arbitros.id', '=', 'partidos.id_arbitro')
        //->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        //->select('partidos.*','canchas.cancha', 'arbitros.arbitro')
        ->get();
        return view('datos.resultados', ['partidos'=>$partidos,'equipos'=>$equipos, 'resultados'=>$resultados]);
        */
        
        $partidos = DB::table('resultados')
        ->join('partidos', 'partidos.id', '=', 'resultados.id_partido')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
        ->select('partidos.*', 'resultados.*','equipos.nombre','equipos.logo')
        ->get();
        //->paginate(5);
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
        //dd($id);
        $partido = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();

        $integrantes = DB::table('integrantes')
        ->where('integrantes.id_equipo', '=', $partido->id)
        ->get();
        //->paginate(5);  

        $partidoo = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();

        $integrantess = DB::table('integrantes')
        ->where('integrantes.id_equipo', '=', $partidoo->id)
        ->get();
        /*echo "<pre>";
        print_r($partido);*/
        $partidoID = $id;
        return view('datos.resultadosCreate', ['partido'=>$partido, 'partidoo'=>$partidoo,'partidoID'=>$partidoID, 'jugadores'=>$jugadores,'integrantes'=>$integrantes,'integrantess'=>$integrantess]);
        /*
        $partido = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();
        //->get();
        //->paginate(5);
        $partidoo = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();
        //->get();
        //echo "<pre>";
        //print_r($partido);
        return view('datos.resultadosCreate', ['partido'=>$partido, 'partidoo'=>$partidoo]);*/
    }
    
    public function store(Request $request)
    {
        /*
        $resultado = new Resultado();
        $partidoid = request('id_partido');
        $jugadores = DB::table('jugadors')->orderBy('id','ASC')->get();
        $partido = Partido::findOrFail($partidoid);
        $equipoL = Equipo::findOrFail($partido->id_local);
        $equipoV = Equipo::findOrFail($partido->id_visitante);

        $integrantesL = DB::table('integrantes')
        ->where('integrantes.id_equipo', '=', $equipoL->id)
        ->get();
        $integrantesV = DB::table('integrantes')
        ->where('integrantes.id_equipo', '=', $equipoV->id)
        ->get();
        
        $GL=0;
        $PL=0;
        $AL=0;

        $GV=0;
        $PV=0;
        $AV=0;

        $Ione=1;
        $Itwo=1;

        $golesL = $_POST["golesL"];
        $penalL = $_POST["goles_penalL"];
        $asistenciaL = $_POST["goles_asistenciaL"];

        foreach ($jugadores as $jugador) {
            //goles
            foreach ($integrantesL as $integranteL) {
                if ($integranteL->id_jugador == $jugador->id) {
                    foreach ($golesL as $gol) {
                        $GL = $GL + $gol;
                        if ($Ione == $Itwo) {
                            $jugador->goles = $jugador->goles + $gol;
                        }
                        $Itwo = $Itwo + 1;
                    }
                }
            }
            $Ione = $Ione+1;
            $jugador->update();
        }
        $Itwo=1;
        $Ione=
        foreach ($jugadores as $jugador) {
            //penales
            foreach ($integrantesL as $integranteL) {
                if ($integranteL->id_jugador == $jugador->id) {
                    foreach ($penalL as $penal) {
                        $GL = $GL + $penal;
                        if ($Ione == $Itwo) {
                            $jugador->goles_penal = $jugador->goles_penal + $penal;
                        }
                        $Itow = $Itwo + 1;
                    }
                }
            }
            $Ione = $Ione + 1;
        }
        
        $golesV = $_POST["golesV"];
        $penalV = $_POST["goles_penalV"];
        $asistenciaV = $_POST["goles_asistenciaV"];
        */
        
        $partidoid = request('id_partido');
        $local = request('local');
        $visitante = request('visitante');
        //$checar = Resultado::where('id_partido','LIKE','%' . $id . '%')->first();
        $resultado = new Resultado();
        $localGoles = request('localG');
        $visitanteGoles = request('visitanteG');
        $partido = Partido::findOrFail($partidoid);
        //dd($partido);
        $equipo1 = Equipo::findOrFail($local);
        $equipo2 = Equipo::findOrFail($visitante);
        //foreach ($checar as $chec ) {
            //if ($checar->id_partido == $id) {
                 
                //dd("partido ya existe");
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
        //$checar->delete();
        $equipo1->update();
        $equipo2->update();
        $resultado->save();

        return redirect('/partidos');
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id) 
    {
        /*
        $partido = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();
        //->get();
        //->paginate(5);  
        $partidoo = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*', 'equipos.*')
        ->where('partidos.id', '=', $id)->first();
        //->get();
        /*echo "<pre>";
        print_r($partido);***********
        $partidoID = $id;
        return view('datos.resultadosCreate', ['partido'=>$partido, 'partidoo'=>$partidoo,'partidoID'=>$partidoID]);
        */
    }
    
    public function update(Request $request, $id)
    {
        /*
        //$checar = Resultado::where('id_partido','LIKE','%' . $id . '%')->first();
        $resultado = new Resultado();
        $localGoles = request('localG');
        $visitanteGoles = request('visitanteG');
        $partido = Equipo::findOrFail($id);
        //dd($partido);
        $equipo1 = Equipo::findOrFail($partido->id_local);
        $equipo2 = Equipo::findOrFail($partido->id_visitante);
        //foreach ($checar as $chec ) {
            //if ($checar->id_partido == $id) {
                 
                //dd("partido ya existe");
                if ($localGoles > $visitanteGoles) {
                    $resultado->id_ganador = request('local');
                    $resultado->id_perdedor = request('visitante');
                    $resultado->goles_ganador = $localGoles;
                    $resultado->goles_perdedor = $visitanteGoles;

                    $equipo1->victorias = $equipo1->victoria + 1;
                    $equipo1->puntos = $equipo1->puntos + 3;
                    

                    $equipo2->derrotas = $equipo2->derrotas+1;
                    $equipo2->puntos = $equipo2->puntos + 0;
                    

                } elseif ($visitanteGoles > $localGoles) {
                    $resultado->id_ganador = request('visitante');
                    $resultado->id_perdedor = request('local');
                    $resultado->goles_ganador = $localGoles;
                    $resultado->goles_perdedor = $visitanteGoles;

                    $equipo2->victorias = $equipo2->victoria + 1;
                    $equipo2->puntos = $equipo2->puntos + 3;

                    $equipo1->derrotas = $equipo1->derrotas+1;
                    $equipo1->puntos = $equipo1->puntos + 0;
                }else {
                    
                    $resultado->goles_ganador = $localGoles;
                    $resultado->goles_perdedor = $visitanteGoles;

                    $equipo1->empates = $equipo1->victoria + 1;
                    $equipo1->puntos = $equipo1->puntos + 0;

                    $equipo2->empates = $equipo2->empates+1;
                    $equipo2->puntos = $equipo2->puntos + 0;
                }
                $equipo1->goles_favor=$equipo1->goles_favor + $localGoles;
                $equipo1->goles_contra = $equipo1->goles_contra + $visitanteGoles;

                $equipo2->goles_favor=$equipo2->goles_favor + $visitanteGoles;
                $equipo2->goles_contra = $equipo2->goles_contra + $localGoles;
                
                $resultado->id_partido = $id;
                //$checar->delete();
                $equipo1->update();
                $equipo2->update();
                $resultado->save();

                return redirect('/partidos');
            /*} else {
                dd("partido no existe");
                if ($localGoles > $visitanteGoles) {
                    $resultado->id_ganador = request('local');
                    $resultado->id_perdedor = request('visitante');

                    $resultado->goles_ganador = $localGoles;
                    $resultado->goles_perdedor = $visitanteGoles;
                } elseif ($visitanteGoles > $localGoles) {
                    $resultado->id_ganador = request('visitante');
                    $resultado->id_perdedor = request('local');

                    $resultado->goles_ganador = $visitanteGoles;
                    $resultado->goles_perdedor = $localGoles;
                }else {
                    $resultado->goles_ganador = $localGoles;
                    $resultado->goles_perdedor = $visitanteGoles;
                }

                $resultado->id_partido = $id;
                $resultado->save();

                //break;
                return redirect('/partidos');
            }*/
            
        //}
        
        /*
        $resultado = new Resultado();

        $resultado->id_ganador = request('ganador');
        $resultado->id_perdedor = request('perdedor');
        $resultado->goles_ganador = request('golesG');
        $resultado->goles_perdedor = request('golesP');
        $resultado->id_partido = $id;
        $resultado->save();
        */
        //return redirect('/partidos');
    }
    
    public function destroy($id)
    {
        //
    }
}
