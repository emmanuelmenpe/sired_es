@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Capturar resultado de partido</h1>
   <form action="{{ route('resultados.store') }}" method="POST">
        @csrf
      {{--  {!! Form::open(['action' => ['ResultadoController@define', $partido->id], 'method' => 'POST']) !!}
        {{Form::token()}}--}}
        {{--<div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Equipo ganador</label>
                <select name="ganador" class="form-control" required>
                    <option selected value="0">Empate</option>
                        <option value="{{$partido->id}}">{{$partido->nombre}}</option>
                        <option value="{{$partidoo->id}}">{{$partidoo->nombre}}</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="nombre">Equipo perdedor</label>
                <select name="perdedor" class="form-control" required>
                    <option selected value="0">Empate</option>
                        <option value="{{$partido->id}}">{{$partido->nombre}}</option>
                        <option value="{{$partidoo->id}}">{{$partidoo->nombre}}</option>
                </select>
            </div>
        </div>--}} 
        
        <div class="form-row"> 
            <div class="form-group col-md-4">
                <label for="">Goles de {{$partido->nombre}}</label>
                <input type="number" class="form-control" name="localG" min="0" required placeholder="Ingrese cantidad total de goles" required>
                <input type="hidden" class="form-control" name="local" value="{{$partido->id}}">
            </div>
            <div class="form-group col-md-4">
                <label for="">Goles de {{$partidoo->nombre}}</label>
                <input type="number" class="form-control" name="visitanteG" min="0" required placeholder="Ingrese cantidad total de goles" required>
                <input type="hidden" class="form-control" name="visitante" value="{{$partidoo->id}}">
            </div>
            <input type="hidden" name="id_partido" value="{{$partidoID}}">
        </div>
        <br>
    {{-----------------------------------------------------------------------------
    <input type="hidden" name="id_partido" value="{{$partidoID}}">
    <div class="form-row"> 
        <div style="width: 50%; float: left; border: red solid 1px;">
            <h3>Goles anotados para "{{$partido->nombre}}" por jugador</h3>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col" style="width: 45%;">nombre</th>
                    <th scope="col">goles</th> 
                    <th scope="col">goles penal</th>
                    <th scope="col">asistencias</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($jugadores as $jugador)
                        @foreach ($integrantes as $integrante)
                            @if ($integrante->id_jugador == $jugador->id)
                                <tr>
                                    <th scope="row" style="word-break: break-all;">
                                        <img src="{{ asset('images/'.$jugador->fotografia) }}" alt="{{ $jugador->fotografia }}" height="50px" width="50px">
                                        {{$jugador->nombre}}|{{$jugador->id}}
                                    </th>
                                    <td><input type="number" class="form-control" name="golesL[]" id="{{$jugador->id}}" value="0" min="0"></td>
                                    <td><input type="number" class="form-control" name="goles_penalL[]" value="0" min="0"></td>
                                    <td><input type="number" class="form-control" name="asistenciaL[]" value="0" min="0"></td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div style="width: 50%; float: right; border: red solid 1px;">
            <h3>Goles anotados para "{{$partidoo->nombre}}" por jugador</h3>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col" style="width: 45%;">nombre</th>
                    <th scope="col">goles</th>
                    <th scope="col">goles penal</th>
                    <th scope="col">asistencias</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($jugadores as $jugador)
                        @foreach ($integrantess as $integrantee)
                            @if ($integrantee->id_jugador == $jugador->id)
                                <tr>
                                    <th scope="row" style="word-break: break-all;">
                                        <img src="{{ asset('images/'.$jugador->fotografia) }}" alt="{{ $jugador->fotografia }}" height="50px" width="50px">
                                        {{$jugador->nombre}}|{{$jugador->id}}
                                    </th>
                                    <td><input type="number" class="form-control" name="golesV[]" id="{{$jugador->id}}" value="0" min="0"></td>
                                    <td><input type="number" class="form-control" name="goles_penalV[]" value="0" min="0"></td>
                                    <td><input type="number" class="form-control" name="asistenciaV[]" value="0" min="0"></td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    --}}
    <button type="submit" class="btn btn-primary">Capturar</button>
    <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    
    </form>
    {{--{!! Form::close() !!}--}}      
    
    
</div>
@endsection