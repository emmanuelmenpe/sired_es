@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar partido</h1>

    <form action="{{ route('partidos.update', $partido->id) }}" method="POST">
        @method('PATCH')
        @csrf 
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="cancha">Cancha</label>
                    <select name="cancha" class="form-control" required>
                        @foreach ($canchas as $cancha)
                        @if ($cancha->id == $partido->id_cancha)
                            <option value="{{$cancha->id}}" selected>{{$cancha->cancha}}</option>
                        @else
                            @if ($cancha->Cdisponible == 1)
                                <option value="{{$cancha->id}}">{{$cancha->cancha}}</option>
                            @endif
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="arbitro">Árbitro</label>
                    <select name="arbitro" class="form-control" required>
                        @foreach ($arbitros as $arbitro)
                        @if ($arbitro->id == $partido->id_arbitro)
                            <option value="{{$arbitro->id}}" selected>{{$arbitro->arbitro}}</option>
                        @else
                            @if ($arbitro->disponible == 1)
                            <option value="{{$arbitro->id}}">{{$arbitro->arbitro}}</option>
                            @endif
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input class="form-control" type="date" value="{{$partido->fecha}}" name="fecha" required>
                </div>
            </div>
            
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="hora">Hora</label> 
                    <input class="form-control" type="time" value="{{$partido->hora}}" name="hora" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection