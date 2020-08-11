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
        if($request){  
            $query = trim($request->get('search')); 
            /*$equipos = Equipo::where('nombre','LIKE','%' . $query . '%')
            ->orderBy('id', 'asc')
            //->get(); 
            ->paginate(5);*/ 
            $equipos = DB::table('equipos')
            ->where('nombre','LIKE','%' . $query . '%') 
            ->orderBy('puntos', 'desc') 
            ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
            ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
            ->select('equipos.*','ramas.rama', 'categorias.categoria')
            //->get() 
            ->paginate(5);  
            return view('equipos.index', ['equipos'=>$equipos, 'search' => $query]);
        }
        //return view('equipos.index', ['equipos'=>Equipo::all()]);
        
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
        //$equipo = Equipo::findOrFail($id);
        /*$equipo = Equipo::findOrFail($id)
        ->join('ligas', 'equipos.id_liga', '=', 'ligas.id')
        ->select('ligas.*')
        ->get();*/
        $equipo = DB::table('equipos') 
        ->join('ramas', 'equipos.id_rama', '=', 'ramas.id')
        ->join('categorias', 'equipos.id_categoria', '=', 'categorias.id')
        ->select('ramas.rama','categorias.categoria','equipos.*')
        ->where('equipos.id', '=', $id)->first();
        //->get();
        /*$jugadores = Jugador::all();
        $integrantes = Integrantes::all(); */
        $jugadores = DB::table('jugadors')
        ->join('integrantes', 'integrantes.id_jugador', 'jugadors.id')
        ->select('integrantes.*', 'jugadors.*');
        $jugadores = $jugadores->get(); 
        return view('equipos.show',['equipo' =>  $equipo, 'jugadores'=> $jugadores]);
        /*return view('equipos.show',['equipo'=> Equipo::findOrFail($id), 
        'integrantes'=> Integrantes::all(),
        'jugadores'=>Jugador::all()  ]);
        dd('integrantes');*/

    }
    
    public function edit($id)
    {
        //$equipo = Equipo::findOrFail($id);
        $ramas = Rama::all();
        $categorias = Categoria::all();
        $equipo = DB::table('equipos') 
        ->join('ramas', 'equipos.id_rama', '=', 'ramas.id')
        ->join('categorias', 'equipos.id_categoria', '=', 'categorias.id')
        ->select('ramas.*','categorias.*','equipos.*')
        ->where('equipos.id', '=', $id)->first();
        //dd($equipo);
        /*
        $equipo = DB::table('equipos')
        ->findOrFail($id)
        ->join('ligas', 'ligas.id', '=', 'equipos.id_liga')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->select('equipos.*', 'ligas.liga','ramas.rama', 'categorias.categoria')
        ->get();*/
        return view('equipos.edit', ['equipo'=>$equipo,'ramas'=>$ramas, 'categorias'=>$categorias]);

    }
    
    public function update(Request $request, $id)
    { 
        $equipo = Equipo::findOrFail($id);
        //dd($equipo);
        $equipo->nombre = $request->nombre;
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $equipo->logo = $file->getClientOriginalName();
        }   
        /*
        $equipo->victorias = $request->get('victorias');
        $equipo->empates = $request->get('empates');
        $equipo->derrotas = $request->get('derrotas');
        $equipo->id_rama = $request->get('id_rama');
        $equipo->id_categoria = $request->get('id_categoria');
        */
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
