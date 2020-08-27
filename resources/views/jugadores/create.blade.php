@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar jugador</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/jugadores" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="nombre">Nombre</label> 
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de jugador">
                </div>
 
            
                <div class="form-group col-md-3">
                    <label for="curp">CURP</label>
                    <input type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();" name="curp" minlength="18" maxlength="18"  placeholder="Agregue CURP del jugador">
                </div>
            
                <div class="form-group col-md-3">
                    <label for="fotografia">Fotografía</label>
                    <input type="file" name="fotografia" class="form-control"> 
                </div>
                
                <div class="form-group col-md-3">
                    <label for="posicion">Posición</label>
                    <select name="posicion" class="form-control">
                    <option selected disabled value="0">-</option>
                    @foreach ($posiciones as $posicion)
                    <option value="{{$posicion->id}}">{{$posicion->posicion}}</option> 
                    @endforeach
                    </select>
                </div>

                <input type="hidden" name="id_equipo" value="{{$id}}"> 
            </div>
            <button type="submit" class="btn btn-primary">Reguistrar</button>
            <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
          </form>
    </div>
@endsection