<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Jugador;
use App\Liga;
use App\Categoria;
use App\Resultado;
use App\Rama;
use App\Integrantes;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    { 
        $queryC = trim($request->get('filtrarC'));
        $queryR = trim($request->get('filtrarR'));

        $ramas = Rama::all();
        $categorias = Categoria::all();
        $equipos = DB::table('equipos')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->where('categorias.categoria','LIKE','%' . $queryC . '%')
        ->where('ramas.rama','LIKE','%' . $queryR . '%') 
        ->orderBy('puntos', 'desc')
        ->get(); 
        /*
        $equiposJ = DB::table('equipos')
        ->get();
        $jugadores = DB::table('jugadors')
        ->join('integrantes', 'integrantes.id_jugador', 'jugadors.id')
        ->select('integrantes.*', 'jugadors.*')
        ->orderBy('goles', 'desc');
        $jugadores = $jugadores->get();
        */
        return view('index',['equipos'=>$equipos,'ramas'=>$ramas, 'categorias'=>$categorias]);//, 'jugadores'=>$jugadores,'equiposJ'=>$equiposJ]);

        /*
        if($request){  
            $query = trim($request->get('search')); 
            /*
            $equipos = Equipo::where('nombre','LIKE','%' . $query . '%')
            ->orderBy('id', 'asc')
            //->get();  
            ->paginate(5);****diagonal 
            $equipos = DB::table('equipos')
            ->where('nombre','LIKE','%' . $query . '%') 
            ->orderBy('puntos', 'desc') 
            ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
            ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
            ->select('equipos.*','ramas.rama', 'categorias.categoria')
            ->get(); 
            //->paginate(5); 

            //ANOTACIONES
            $Equipos = DB::table('equipos')  
            /*->join('ligas', 'equipos.id_liga', '=', 'ligas.id')
            ->select('ligas.liga','equipos.*')*****diagonal
            //->where('equipos.id_liga', '=', '1');
            ->get();
            //dd($equipos);
            /*$jugadores = Jugador::all();
            $integrantes = Integrantes::all(); ******diagonal
            $Jugadores = DB::table('jugadors')
            //->where('nombre','LIKE','%' . $query . '%')
            ->join('integrantes', 'integrantes.id_jugador', 'jugadors.id')
            ->select('integrantes.*', 'jugadors.*')
            ->orderBy('goles', 'desc');
            $Jugadores = $Jugadores->get();
            
            //partidos programados
            $resultados = Resultado::all();
            //return view('partidos.index', ['partidos'=>Partido::all(), 'equipos'=>Equipo::all()]);
            $partidos = DB::table('partidos')
            //->where('nombre','LIKE','%' . $query . '%')
            //->orderBy('id', 'desc')
            ->join('canchas', 'canchas.id', '=', 'partidos.id_cancha')
            ->join('arbitros', 'arbitros.id', '=', 'partidos.id_arbitro')
            //->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
            ->select('partidos.*','canchas.cancha', 'arbitros.arbitro')
            ->get();

            /*echo "<pre>";
            print_r($partidoss);******diagonal
            
            //resultados
            $partidosR = DB::table('resultados')
            ->join('partidos', 'partidos.id', '=', 'resultados.id_partido')
            ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
            ->select('partidos.*', 'resultados.*','equipos.nombre')
            ->get();
            //->paginate(5);
            $partidossR = DB::table('resultados')
            ->join('partidos', 'partidos.id', '=', 'resultados.id_partido')
            ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
            ->select('partidos.*', 'resultados.*','equipos.nombre')
            ->get();
            
            return view('index', ['equipos'=>$equipos, 'Equipos'=>$Equipos, 'Jugadores'=>$Jugadores, 'partidos'=>$partidos, 'partidoss'=>$partidoss,'resultados'=>$resultados, 'partidosR'=>$partidosR,'partidossR'=>$partidossR, 'search' => $query]);
        }
        //return view('index');*/
    }
}
