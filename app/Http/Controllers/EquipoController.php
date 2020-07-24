<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Jugador;
use App\Liga;
use App\Categoria;
use App\Rama;
use App\Integrantes;
use Illuminate\Http\Request;


class EquipoController extends Controller
{
    
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $equipos = Equipo::where('nombre','LIKE','%' . $query . '%')
            ->orderBy('id', 'asc')
            //->get();
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
        $equipo = Equipo::findOrFail($id);
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
        $equipo = Equipo::findOrFail($id);
        $ligas = Liga::all();
        $ramas = Rama::all();
        $categorias = Categoria::all();
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
