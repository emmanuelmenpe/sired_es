@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de arbitros registrados 
      @can('administrador')
        <a href="arbitros/create"> 
          <button type="button" class="btn btn-success float-right">Agregar arbitro</button>
        </a>
      @endcan  
    </h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Disponible</th>
            @can('administrador')
              <th scope="col">Opciones</th>
            @endcan 
          </tr>
        </thead>
        <tbody>
          @foreach ($arbitros as $arbitro)
            <tr>
                <td>
                  @if($arbitro->foto != "")
                      <img src="{{ asset('images/'.$arbitro->foto) }}" alt="{{ $arbitro->foto }}" height="50px" width="50px">
                  @endif
                  {{$arbitro->arbitro}}
                </td>
                @if ($arbitro->disponible == 1)
                    <td>Sí</td>
                @else
                    <td>No</td>
                @endif
                
                <td> 
                    <form action="{{route('arbitros.destroy', $arbitro->id)}}" method="POST">
                      @can('administrador')
                        <a href="{{route('arbitros.edit', $arbitro->id)}}">
                            <button type="button" class="btn btn-primary btn-sm">Editar</button>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      @endcan
                    </form>
  
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection