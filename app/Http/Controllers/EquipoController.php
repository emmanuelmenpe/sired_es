<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Jugador;
use App\Liga;
use App\Categoria;
use App\Rama;
use App\Integrantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EquipoController extends Controller
{
    
    public function index(Request $request)
    {
        if($request){  
            $query = trim($request->get('search'));
            /*$equipos = Equipo::where('nombre','LIKE','%' . $query . '%')
            ->orderBy('id', 'asc')
            //->get(); 
            ->paginate(5);*/ 
            $equipos = DB::table('equipos')
            ->where('nombre','LIKE','%' . $query . '%')
            ->orderBy('id', 'asc') 
            ->join('ligas', 'ligas.id', '=', 'equipos.id_liga')
            ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
            ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
            ->select('equipos.*', 'ligas.liga','ramas.rama', 'categorias.categoria')
            //->get() 
            ->paginate(5);
            $equipo = Equipo::all();    
            return view('equipos.index', ['equipos'=>$equipos, 'search' => $query]);
        }
        //return view('equipos.index', ['equipos'=>Equipo::all()]);
        
    }
    
    public function create()
    {
        $ligas = Liga::all();
        $ramas = Rama::all();
        $categorias = Categoria::all();
        return view('equipos.create', ['ligas'=>$ligas, 'ramas'=>$ramas, 'categorias'=>$categorias]);
    }
    
    public function store(Request $request)
    {
        $equipo = new Equipo();

        $equipo->nombre = request('nombre');
        $equipo->victorias = request('victorias');
        $equipo->empates = request('empates');
        $equipo->derrotas = request('derrotas');
        $equipo->id_liga = request('id_liga');
        $equipo->id_rama = request('id_rama');
        $equipo->id_categoria = request('id_categoria');

        $equipo->save();

        return redirect('/equipos');
    }

    public function show($id)
    {
        //$equipo = Equipo::findOrFail($id);
        /*$equipo = Equipo::findOrFail($id)
        ->join('ligas', 'equipos.id_liga', '=', 'ligas.id')
        ->select('ligas.*')
        ->get();*/
        $equipo = DB::table('equipos') 
        ->join('ligas', 'equipos.id_liga', '=', 'ligas.id')
        ->join('ramas', 'equipos.id_rama', '=', 'ramas.id')
        ->join('categorias', 'equipos.id_categoria', '=', 'categorias.id')
        ->select('ligas.liga','ramas.rama','categorias.categoria','equipos.*')
        ->where('equipos.id', '=', $id)->first();
        //->get();
        $jugadores = Jugador::all();
        $integrantes = Integrantes::all(); 

        return view('equipos.show',['equipo' =>  $equipo, 'jugadores'=> $jugadores, 'integrantes' => $integrantes]);
        /*return view('equipos.show',['equipo'=> Equipo::findOrFail($id), 
        'integrantes'=> Integrantes::all(),
        'jugadores'=>Jugador::all()  ]);
        dd('integrantes');*/
    }
    
    public function edit($id)
    {
        //$equipo = Equipo::findOrFail($id);
        $ligas = Liga::all();
        $ramas = Rama::all();
        $categorias = Categoria::all();
        $equipo = DB::table('equipos') 
        ->join('ligas', 'equipos.id_liga', '=', 'ligas.id')
        ->join('ramas', 'equipos.id_rama', '=', 'ramas.id')
        ->join('categorias', 'equipos.id_categoria', '=', 'categorias.id')
        ->select('ligas.*','ramas.*','categorias.*','equipos.*')
        ->where('equipos.id', '=', $id)->first();
        /*
        $equipo = DB::table('equipos')
        ->findOrFail($id)
        ->join('ligas', 'ligas.id', '=', 'equipos.id_liga')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->select('equipos.*', 'ligas.liga','ramas.rama', 'categorias.categoria')
        ->get();*/
        return view('equipos.edit', ['equipo'=>$equipo, 'ligas'=>$ligas, 'ramas'=>$ramas, 'categorias'=>$categorias]);

    }
    
    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);

        $equipo->nombre = $request->get('nombre');
        $equipo->victorias = $request->get('victorias');
        $equipo->empates = $request->get('empates');
        $equipo->derrotas = $request->get('derrotas');
        $equipo->id_liga = $request->get('id_liga');
        $equipo->id_rama = $request->get('id_rama');
        $equipo->id_categoria = $request->get('id_categoria');

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
