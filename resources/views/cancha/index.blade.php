@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de canchas registrados 
      @can('administrador')
        <a href="canchas/create"> 
          <button type="button" class="btn btn-success float-right">Agregar Cancha</button>
        </a>
      @endcan  
    </h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Dirección</th>
            <th scope="col">Disponible</th>
            @can('administrador')
              <th scope="col">Opciones</th>
            @endcan 
          </tr>
        </thead>
        <tbody>
          @foreach ($canchas as $cancha)
            <tr>
                <td>{{$cancha->cancha}}</td>
                <td>{{$cancha->direccion}}</td>
                @if ($cancha->Cdisponible == 1)
                    <td>Sí</td>
                @else
                    <td>No</td>
                @endif
                @can('administrador')
                    <td> 
                        <form action="{{route('canchas.destroy', $cancha->id)}}" method="POST">
                            <a href="{{route('canchas.edit', $cancha->id)}}">
                                <button type="button" class="btn btn-primary btn-sm">Editar</button>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
    
                    </td>
                @endcan
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection