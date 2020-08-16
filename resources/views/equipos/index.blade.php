@extends('layouts.app')

@section('content') 
<div class="container">
  <h2>Lista de equipos registrados
    @can('administrador')
      <div class="float-right">
        <a href="{{route('equipospdf')}}" class="btn btn-primary btn-sm" role="button">Imprimir</a>
      </div>
    @endcan 
    
  </h2>
  <h6> 
    @if ($search)
      <div class="alert alert-primary" role="alert">
        Los resultados para tu busqueda '{{$search}}' son: 
      </div>
    @endif
  </h6>  
  <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Rama</th>
          <th scope="col">Categoría</th>
            <th scope="col">Opciones
              @can('administrador')
                <a href="equipos/create"> 
                  <button type="button" class="btn btn-success float-right btn-sm">Agregar equipo</button>
                </a>
              @endcan
            </th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($equipos as $equipo)
          <tr>
              @php
                  $JJ = $equipo->victorias + $equipo->empates + $equipo->derrotas;
                  $DIF = $equipo->goles_favor - $equipo->goles_contra;
              @endphp
              <th scope="row">
                @if($equipo->logo != "")
                    <img src="{{ asset('images/'.$equipo->logo) }}" alt="{{ $equipo->logo }}" height="50px" width="50px">
                @endif
                {{$equipo->nombre}} 
              </th>
              <td>{{$equipo->rama}}</td>
              <td>{{$equipo->categoria}}</td>
              
                <td> 
                  <form action="{{route('equipos.destroy', $equipo->id)}}" method="POST">
                    <a href="{{route('equipos.show', $equipo->id)}}">
                        <button type="button" class="btn btn-secondary btn-sm">Ver</button>
                    </a>
                    @can('administrador')
                      <a href="{{route('equipos.edit', $equipo->id)}}">
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
    <div class="row">
      <div class="mx-auto">
        {{ $equipos->links() }}  
      </div>
    </div>
</div>
@endsection