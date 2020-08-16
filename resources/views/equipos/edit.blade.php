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

            {{--
            <div class="form-group col-md-3">
                <label for="nombre">Victorias</label>
                <input type="number" class="form-control" name="victorias" min="{{$equipo->victorias}}" value="{{$equipo->victorias}}" placeholder="Ingrese victotias del equipo" required>
            </div>
            
            <div class="form-group col-md-3">
                <label for="nombre">Empates</label>
                <input type="number" class="form-control" name="empates" min="{{$equipo->empates}}" value="{{$equipo->empates}}" placeholder="Ingrese victotias del equipo" required>
            </div>
            
            <div class="form-group col-md-4">
                <label for="nombre">Derrotas</label>
                <input type="number" class="form-control" name="derrotas" min="{{$equipo->derrotas}}" value="{{$equipo->derrotas}}" placeholder="Ingrese victotias del equipo" required>
            </div>
            

            <div class="form-group col-md-3">
                <label for="id_rama">Rama</label>
                <select name="id_rama" class="form-control" required>
                @foreach ($ramas as $rama)
                    @if ($rama->rama == $equipo->rama)
                        <option selected value="{{$rama->id}}">{{$equipo->rama}}</option>
                    @else
                        <option value="{{$rama->id}}">{{$rama->rama}}</option>
                    @endif
                @endforeach
                </select>
            </div>
            {{--
            <div class="form-group col-md-3">
                <label for="id_categoria">Categoría</label>
                <select name="id_categoria" class="form-control" required>
                @foreach ($categorias as $categoria)
                    @if ($categoria->categoria == $equipo->categoria)
                        <option selected  value="{{$categoria->id}}">{{$equipo->categoria}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                    @endif
                @endforeach
                </select>
            </div>
            --}}
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>   
    </form>
</div>
@endsection