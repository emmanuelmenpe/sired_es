<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partido;
use App\Resultado;
use Illuminate\Support\Facades\DB;

class ResultadoController extends Controller
{
    public function index()
    {
        $partidos = DB::table('resultados')
        ->join('partidos', 'partidos.id', '=', 'resultados.id_partido')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
        ->select('partidos.*', 'resultados.*','equipos.nombre')
        ->get();
        //->paginate(5);
        $partidoss = DB::table('resultados')
        ->join('partidos', 'partidos.id', '=', 'resultados.id_partido')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*', 'resultados.*','equipos.nombre')
        ->get();
        return view('datos.resultados', ['partidos'=>$partidos,'partidoss'=>$partidoss]);
    }
    
    public function create()
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
        //echo "<pre>";
        //print_r($partido);
        return view('datos.resultadosCreate', ['partido'=>$partido, 'partidoo'=>$partidoo]);*/
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
        print_r($partido);*/
        $partidoID = $id;
        return view('datos.resultadosCreate', ['partido'=>$partido, 'partidoo'=>$partidoo,'partidoID'=>$partidoID]);
    }
    
    public function update(Request $request, $id)
    {
        $checar = Resultado::all();

        foreach ($checar as $chec ) {
            if ($chec->id_partido == $id) {
                $resultado = new Resultado();

                $resultado->id_ganador = request('ganador');
                $resultado->id_perdedor = request('perdedor');
                $resultado->goles_ganador = request('golesG');
                $resultado->goles_perdedor = request('golesP');
                $resultado->id_partido = $id;
                $resultado->update();

                return redirect('/partidos');
            } else {

                $resultado = new Resultado();

                $resultado->id_ganador = request('ganador');
                $resultado->id_perdedor = request('perdedor');
                $resultado->goles_ganador = request('golesG');
                $resultado->goles_perdedor = request('golesP');
                $resultado->id_partido = $id;
                $resultado->save();

                return redirect('/partidos');
            }
            
        }
        

        $resultado = new Resultado();

        $resultado->id_ganador = request('ganador');
        $resultado->id_perdedor = request('perdedor');
        $resultado->goles_ganador = request('golesG');
        $resultado->goles_perdedor = request('golesP');
        $resultado->id_partido = $id;
        $resultado->save();

        return redirect('/partidos');
    }
    
    public function destroy($id)
    {
        //
    }
}
