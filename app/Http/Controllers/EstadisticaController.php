<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipo;

class EstadisticaController extends Controller
{
    
    public function index()
    {
        //$equipos = Equipo::all();
        $equipos = DB::table('equipos')
        ->join('ligas', 'ligas.id', '=', 'equipos.id_liga')
        ->join('ramas', 'ramas.id', '=', 'equipos.id_rama')
        ->join('categorias', 'categorias.id', '=', 'equipos.id_categoria')
        ->select('equipos.*', 'ligas.liga','ramas.rama', 'categorias.categoria')
        //->get(); 
        ->paginate(5);
        return view('datos.estadisticas',['equipos'=>$equipos]);
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
