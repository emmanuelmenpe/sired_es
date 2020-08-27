<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JugadorRequest;
use Illuminate\Support\Facades\DB;
use App\Posiciones;
use App\Jugador;
use App\Integrantes;

class JugadorController extends Controller
{
    public function create(Request $request, $id)
    {
        $posiciones = Posiciones::all();
        return view('jugadores.create',['id'=>$id, 'posiciones'=>$posiciones]);
    }
    
    public function store(JugadorRequest $request)
    {
        $jugador = new Jugador();
        $integrante = new Integrantes(); 

        $jugador->nombre = $request->nombre;
        $jugador->curp = $request->curp;
 
        if ($request->hasFile('fotografia')) {
            $file = $request->fotografia;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $jugador->fotografia = $file->getClientOriginalName();
        }

        $jugador->id_posicion = $request->posicion;
        $jugador->save();
        
        $integrante->id_equipo = request('id_equipo'); 
        $jugadorl = Jugador::all()->last();
        $integrante->id_jugador = $jugadorl->id;
        $integrante->save();

        return redirect('equipos/'.$integrante->id_equipo);
    }

    public function show($id)
    {
        $jugador = Jugador::findOrFail($id);
        $historiales = DB::table('historials')
        ->join('sancions', 'sancions.id', '=', 'historials.id_sancion')
        ->select('historials.*','sancions.*')
        ->get();
        return view('jugadores.show',['jugador'=>$jugador, 'historiales'=>$historiales]);
    }
    
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugadores.edit', ['jugador'=>$jugador]);
    }
    
    public function update(Request $request, $id)
    {
        $jugador = Jugador::findOrFail($id);
        $equipo = DB::table('integrantes')
        ->where('id_jugador','LIKE','%' . $jugador->id . '%')
        ->first();

        $jugador->nombre = $request->nombre;
        $jugador->curp = $request->curp;
        $jugador->goles = $request->goles;
        $jugador->goles_penal = $request->penal;
        $jugador->goles_asistencia = $request->asistencia;
        if ($request->hasFile('fotografia')) { 
            $file = $request->fotografia;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $jugador->fotografia = $file->getClientOriginalName();
        }  

        $jugador->update();
        
        return redirect('equipos/'.$equipo->id_equipo);
         
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
