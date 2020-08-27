@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar cancha</h1>
    <form action="/canchas" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre de cancha" required>
            </div>

            <div class="form-group col-md-4">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" placeholder="Dirección de cancha" required>
            </div>
        
            <div class="form-group col-md-4">
                <label for="disponible">Disponible</label>
                <select name="disponible"  class="form-control" required>
                    <option value="" selected disabled>-</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection