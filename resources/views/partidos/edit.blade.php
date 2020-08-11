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
                            {{--<input type="hidden" name="canchaB" value="{{$cancha->id}}">--}}
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
                    <label for="arbitro">Arbitro</label>
                    <select name="arbitro" class="form-control" required>
                        @foreach ($arbitros as $arbitro)
                        @if ($arbitro->id == $partido->id_arbitro)
                            <option value="{{$arbitro->id}}" selected>{{$arbitro->arbitro}}</option>
                            {{--<input type="hidden" name="arbitroB" value="{{$arbitro->id}}">--}}
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
                    <label for="fecha">fecha</label>
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
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection