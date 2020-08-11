@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar sanción</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/sanciones" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="motivo">Motivo</label>
                <input type="text" class="form-control" maxlength="255" name="motivo">
            </div>

            
            <div class="form-group col-md-4">
                <label for="fecha_sancion">Fecha de sanción</label>
                <input type="date" class="form-control"  name="fecha_sancion">
            </div>

            <div class="form-group col-md-4">
                <label for="fin_sancion">Fin de sanción</label>
                <input type="date" class="form-control"  name="fin_sancion">
            </div>
        
            <input type="hidden" name="id_jugador" value="{{$id}}">
            
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection