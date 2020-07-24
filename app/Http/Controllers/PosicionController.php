<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;

class PosicionController extends Controller
{
    
    public function index()
    {
        $equipos = Equipo::all();
        return view('datos.posiciones', ['equipos'=>$equipos]);
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
