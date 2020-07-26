@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar equipo: {{ $equipo->nombre }}</h1>

    <form action="{{ route('equipos.update', $equipo->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de equipo</label>
            <input type="text" class="form-control" name="nombre" value="{{$equipo->nombre}}" placeholder="Ingrese el nombre">
        </div> 

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Victorias</label>
                <input type="text" class="form-control" name="victorias" value="{{$equipo->victorias}}" placeholder="Ingrese victotias del equipo">
            </div>
            
            <div class="form-group col-md-4">
                <label for="nombre">Empates</label>
                <input type="text" class="form-control" name="empates" value="{{$equipo->empates}}" placeholder="Ingrese victotias del equipo">
            </div>
            
            <div class="form-group col-md-4">
                <label for="nombre">Derrotas</label>
                <input type="text" class="form-control" name="derrotas" value="{{$equipo->derrotas}}" placeholder="Ingrese victotias del equipo">
            </div>
            
            <div class="form-group col-md-4">
                <label for="id_liga">Liga</label>
                <select name="id_liga" class="form-control">
                @foreach ($ligas as $liga)
                    @if ($liga->liga == $equipo->liga)
                        <option selected value="{{$liga->id}}">{{$equipo->liga}}</option>
                    @else
                    <option value="{{$liga->id}}">{{$liga->liga}}</option>
                    @endif
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="id_rama">Rama</label>
                <select name="id_rama" class="form-control">
                @foreach ($ramas as $rama)
                    @if ($rama->rama == $equipo->rama)
                        <option selected value="{{$rama->id}}">{{$equipo->rama}}</option>
                    @else
                        <option value="{{$rama->id}}">{{$rama->rama}}</option>
                    @endif
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="id_categoria">Categoria</label>
                <select name="id_categoria" class="form-control">
                @foreach ($categorias as $categoria)
                    @if ($categoria->categoria == $equipo->categoria)
                        <option selected  value="{{$categoria->id}}">{{$equipo->categoria}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                    @endif
                @endforeach
                </select>
            </div>

            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>   
    </form>
</div>
@endsection