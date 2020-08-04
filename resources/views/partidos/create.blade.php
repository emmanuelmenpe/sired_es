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
                    <input type="text" class="form-control" name="cancha" maxlength="255" placeholder="Nombre de cancha" required>
                </div>
            </div>
        
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="arbitro">Arbitro</label>
                    <input type="text" class="form-control" name="arbitro" maxlength="255" placeholder="Nombre del arbitro" required>
                </div>
            </div>
        
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="fecha">fecha</label>
                    <input class="form-control" type="date" name="fecha" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input class="form-control" type="time"  name="hora" required>
                </div>
            </div>
            
            <div class="form-group col-md-4">
                <label for="id_local">Equipo local</label>
                <select name="id_local"  class="form-control" required>
                <option selected disabled>-</option>
                @foreach ($equipos as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label for="id_visitante">Equipo vistante</label>
                <select name="id_visitante" class="form-control" required>
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