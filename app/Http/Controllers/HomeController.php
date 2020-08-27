<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Rama;
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
        return view('index',['equipos'=>$equipos,'ramas'=>$ramas, 'categorias'=>$categorias]);
    }
}
