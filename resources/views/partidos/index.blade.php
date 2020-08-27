@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1>Partidos programados
      @can('administrador')
      <a href="{{route('partidospdf')}}" class="btn btn-primary btn-sm float-right" role="button">Imprimir</a>  
      @endcan
    </h1>
  <table class="table table-striped">
      <thead>  
        <tr> 
          <th scope="col">Local</th>
          <th scope="col">Visitante</th>
          <th scope="col">Cancha</th>
          <th scope="col">Dirección</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Árbitro</th>
          @can('administrador')
            <th scope="col">Opciones
              @can('administrador')
                <a href="partidos/create">
                  <button type="button" class="btn btn-success float-right btn-sm">Agendar partido</button>
                </a>
              @endcan
            </th>
          @endcan
          
        </tr>
      </thead>
      <tbody>
        @foreach ($partidos as $partido)
          <tr> 
              @foreach ($equipos as $equipo)
                @if ($partido->id_local == $equipo->id)
                  <th scope="row">
                    @if($equipo->logo != "")
                      <img src="{{ asset('images/'.$equipo->logo) }}" alt="{{ $equipo->logo }}" height="50px" width="50px">
                    @endif
                    {{$equipo->nombre}}</th>
                  @break
                @endif
              @endforeach
              
              @foreach ($equipos as $equipo)
                @if ($partido->id_visitante == $equipo->id)
                  <th scope="row">
                    @if($equipo->logo != "")
                      <img src="{{ asset('images/'.$equipo->logo) }}" alt="{{ $equipo->logo }}" height="50px" width="50px">
                    @endif
                    {{$equipo->nombre}}</th>
                  @break
                @endif
              @endforeach
              
              <td>{{$partido->cancha}}</td>
              <td>{{$partido->direccion}}</td>
              <td>{{$partido->fecha}}</td>
              <td>{{$partido->hora}}</td>
              <td>{{$partido->arbitro}}</td>
              @can('administrador')
                <td> 
                  <form action="{{route('partidos.destroy', $partido->id)}}" method="POST" id="formulario">
                      @php 
                        $i=0;
                        foreach ($resultados as $resultado ) {
                            if ($resultado->id_partido == $partido->id) {
                              $i=$i-1;
                            }
                        }
                      @endphp
                      @if ($i>=0)
                        <a href="{{route('partidos.edit', $partido->id)}}">
                          <button type="button" class="btn btn-primary btn-sm">Actualizar</button>
                        </a> 
                      @endif
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      @if ($i>=0)
                        <a href={{route('defResultado', $partido->id)}}>
                          <button type='button' class='btn btn-secondary btn-sm'>Capturar resultados</button>
                        </a>
                      @endif
                  </form>
                </td>
              @endcan
              
          </tr>
            
        @endforeach
      </tbody>
    </table>
    
</div>
@endsection