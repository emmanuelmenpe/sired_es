@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agendar partido</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/partidos" method="POST">
        @csrf

        <div class="form-row">
            
            <div class="form-group col-md-4">
                <label for="local">Equipo local</label>
                <select name="local"  class="form-control" id="equipoL">
                <option selected disabled>-</option>
                @foreach ($equipos as $equipo)
                    @php
                        $i=0;
                        foreach ($integrantes as $integrante) {
                            if ($integrante->id_equipo == $equipo->id) {
                                $i=$i+1;
                            }
                        }
                    @endphp
                    @if ($i>=7)
                        <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                    @endif
                @endforeach
                </select>
                
            </div> 
            
            <div class="form-group col-md-4">
                <label for="visitante">Equipo vistante</label>
                <select name="visitante" class="form-control" id="equipoV">
                    <option selected disabled>-</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="cancha">Cancha</label>
                    <select name="cancha" class="form-control">
                        <option selected disabled>-</option>
                        @foreach ($canchas as $cancha)
                            @if ($cancha->Cdisponible == 1)
                                <option value="{{$cancha->id}}">{{$cancha->cancha}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="arbitro">Árbitro</label>
                    <select name="arbitro" class="form-control">
                        <option selected disabled>-</option>
                        @foreach ($arbitros as $arbitro)
                            @if ($arbitro->disponible == 1)
                                <option value="{{$arbitro->id}}">{{$arbitro->arbitro}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input class="form-control" type="time"  name="hora">
                </div>
            </div>
            
            @php
                date_default_timezone_set('America/Mexico_city');
                $fecha = date ("d/m/Y");
                $hora = date ("H:m");
            @endphp

            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                <input class="form-control" type="date" name="fecha" min="{{$fecha}}">
                </div>
            </div>
        </div>

        

        <button type="submit" class="btn btn-primary">Agendar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection