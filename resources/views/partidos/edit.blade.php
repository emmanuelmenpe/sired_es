@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Actualizar partido</h1>
    <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
        @method('PATCH')
        @csrf
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="cancha">Cancha</label>
                    <input type="text" class="form-control" name="cancha" value="{{$partido->cancha}}" placeholder="Nombre de cancha">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="arbitro">Arbitro</label>
                    <input type="text" class="form-control" name="arbitro" value="{{$partido->arbitro}}" placeholder="Nombre del arbitro">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="fecha">fecha</label>
                    <input class="form-control" type="date" value="{{$partido->fecha}}" name="fecha">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input class="form-control" type="time" value="{{$partido->hora}}" name="hora">
                </div>
            </div>
        </div>
        <!--{{--
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="id_local">Equipo local</label>
                <select name="id_local" class="form-control">
                <option selected disabled>-</option>
                @foreach ($equipos as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="id_visitante">Equipo vistante</label>
                <select name="id_visitante" class="form-control">
                <option selected disabled>-</option>
                @foreach ($equipos as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
                </select>
            </div>
        </div>
        --}}-->
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection