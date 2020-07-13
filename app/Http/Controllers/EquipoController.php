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
    
    public function index()
    {
        return view('equipos.index', ['equipos'=>Equipo::all()]);
        
    }
    
    public function create()
    {
        return view('   equipos.create');
    }
    
    public function store(Request $request)
    {
        //
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
