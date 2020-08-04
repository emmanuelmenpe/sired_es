@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Definir resultado de partido</h1>
   <form action="{{ route('resultados.update', $partidoID) }}" method="POST">
    @method('PATCH')
        @csrf
      {{--  {!! Form::open(['action' => ['ResultadoController@define', $partido->id], 'method' => 'POST']) !!}
        {{Form::token()}}--}}
        <div class="form-row">
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
        </div>
        <div class="form-row">
            
            
            <div class="form-group col-md-4">
                <label for="nombre">Goles totales de ganador <small>(agregar goles en caso de empate)</small></label>
                <input type="text" class="form-control" name="golesG" placeholder="Ingrese cantidad total de goles" required>
            </div>
            <div class="form-group col-md-4">
                <label for="nombre">Goles totales de pardedor <small>(agregar goles en caso de empate)</small></label>
                <input type="text" class="form-control" name="golesP" placeholder="Ingrese cantidad total de goles" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
    </form>
    {{--{!! Form::close() !!}--}}
</div>
@endsection