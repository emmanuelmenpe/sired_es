<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartidoRequest;
use Illuminate\Support\Facades\DB;
use App\Equipo; 
use App\Partido;

class PartidoController extends Controller 
{
    public function index(Request $request)
    {
        if($request){  
            $query = trim($request->get('search'));

            //return view('partidos.index', ['partidos'=>Partido::all(), 'equipos'=>Equipo::all()]);
            $partidos = DB::table('partidos')
            ->where('nombre','LIKE','%' . $query . '%')
            ->orderBy('id', 'asc')
            ->join('equipos', 'equipos.id', '=', 'partidos.id_local')
            //->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
            ->select('partidos.*', 'equipos.nombre')
            //->get(); 
            ->paginate(5);
            /*echo "<pre>";
            print_r($partidos);*/
            $partidoss = DB::table('partidos')
            ->join('equipos', 'equipos.id', '=', 'partidos.id_visitante')
            ->select('partidos.*', 'equipos.nombre')
            ->get(); 
            /*echo "<pre>";
            print_r($partidoss);*/
            return view('partidos.index', ['partidos'=>$partidos, 'partidoss'=>$partidoss, 'search' => $query]);
        }
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.create', ['equipos'=>$equipos]);
    }
    
    public function store(Request $request)
    {
        $partido = new Partido();
 
        $partido->cancha = request('cancha');
        $partido->arbitro = request('arbitro');
        $partido->cancha = request('cancha');
        $partido->fecha = request('fecha');
        $partido->hora = request('hora');
        $partido->id_local = request('id_local');
        $partido->id_visitante = request('id_visitante');

        $partido->save();
        return redirect('/partidos');
    }
    
    public function show($id)
    {
        //
    } 
    
    public function edit($id)
    {
        $partido = Partido::findOrFail($id);
        return view('partidos.edit',['partido' => $partido]);
    }
    
    public function update(Request $request, $id)
    {
        $partido = Partido::findOrFail($id);
        
        $partido->cancha = $request->get('cancha');
        $partido->arbitro = $request->get('arbitro');
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
