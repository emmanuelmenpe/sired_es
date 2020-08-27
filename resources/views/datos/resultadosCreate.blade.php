@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Capturar resultado de partido</h1>
   <form action="{{ route('resultados.store') }}" method="POST">
        @csrf
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
    <button type="submit" class="btn btn-primary">Capturar</button>
    <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    
    </form>
</div>
@endsection