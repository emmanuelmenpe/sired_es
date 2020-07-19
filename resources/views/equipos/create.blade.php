@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/equipos" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de equipo</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre">
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="id_liga">Liga</label>
                <select name="id_liga" class="form-control">
                <option selected>-</option>
                <!-- -->
                <!-- 
                <option>Futbol soccer</option>
                <option>futbol rápido</option>
                <option>Basquetbol</option>
                -->
                <option>1</option>
                <option>2</option>
                <option>3</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="id_rama">Rama</label>
                <select name="id_rama" class="form-control">
                <option selected>-</option>
                <!-- 
                <option>Femenil</option>
                <option>Varonil</option>
                -->
                <option>1</option>
                <option>2</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="id_categoria">Categoria</label>
                <select name="id_categoria" class="form-control">
                <option selected>-</option>
                <!-- 
                <option>Mini</option>
                <option>Pasarela</option>
                <option>Juvenil</option>
                <option>2da fuerza</option>
                <option>1ra fuerza</option>
                <option>Veteranos</option>
                -->
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                </select>
            </div>

            </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection