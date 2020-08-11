<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SancionRequest;
use App\Jugador;
use App\Sancion;
use App\Historial;

class SancionesController extends Controller
{
    
    public function index()
    {
        //
    }
    
    public function create(Request $request, $id)
    {
        return view('jugadores.sancion',['id'=>$id]);
    }
    
    public function store(SancionRequest $request)
    {
        $jugadorid= request('id_jugador');
        $jugador = Jugador::findOrFail($jugadorid);

        $historial = new Historial();
        $sancion = new Sancion();

        $sancion->motivo = $request->motivo;
        $sancion->fecha_sancion = $request->fecha_sancion;
        $sancion->fecha_fin = $request->fin_sancion;

        $sancion->save();
        $sancionL = Sancion::all()->last();

        $historial->id_jugador = $jugador->id;
        $historial->id_sancion = $sancionL->id;
        $historial->save();

        return redirect('jugadores/'.$jugador->id);
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
