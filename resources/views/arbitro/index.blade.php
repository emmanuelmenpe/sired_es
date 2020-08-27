@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de arbitros registrados 
      @can('administrador')
      <a href="{{route('arbitrospdf')}}" class="btn btn-primary btn-sm float-right" role="button">Imprimir</a>
      @endcan
    </h2>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Disponible</th>
            @can('administrador')
              <th scope="col">Opciones
                @can('administrador')
                  <a href="arbitros/create"> 
                    <button type="button" class="btn btn-success float-right btn-sm">Agregar árbitro</button>
                  </a>
                @endcan 
              </th>
            @endcan 
          </tr>
        </thead>
        <tbody>
          @foreach ($arbitros as $arbitro)
            <tr>
                <th scope="row">
                  @if($arbitro->foto != "")
                      <img src="{{ asset('images/'.$arbitro->foto) }}" alt="{{ $arbitro->foto }}" height="50px" width="50px">
                  @endif
                  {{$arbitro->arbitro}}
                </th>
                @if ($arbitro->disponible == 1)
                    <td>Sí</td>
                @else
                    <td>No</td>
                @endif
                
                <td> 
                    <form action="{{route('arbitros.destroy', $arbitro->id)}}" method="POST" id="formulario">
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