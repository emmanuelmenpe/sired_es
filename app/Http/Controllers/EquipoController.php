<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Jugador;
use App\Liga;
use App\Categoria;
use App\Rama;
use App\Integrantes;
use Illuminate\Http\Request;
use App\Http\Requests\EquipoRequest;
use Illuminate\Support\Facades\DB;


class EquipoController extends Controller
{
    
    public function index(Request $request)
    {
        $equipos = DB::table('equipos')
        ->orderBy('puntos', 'desc') 
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->select('equipos.*','ramas.rama', 'categorias.categoria')
        ->paginate(7);  
        return view('equipos.index', ['equipos'=>$equipos]);
    }
    
    public function create()
    {
        $ramas = Rama::all();
        $categorias = Categoria::all();
        return view('equipos.create', ['ramas'=>$ramas, 'categorias'=>$categorias]);
    }
    
    public function store(EquipoRequest $request)
    {
        $equipo = new Equipo();

        $equipo->nombre = $request->nombre;
        
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $equipo->logo = $file->getClientOriginalName();
        }
        
        $equipo->id_rama = $request->rama;
        $equipo->id_categoria = $request->categoria;

        $equipo->save();

        return redirect('/equipos');
    }

    public function show($id)
    {
        $equipo = DB::table('equipos') 
        ->join('ramas', 'equipos.id_rama', '=', 'ramas.id')
        ->join('categorias', 'equipos.id_categoria', '=', 'categorias.id')
        ->select('ramas.rama','categorias.categoria','equipos.*')
        ->where('equipos.id', '=', $id)->first();
        $jugadores = DB::table('jugadors')
        ->join('integrantes', 'integrantes.id_jugador', 'jugadors.id')
        ->join('posiciones', 'posiciones.id', 'jugadors.id_posicion')
        ->select('integrantes.*', 'jugadors.*', 'posiciones.posicion');
        $jugadores = $jugadores->get(); 
        return view('equipos.show',['equipo' =>  $equipo, 'jugadores'=> $jugadores]);
    }
    
    public function edit($id)
    {
        $ramas = Rama::all();
        $categorias = Categoria::all();
        $equipo = DB::table('equipos') 
        ->join('ramas', 'equipos.id_rama', '=', 'ramas.id')
        ->join('categorias', 'equipos.id_categoria', '=', 'categorias.id')
        ->select('ramas.*','categorias.*','equipos.*')
        ->where('equipos.id', '=', $id)->first();
        return view('equipos.edit', ['equipo'=>$equipo,'ramas'=>$ramas, 'categorias'=>$categorias]);
    }
    
    public function update(Request $request, $id)
    { 
        $equipo = Equipo::findOrFail($id);
        $equipo->nombre = $request->nombre;
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $equipo->logo = $file->getClientOriginalName();
        }   
        $equipo->update();

        return redirect('/equipos');
    }
    
    public function destroy($id) 
    {
        $equipo = Equipo::findOrFail($id);
        
        $equipo->delete();

        return redirect('/equipos');
    }
}
