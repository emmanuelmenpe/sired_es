<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Arbitros;
use App\Canchas;
use App\Resultado;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function PDFEquipos(){
        $equipos = DB::table('equipos')
        ->orderBy('puntos', 'desc') 
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->select('equipos.*','ramas.rama', 'categorias.categoria')
        ->get();
        $pdf = \PDF::loadView('pdf.equipos', ['equipos'=>$equipos]);
        return $pdf->stream('equipos.pdf');
    }

    public function PDFPartidos(){
        $equipos = Equipo::all();
        $resultados = Resultado::all();
        
        $partidos = DB::table('partidos')
        ->orderBy('id', 'desc')
        ->join('canchas', 'canchas.id', '=', 'partidos.id_cancha')
        ->join('arbitros', 'arbitros.id', '=', 'partidos.id_arbitro')
        ->select('partidos.*','canchas.cancha', 'arbitros.arbitro')
        ->get();
        $pdf = \PDF::loadView('PDF.partidos', ['partidos'=>$partidos, 'equipos'=>$equipos, 'resultados'=>$resultados]);
        return $pdf->stream('partidos.pdf');
        
        
    }

    public function PDFResultados(){
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
        $pdf = \PDF::loadView('PDF.resultados', ['partidos'=>$partidos,'partidoss'=>$partidoss]);
        return $pdf->stream('resultados.pdf');
    }

    public function PDFAnotaciones(){
        
        $equipos = DB::table('equipos')  
        ->get();
        $jugadores = DB::table('jugadors')
        ->join('integrantes', 'integrantes.id_jugador', 'jugadors.id')
        ->select('integrantes.*', 'jugadors.*')
        ->orderBy('goles', 'desc');
        $jugadores = $jugadores->get(); 
        
        $pdf = \PDF::loadView('PDF.anotaciones',['jugadores'=>$jugadores, 'equipos'=>$equipos]);
        return $pdf->stream('anotaciones.pdf');
    }

    public function PDFCanchas(){
        $canchas = Canchas::all();
        $pdf = \PDF::loadView('PDF.canchas',['canchas'=>$canchas]);
        return $pdf->stream('canchas.pdf');
    }

    public function PDFPArbitros(){
        $arbitros = Arbitros::all();
        $pdf = \PDF::loadView('PDF.arbitros',['arbitros'=>$arbitros]);
        return $pdf->stream('arbitros.pdf');
    }
}
