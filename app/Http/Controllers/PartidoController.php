<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo; 
use App\Partido;

class PartidoController extends Controller
{
    public function index()
    {
        //return view('partidos.index', ['partidos'=>Partido::all(), 'equipos'=>Equipo::all()]);
        return view('partidos.index', ['partidos'=>Partido::all()]);
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
