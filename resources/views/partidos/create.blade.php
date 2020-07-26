@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear equipo</h1>
    <form action="/partidos" method="POST">
        @csrf
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="cancha">Cancha</label>
                    <input type="text" class="form-control" name="cancha" placeholder="Nombre de cancha">
                </div>
            </div>
        
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="arbitro">Arbitro</label>
                    <input type="text" class="form-control" name="arbitro" placeholder="Nombre del arbitro">
                </div>
            </div>
        
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="fecha">fecha</label>
                    <input class="form-control" type="date" value="2020-01-15" name="fecha">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input class="form-control" type="time" value="12:00:00" name="hora">
                </div>
            </div>
            
            <div class="form-group col-md-4">
                <label for="id_local">Equipo local</label>
                <select name="id_local"  class="form-control @error('id_local') is-invalid @enderror">
                <option selected disabled>-</option>
                @foreach ($equipos as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label for="id_visitante">Equipo vistante</label>
                <select name="id_visitante" class="form-control @error('id_visitante') is-invalid @enderror">
                <option selected disabled>-</option>
                @foreach ($equipos as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection