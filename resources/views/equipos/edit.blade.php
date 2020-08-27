@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar equipo: {{ $equipo->nombre }}</h1>

    <form action="{{ route('equipos.update', $equipo->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Nombre de equipo</label>
                <input type="text" class="form-control" name="nombre" value="{{$equipo->nombre}}" placeholder="Ingrese el nombre" required>
            </div> 

            <div class="form-group col-md-4">
                <label for="logo">logo del equipo</label> 
                <input type="file" name="logo" class="form-control">
                @if($equipo->logo != "")
                    <img src="{{ asset('images/'.$equipo->logo) }}" alt="{{ $equipo->logo }}" height="50px" width="50px">
                    <small>logo actual</small>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>   
    </form>
</div>
@endsection