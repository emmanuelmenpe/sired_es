<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arbitros;

class ArbitroController extends Controller
{
    public function index()
    {
        $arbitros = Arbitros::all();
        return view('arbitro.index',['arbitros'=>$arbitros]);
    }
    
    public function create()
    {
        return view('arbitro.create');
    }
    
    public function store(Request $request)
    {
        $arbitro = new Arbitros();
        
        $arbitro->arbitro = $request->get('nombre');
        $arbitro->disponible = $request->get('disponible');
        if ($request->hasFile('foto')) {
            $file = $request->foto;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $arbitro->foto = $file->getClientOriginalName();
        }   
        

        $arbitro->save();

        return redirect('/arbitros');
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $arbitro = Arbitros::findOrFail($id);
        return view('arbitro.edit',['arbitro'=>$arbitro]);
    }
    
    public function update(Request $request, $id)
    {
        $arbitro = Arbitros::findOrFail($id);
        
        $arbitro->arbitro = $request->get('nombre');
        $arbitro->disponible = $request->get('disponible');
        if ($request->hasFile('foto')) {
            $file = $request->foto;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $arbitro->foto = $file->getClientOriginalName();
        }   
        

        $arbitro->update();

        return redirect('/arbitros');
    }
    
    public function destroy($id)
    {
        $arbitro = Equipo::findOrFail($id);
        
        $arbitro->delete();

        return redirect('/arbitros');
    }
}
