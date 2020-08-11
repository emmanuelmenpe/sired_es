<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipo;
use App\Categoria;

class PosicionController extends Controller
{
    
    public function index(Request $request)
    { 
        
        //$equipos = Equipo::orderBy('victorias','DESC')->get();
        //$equipos = Equipo::all();
        $categorias = Categoria::all(); 
        $query = trim($request->get('filtrar')); 

        $categorias = Categoria::all();
        $equipos = DB::table('equipos')
        ->orderBy('victorias','DESC')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->select('equipos.*','ramas.rama', 'categorias.categoria')
        ->where('categorias.categoria','LIKE','%' . $query . '%')
        //->get();
        ->paginate(5);
        return view('datos.posiciones', ['equipos'=>$equipos, 'categorias' => $categorias, 'query'=> $query]);
    }
    
    public function create()
    {
        //
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
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
