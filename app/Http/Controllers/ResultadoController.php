<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;

class ResultadoController extends Controller
{
    public function index()
    {
        return view('datos.resultados');
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
