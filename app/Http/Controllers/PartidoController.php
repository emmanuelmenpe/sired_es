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
        return view('partidos.create');
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
