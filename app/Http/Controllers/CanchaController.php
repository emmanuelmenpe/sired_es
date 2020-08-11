<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Canchas;

class CanchaController extends Controller
{
    
    public function index()
    {
        $canchas = Canchas::all();
        return view('cancha.index',['canchas'=>$canchas]);
    }
    
    public function create()
    {
        return view('cancha.create');
    }

    public function store(Request $request)
    {
        $cancha = new Canchas();
        
        $cancha->cancha = $request->get('nombre');
        $cancha->direccion = $request->get('direccion');
        $cancha->Cdisponible = $request->get('disponible');
        
        $cancha->save();

        return redirect('/canchas');
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $cancha = Canchas::findOrFail($id);
        return view('cancha.edit',['cancha'=>$cancha]);
    }

    public function update(Request $request, $id)
    {
        $cancha = Canchas::findOrFail($id);
        
        $cancha->cancha = $request->get('nombre');
        $cancha->direccion = $request->get('direccion');
        $cancha->Cdisponible = $request->get('disponible');
        

        $cancha->update();

        return redirect('/canchas');
    }

    public function destroy($id)
    {
        $cancha = Canchas::findOrFail($id);
        
        $cancha->delete();

        return redirect('/canchas');
    }
}
