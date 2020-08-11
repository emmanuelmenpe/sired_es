@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Jugador</h1>
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
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre</label> 
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de jugador">
                </div>
 
            
                <div class="form-group col-md-4">
                    <label for="curp">CURP</label>
                    <input type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();" name="curp" minlength="18" maxlength="18"  placeholder="agregue CURP del jugador">
                </div>
            
                <div class="form-group col-md-4">
                    <label for="fotografia">Fotografía</label>
                    <input type="file" name="fotografia" class="form-control"> 
                </div>     
                <input type="hidden" name="id_equipo" value="{{$id}}">

                {{-- <div class="form-group col-md-3">
                   <label for="id_equipo">Equipo al que pertenece</label>
                    <select name="id_equipo" class="form-control" required>
                        <option selected>-</option>
                        @foreach ($equipos as $equipo) 
                            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>--}}
            </div>
            @php
                $i=0;
                foreach ($jugadores as $jugador ) {
                    if ($equipo->id == $jugador->id_equipo) {
                        if ($jugador->manager == 1) {
                            $i=$i+1;

                        }
                    }
                }
            @endphp
            @if ($i==0)
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="manager" id="exampleCheck1">
                    <label class="form-check-label" for="manager">Manager</label>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Reguistrar</button>
            <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
          </form>
    </div>
@endsection