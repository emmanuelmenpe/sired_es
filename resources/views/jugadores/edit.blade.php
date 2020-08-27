@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Jugador:{{$jugador->nombre}}</h1>
    <div class="text-center">
        <img src="{{ asset('images/'.$jugador->fotografia) }}" height="200px" width="200px" alt="{{ $jugador->fotografia }}">
    </div>
    <br>
    <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$jugador->nombre}}" placeholder="Nombre de jugador" required>
            </div>

        
            <div class="form-group col-md-4">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();" name="curp" minlength="18" maxlength="18" value="{{$jugador->curp}}" placeholder="agregue CURP del jugador" required>
            </div>

            <div class="form-group col-md-4">
                <label>Nueva fotografía </label>
                <input type="file" name="fotografia" class="form-control">
                @if($jugador->fotografia != "")
                    <img src="{{ asset('images/'.$jugador->fotografia) }}" alt="{{ $jugador->fotografia }}" height="50px" width="50px">
                    <small>fotografía actual</small>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="goles">Goles anotados</label>
                <input type="number" class="form-control" name="goles" min="{{$jugador->goles}}" value="{{$jugador->goles}}" placeholder="Goles anotados del jugador" required>
            </div>

            <div class="form-group col-md-4">
                <label for="penal">Goles por penal</label>
                <input type="number" class="form-control" name="penal" min="{{$jugador->goles_penal}}" value="{{$jugador->goles_penal}}" placeholder="Goles por penal del jugador" required>
            </div>

            <div class="form-group col-md-4">
                <label for="asistencia">Asistencia a gol</label>
                <input type="number" class="form-control" name="asistencia" min="{{$jugador->goles_asistencia}}" value="{{$jugador->goles_asistencia}}" placeholder="Asistencia a gol del jugador" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection