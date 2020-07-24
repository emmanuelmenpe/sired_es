@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Jugador:{{$jugador->nombre}}</h1>
    <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        
        <div class="row">
            <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$jugador->nombre}}" placeholder="Nombre de jugador">
            </div>

            <div class="form-group col-md-4">
            <label for="curp">CURP</label>
            <input type="text" class="form-control" name="curp" value="{{$jugador->curp}}" placeholder="agregue CURP del jugador">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Imagen</label>
                <input type="file" name="fotografia" class="form-control">
                @if($jugador->fotografia != "")
                    <img src="{{ asset('images/'.$jugador->fotografia) }}" alt="{{ $jugador->fotografia }}" height="50px" width="50px">
                @endif
            </div>

            <div class="form-group col-md-4">
                <label for="id_equipo">Equipo al que pertenece</label>
                <select name="id_equipo" class="form-control">
                    <option selected>-</option>
                    @foreach ($equipos as $equipo)
                        <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

        <div class="row">
            <div class="form-group col-md-4">
            <label for="sancion">Sancionado</label>
            <select name="sancion" class="form-control">
                @if ($jugador->sancion == 0)
                    <option value="0" selected>NO</option>
                    <option value="1">SI</option>
                @else
                    <option value="0">NO</option>
                    <option value="1" selected>SI</option>
                @endif
                
            </select>
            </div>
            <div class="form-group col-md-4">
                <label for="fecha_sancion">Fecha de sancion <small>(opcional)</small></label>
                <input class="form-control" type="date" value="{{$jugador->fecha_sancion}}" name="fecha_sancion">
            </div>
            <div class="form-group col-md-4">
                <label for="fecha_fin">Fin de sancion <small>(opcional)</small></label>
                <input class="form-control" type="date" value="{{$jugador->fecha_fin}}" name="fecha_fin">
            </div>
        </div>

        <div class="form-group col-md-4">
        <label for="motivo">Motivo de sancion<small>(opcional)</small></label>
        <br>
        <textarea name="motivo" cols="50" rows="10" >{{$jugador->motivo}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
      </form>
</div>
@endsection