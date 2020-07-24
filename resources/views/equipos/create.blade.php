@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear equipo</h1>
    <form action="/equipos" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de equipo</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre">
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Victorias</label>
                <input type="text" class="form-control" name="victorias" placeholder="Ingrese victotias del equipo">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Empates</label>
                <input type="text" class="form-control" name="empates" placeholder="Ingrese empates del equipo">
            </div>
        </div>
 
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Derrotas</label>
                <input type="text" class="form-control" name="derrotas" placeholder="Ingrese derrotas del equipo">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="id_liga">Liga</label>
                <select name="id_liga" class="form-control">
                <option selected disabled>-</option>
                @foreach ($ligas as $liga)
                    <option value="{{$liga->id}}">{{$liga->liga}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="id_rama">Rama</label>
                <select name="id_rama" class="form-control">
                <option selected disabled>-</option>
                @foreach ($ramas as $rama)
                    <option value="{{$rama->id}}">{{$rama->rama}}</option> 
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="id_categoria">Categoria</label>
                <select name="id_categoria" class="form-control">
                <option selected disabled>-</option>
                @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option> 
                @endforeach
                </select>
            </div>

            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection