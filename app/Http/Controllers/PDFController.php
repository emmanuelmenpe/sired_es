<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Arbitros;
use App\Canchas;
use App\Jugador;
use App\Liga;
use App\Categoria;
use App\Resultado;
use App\Rama;
use App\Integrantes;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function PDF(){
        /* vertical
        $ramas = Rama::all();
        $categorias = Categoria::all();
        $equipos = DB::table('equipos')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->orderBy('puntos', 'desc')
        ->get(); 
        
        $pdf = \PDF::loadView('prueba',['equipos'=>$equipos,'ramas'=>$ramas, 'categorias'=>$categorias]);
        return $pdf->download('prueva.pdf');
        //return $pdf->stream('prueba.pdf');
        */
        $ramas = Rama::all();
        $categorias = Categoria::all();
        $equipos = DB::table('equipos')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->orderBy('puntos', 'desc')
        ->get(); 
        
        $pdf = \PDF::loadView('PDF.prueba',['equipos'=>$equipos,'ramas'=>$ramas, 'categorias'=>$categorias]);
        //return $pdf->download('prueva.pdf');
        return $pdf->setpaper('a4','landscape')->stream('prueba.pdf');
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
        //return $pdf->download('prueva.pdf');
        return $pdf->stream('partidos.pdf');
        
        
    }

    public function PDFResultados(){
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
