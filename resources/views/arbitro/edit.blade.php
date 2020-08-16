@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar árbitro: {{ $arbitro->arbitro }}</h1>

    <form action="{{ route('arbitros.update', $arbitro->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nombre">Nombre de árbitro</label>
                <input type="text" class="form-control" name="nombre" value="{{$arbitro->arbitro}}" placeholder="Ingrese el nombre" required>
            </div> 

            <div class="form-group col-md-4">
                <label for="disponible">Disponible</label>
                <select name="disponible" class="form-control">
                    @if ($arbitro->disponible == 1)
                        <option value="{{$arbitro->disponible}}" selected>Sí</option>
                        <option value="0">No</option>
                    @else
                        <option value="{{$arbitro->disponible}}" selected>No</option>
                        <option value="1">Sí</option>
                    @endif
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="foto">Fotografía del árbitro</label> 
                <input type="file" name="foto" class="form-control">
                @if($arbitro->foto != "")
                    <img src="{{ asset('images/'.$arbitro->foto) }}" alt="{{ $arbitro->foto }}" height="50px" width="50px">
                    <small>fotografía actual</small>
                @endif
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>   
    </form>
</div>
@endsection