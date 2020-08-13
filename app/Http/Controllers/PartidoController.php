<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartidoRequest;
use Illuminate\Support\Facades\DB;
use App\Equipo;
use App\Integrantes;
use App\Resultado; 
use App\Partido;
use App\Canchas;
use App\Arbitros;

class PartidoController extends Controller 
{
    public function mostrarVisitante($id_local)
    {
        $equiposV = DB::table('equipos')
        ->where('id','<>',  $id_local)
        ->get();
        return $equiposV;
    }

    public function index(Request $request)
    {
        $equipos = Equipo::all();
        $resultados = Resultado::all();
        //return view('partidos.index', ['partidos'=>Partido::all(), 'equipos'=>Equipo::all()]);
        $partidos = DB::table('partidos')
        //->where('nombre','LIKE','%' . $query . '%')
        ->orderBy('id', 'desc')
        ->join('canchas', 'canchas.id', '=', 'partidos.id_cancha')
        ->join('arbitros', 'arbitros.id', '=', 'partidos.id_arbitro')
        //->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*','canchas.cancha', 'arbitros.arbitro')
        ->get();

        
        //->paginate(5);
        /*echo "<pre>";
        print_r($partidos);*/
        /*$partidoss = DB::table('partidos')
        ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
        ->select('partidos.*', 'equipos.nombre')
        ->get(); 
        /*echo "<pre>";
        print_r($partidoss);*/
        return view('partidos.index', ['partidos'=>$partidos, 'equipos'=>$equipos, 'resultados'=>$resultados]);
        
    }

    public function create(){
    
        $equipos = Equipo::all();
        $integrantes = Integrantes::all();
        $canchas = Canchas::all();
        $abitros = Arbitros::all();
        return view('partidos.create', ['equipos'=>$equipos,'integrantes'=>$integrantes, 
        'canchas'=>$canchas, 'arbitros'=>$abitros]);
    }
    
    public function store(PartidoRequest $request)
    {
        $partido = new Partido();
 
        $partido->id_arbitro = $request->arbitro;
        $partido->id_cancha = $request->cancha;
        $partido->fecha = $request->fecha;
        $partido->hora = $request->hora;
        $partido->id_local = $request->local;
        $partido->id_visitante = $request->visitante;

        $partido->save();
        return redirect('/partidos');
    }
    
    public function show($id)
    {
        //
    } 
    
    public function edit($id)
    {
        $partido = Partido::findOrFail($id);//->first();
        //dd($partido);
        $canchas = Canchas::all();
        $arbitros = Arbitros::alL();
        return view('partidos.edit',['partido' => $partido, 'canchas'=>$canchas, 'arbitros'=>$arbitros]);
    }
    
    public function update(Request $request, $id)
    {
        $partido = Partido::findOrFail($id);//->first();
       //dd($partido);
        /*
        $canchaB = $request->get('canchaB');
        $arbitroB = $request->get('arbitroB');

        $cancha = Canchas::findOrFail($cnahcB);
        $arbitro = Arbitros::findOrFail($arbitroB);
        
        $cancha->cancha*/
        $partido->id_cancha = $request->get('cancha');
        $partido->id_arbitro = $request->get('arbitro');
        $partido->fecha = $request->get('fecha');
        $partido->hora = $request->get('hora');

        $partido->update();

        return redirect('/partidos');
    }
    
    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        
        $partido->delete();
        
        return redirect('/partidos');
    }
}
