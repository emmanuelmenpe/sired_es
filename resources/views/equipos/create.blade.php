@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear equipo</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/equipos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-3">
            <label for="nombre">Nombre de equipo</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre">
        </div>

        <div class="form-group col-md-3">
            <label for="logo">logo del equipo</label>
            <input type="file" class="form-control" name="logo">
        </div>

            <div class="form-group col-md-3">
                <label for="rama">Rama</label>
                <select name="rama" class="form-control">
                <option selected disabled>-</option>
                @foreach ($ramas as $rama)
                    <option value="{{$rama->id}}">{{$rama->rama}}</option> 
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-control">
                <option selected disabled>-</option>
                @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option> 
                @endforeach
                </select>
            </div>

            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection