<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipo;
use App\Categoria;
use App\Rama;

class EstadisticaController extends Controller
{
    
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $ramas = Rama::all();
        $queryC = trim($request->get('filtrarC'));
        $queryR = trim($request->get('filtrarR'));
        //$equipos = Equipo::all(); rama categoria
        $equipos = DB::table('equipos') 
        ->join('ligas', 'ligas.id', '=', 'equipos.id_liga')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->select('equipos.*', 'ligas.liga','ramas.rama', 'categorias.categoria')
        ->where('categorias.categoria','LIKE','%' . $queryC . '%')
        ->where('ramas.rama','LIKE','%' . $queryR . '%')
        //->get(); 
        ->paginate(5);
        return view('datos.estadisticas',['equipos'=>$equipos, 'categorias'=>$categorias, 'ramas'=>$ramas, 'queryC'=> $queryC, 'queryR'=> $queryR]);
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
