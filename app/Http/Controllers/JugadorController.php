<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipo;
use App\Jugador;
use App\Integrantes;

class JugadorController extends Controller
{
    
    public function index()
    {
        //
    }
    
    public function create()
    {
        $equipos = Equipo::all();
        return view('jugadores.create',['equipos'=>$equipos]);
    }
    
    public function store(Request $request)
    {
        $jugador = new Jugador();
        $integrante = new Integrantes();

        $jugador->nombre = request('nombre');
        $jugador->curp = request('curp');

        if ($request->hasFile('fotografia')) {
            $file = $request->fotografia;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $jugador->fotografia = $file->getClientOriginalName();
        }

        $jugador->sancion = request('sancion');
        $jugador->motivo = request('motivo'); 
        $jugador->fecha_sancion = request('fecha_sancion');
        $jugador->fecha_fin = request('fecha_fin');    

        $jugador->save();
        
        $integrante->id_equipo = request('id_equipo');
        $jugadorl = Jugador::all()->last();
        $integrante->id_jugador = $jugadorl->id;
        $integrante->save();

        return redirect('equipos/'.$integrante->id_equipo);
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        $equipos = Equipo::All();

        return view('jugadores.edit', ['jugador'=>$jugador, 'equipos'=>$equipos]);
    }
    
    public function update(Request $request, $id)
    {
        $jugador = Jugador::findOrFail($id);

        $jugador->nombre = request('nombre');
        $jugador->curp = request('curp');

        if ($request->hasFile('fotografia')) { 
            $file = $request->fotografia;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $jugador->fotografia = $file->getClientOriginalName();
        }

        $jugador->sancion = request('sancion');
        $jugador->motivo = request('motivo');
        $jugador->fecha_sancion = request('fecha_sancion');
        $jugador->fecha_fin = request('fecha_fin');    

        $jugador->update();
        
        //return redirect()->back();
        return redirect('/equipos');
        
    }
    
    public function destroy($id)
    {
        $integrante = DB::table('integrantes')
        ->where('integrantes.id_jugador', '=', $id);
        $integrante->delete();

        $jugador = Jugador::findOrFail($id);
        $jugador->delete();

        return redirect()->back();
    }
}
