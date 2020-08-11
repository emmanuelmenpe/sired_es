@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar cancha: {{ $cancha->cancha }}</h1>

    <form action="{{ route('canchas.update', $cancha->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Nombre de cancha</label>
                <input type="text" class="form-control" name="nombre" value="{{$cancha->cancha}}" placeholder="Ingrese el nombre" required>
            </div>
            
            <div class="form-group col-md-4">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="{{$cancha->direccion}}" placeholder="Ingrese la dirección" required>
            </div>

            <div class="form-group col-md-4">
                <label for="disponible">Disponible</label>
                <select name="disponible" class="form-control">
                    @if ($cancha->Cdisponible == 1)
                        <option value="{{$cancha->Cdisponible}}" selected>Sí</option>
                        <option value="0">No</option>
                    @else
                        <option value="{{$cancha->Cdisponible}}" selected>No</option>
                        <option value="1">Sí</option>
                    @endif
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>   
    </form>
</div>
@endsection